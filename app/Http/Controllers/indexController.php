<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\image;

class indexController extends Controller
{
    public function index()
    {
        $images = image::where('status', 'Y')->orderBy('sort', 'asc')->get();
        return view('front/index', ['images' => $images]);
    }

}
