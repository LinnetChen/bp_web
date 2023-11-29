<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\prereg;
use App\Models\preregLog;
use Illuminate\Http\Request;

class preregController extends Controller
{
    public function store(Request $request)
    {
        if ($request->type == 'get') {
            $result = preregController::get($request);
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

    public function get($request)
    {
        $heroVote = 0;
        $baoVote = 0;
        $beef = 0;

        $arr = array(0, 1, 2);

        $now = time();
        $time10 = strtotime("2023-11-29 20:01:00");

        if ($now > $time10) {
            $arr = array(10, 11, 20);
            return response()->json([
                'status' => 1,
                'num' => $arr,
            ]);
        } else {
            $arr = array(33, 11, 20);
            return response()->json([
                'status' => -99,
                'num' => $arr,
            ]);
        }

    }

    public function phone($request)
    {

        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $real_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else {
            $real_ip = $_SERVER["REMOTE_ADDR"];
        }

        $checkMobile = prereg::where('mobile', '=', '+' . $request->mobile)->first();

        if ($checkMobile) {
            return response()->json([
                'status' => -99,
            ]);
        }
        $prereg = new prereg();
        $prereg->ip = $real_ip;
        $prereg->mobile = '+' . $request->mobile;
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
        $checkIp = preregLog::where('ip', $real_ip)->first();

        if ($checkIp) {
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
