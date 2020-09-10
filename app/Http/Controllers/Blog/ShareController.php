<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function index()
    {
//        $model = new model;
//        $data = $model->getDataList();
        return view('share');
    }
}
