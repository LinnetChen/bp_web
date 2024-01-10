<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $image = request()->file('upload');
        $type = $image->getMimeType();

        if ($type != 'image/jpeg' || $type != 'image/png' || $type != 'image/gif') {
        } else {
            return "<script>alert('檔案格式錯誤'.$type);</script>";
        }
        //檔案加入本地
        $filename = $image->getClientOriginalName();
        $image->move(public_path('upload/ckeditor'), $filename);

        return "<script>alert('上傳成功')</script>";

    }

}
