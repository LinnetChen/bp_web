<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Log;

class DailyAffairsController extends Controller
{
    public function upgrade_bpm_news()
    {
        Log::info('公告排程更新');
        $client = new Client();
        $res = $client->request('POST', 'https://digeam.com/api/get_bpm_news');
    }
}
