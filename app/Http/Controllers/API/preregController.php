<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\prereg;
use App\Models\preregLog;
use Illuminate\Http\Request;

class preregController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type == 'access') {
            $result = preregController::access($request);
            return $result;
        } else if ($request->type == 'phone') {
            $result = preregController::phone($request);
            return $result;
        } else if ($request->type == 'vote') {
            $result = preregController::vote($request);
            return $result;
        }

        // $a = prereg::where('mobile', $request->mobile)->first();

        // if ($a) {
        //     return -99;
        // } else {
        //     $prereg = new prereg();
        //     $prereg->ip = $request->ip;
        //     $prereg->mobile = $request->mobile;
        //     $prereg->save();
        //     return 1;
        // }
    }

    public function access($request)
    {
        $arr = array(0, 0, 0);
        $now = time();
        $status = -99;

        for ($day = 10; $day <= 24; $day++) {
            ${"time" . $day} = strtotime("2024-01-$day 00:00:00");
        }

        $allArray = [
            $time10 => [250, 283, 3],
            $time11 => [946, 912, 10],
            $time12 => [1822, 1623, 18],
            $time13 => [2125, 2289, 22],
            $time14 => [2756, 2711, 28],
            $time15 => [3025, 3226, 39],
            $time16 => [3778, 3901, 45],
            $time17 => [4569, 4421, 56],
            $time18 => [5869, 5520, 61],
            $time19 => [6665, 6203, 68],
            $time20 => [7891, 7724, 74],
            $time21 => [8669, 8716, 81],
            $time22 => [9102, 9213, 94],
            $time23 => [10025, 9897, 100],
            $time24 => [11256, 10177, 100],
        ];

        foreach ($allArray as $time => $val) {
            if ($now > $time) {
                $arr = $val;
                $status = 1;
                break;
            }
        }

        // $status = 1;
        // $arr = [250, 283, 3];

        return response()->json([
            'status' => $status,
            'num' => $arr,
        ]);

    }

    public function phone($request)
    {

        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        $checkMobile = prereg::where('mobile', '=', $request->mobile)->first();

        if ($checkMobile) {
            return response()->json([
                'status' => -99,
            ]);
        }
        $prereg = new prereg();
        $prereg->ip = $real_ip;
        $prereg->mobile = $request->mobile;
        $prereg->save();
        return response()->json([
            'status' => 1,
        ]);
    }

    public function vote($request)
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        if ($request->choose == '' || $request->choose == null) {
            return response()->json([
                'status' => -97,
            ]);
        }

        $today = date('Y-m-d');
        $checkIp = preregLog::where('ip', $real_ip)->whereDate('created_at', $today)->count();

        if ($checkIp >= 3) {
            return response()->json([
                'status' => -99,
            ]);
        }

        $preregLog = new preregLog();
        $preregLog->ip = $real_ip;
        $preregLog->choose = $request->choose;
        $preregLog->save();
        return response()->json([
            'status' => 1,
        ]);

    }
}
