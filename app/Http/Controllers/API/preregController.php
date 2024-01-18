<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\prereg;
use App\Models\preregLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    // public function access($request)
    // {
    //     $arr = array(0, 0, 0);
    //     $now = strtotime("2024-01-10 00:00:00");
    //     $status = -99;

    //     $allArray = [];
    //     for ($day = 10; $day <= 24; $day++) {
    //         $timestamp = strtotime("2024-01-$day 00:00:00");
    //         switch ($day) {
    //             case 10: $allArray[$timestamp] = [250, 283, 3]; break;
    //             case 11: $allArray[$timestamp] = [946, 912, 10]; break;
    //             case 12: $allArray[$timestamp] = [1822, 1623, 18]; break;
    //             case 13: $allArray[$timestamp] = [2125, 2289, 22]; break;
    //             case 14: $allArray[$timestamp] = [2756, 2711, 28]; break;
    //             case 15: $allArray[$timestamp] = [3025, 3226, 39]; break;
    //             case 16: $allArray[$timestamp] = [3778, 3901, 45]; break;
    //             case 17: $allArray[$timestamp] = [4569, 4421, 56]; break;
    //             case 18: $allArray[$timestamp] = [5869, 5520, 61]; break;
    //             case 19: $allArray[$timestamp] = [6665, 6203, 68]; break;
    //             case 20: $allArray[$timestamp] = [7891, 7724, 74]; break;
    //             case 21: $allArray[$timestamp] = [8669, 8716, 81]; break;
    //             case 22: $allArray[$timestamp] = [9102, 9213, 94]; break;
    //             case 23: $allArray[$timestamp] = [10025, 9897, 100]; break;
    //             case 24: $allArray[$timestamp] = [11256, 10177, 100]; break;
    //         }
    //     }

    //     foreach ($allArray as $time => $val) {
    //         if ($now < $time) {
    //             $arr = $val;
    //             $status = 1;
    //             break;
    //         }
    //     }

    //     return response()->json([
    //         'status' => $status,
    //         'num' => $arr,
    //     ]);
    // }


    public function access($request)
    {
        $arr = array(0, 0, 0);
        $status = -99;

        $allArray = [
            '2024-01-10' => [250, 283, 3],
            '2024-01-11' => [946, 912, 10],
            '2024-01-12' => [1822, 1623, 18],
            '2024-01-13' => [2125, 2289, 22],
            '2024-01-14' => [2756, 2711, 28],
            '2024-01-15' => [3025, 3226, 39],
            '2024-01-16' => [3778, 3901, 45],
            '2024-01-17' => [4569, 4421, 56],
            '2024-01-18' => [5869, 5520, 61],
            '2024-01-19' => [6665, 6203, 68],
            '2024-01-20' => [7891, 7724, 74],
            '2024-01-21' => [8669, 8716, 81],
            '2024-01-22' => [9102, 9213, 94],
            '2024-01-23' => [10025, 9897, 100],
            '2024-01-24' => [11256, 10177, 100],
        ];

        foreach ($allArray as $time => $val) {
            if (date('Y-m-d') == $time) {
                $arr = $val;
                $status = 1;
                break;
            }
        }

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
        $exIP = explode('.',$real_ip);
        if($exIP[0] =='103' && $exIP[1] =='53' && $exIP[2] =='291'){
            return response()->json([
                'status' => -99,
                ]);
        }else if($exIP[0] =='104' && $exIP[1] =='143' && $exIP[2] =='224'){
                return response()->json([
                'status' => -99,
                ]);
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
