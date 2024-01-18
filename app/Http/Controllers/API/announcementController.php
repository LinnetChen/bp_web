<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\announcement;
use Illuminate\Http\Request;

class announcementController extends Controller
{
    public function index(Request $request)
    {
        $pageType = $request->pageType;
        $pageNum = $request->pageNum;
        $count = 0;

        if ($_SERVER['HTTP_CF_CONNECTING_IP'] == '211.23.144.219') {
            if ($pageType == 'new') {
                $list = announcement::where('open', 'Y')->orderby('sort', 'desc')->orderby('created_at', 'desc')->offset(($pageNum - 1) * 5)->limit(5)->get();
                $count = announcement::where('open', 'Y')->orderby('sort', 'desc')->orderby('created_at', 'desc')->count();
            } else {
                $list = announcement::where('open', 'Y')->where('cate', $pageType)->orderby('sort', 'desc')->orderby('created_at', 'desc')->offset(($pageNum - 1) * 5)->limit(5)->get();
                $count = announcement::where('open', 'Y')->where('cate', $pageType)->orderby('sort', 'desc')->orderby('created_at', 'desc')->count();
            }
        } else {
            if ($pageType == 'new') {
                $list = announcement::where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->orderby('sort', 'desc')->orderby('created_at', 'desc')->offset(($pageNum - 1) * 5)->limit(5)->get();
                $count = announcement::where('open', 'Y')->orderby('sort', 'desc')->orderby('created_at', 'desc')->count();
            } else {
                $list = announcement::where('open', 'Y')->where('created_at', '<=', date('Y-m-d H:i:s'))->where('cate', $pageType)->orderby('sort', 'desc')->orderby('created_at', 'desc')->offset(($pageNum - 1) * 5)->limit(5)->get();
                $count = announcement::where('open', 'Y')->where('cate', $pageType)->orderby('sort', 'desc')->orderby('created_at', 'desc')->count();
            }
        }

        $totalPages = (integer) ($count / 5);
        $title = [];
        $time = [];
        $id = [];
        $span = [];

        foreach ($list as $value) {
            array_push($title, $value->title);
            array_push($time, date('Y/m/d', strtotime($value->created_at)));
            $cate = '';
            if ($value->cate == 'system') {
                $cate = '系統';
            } else {
                $cate = '活動';

            }
            array_push($span, $cate);
            array_push($id, $value->id);
        }
        return response()->json([
            'status' => 1,
            'title' => $title,
            'time' => $time,
            'totalPages' => $totalPages,
            'id' => $id,
            'span' => $span,
        ]);
    }

    public function content(Request $request)
    {
        $list = announcement::where('id', $request->id)->where('open', 'Y')->first();
        if ($list != null) {
            return response()->json([
                'status' => 1,
                'title' => $list->title,
                'time' => date('Y/m/d H:i:s', strtotime($list->created_at)),
                'content' => $list->content,
            ]);
        }
    }
}
