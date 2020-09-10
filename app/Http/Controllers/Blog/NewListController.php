<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewListController extends Controller
{
    public function index()
    {
//        $model = new model;
//        $data = $model->getDataList();
        return view('newlist');
    }
}
