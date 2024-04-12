<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\announcement;

class DigeamController extends Controller
{
    public function IndexNews()
    {
        //回傳公告
        $page = announcement::select('id', 'cate', 'title', 'created_at as date')->where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->get();
        return $page;
    }
}
