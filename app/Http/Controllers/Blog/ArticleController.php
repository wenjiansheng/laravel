<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\ArticleModel as model;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $model = new model;
        $param = $request->input();
        $param['article_type_id'] = !empty($param['article_type_id']) ? $param['article_type_id'] : '';
        $data = $model->getDataList($param);
//        dump($data);die;
        return view('index',['list'=>$data,'type'=>$param['article_type_id']]);
    }

    public function show(Request $request,$id)
    {
        $model = new model;
        $param = $request->input();
        $data = $model->getDataById($id);
        return view('read',['list'=>$data]);
    }

    public function edit(Request $request,$id)
    {
        $model = new model;
        $param = $request->input();
        $param['pid'] = !empty($param['pid']) ? $param['pid'] : '';
        $data = $model->getDiscuss($id);
        $reply = $model->getReply($id);
//        dd($data);
        return view('discuss',['list'=>$data,'type'=>$param['pid'],'article_id'=>$id,'reply'=>$reply]);
    }

    public function store(Request $request)
    {
        $model = new model;
        $param = $request->input();


        $data = $model->saveData($param);
        if(!$data){
            return $this->resultError($model->getError());
        }
        return $this->resultSuccess($model,'评论成功');
    }

    public function like(Request $request)
    {
        $model = new model;
        $param = $request->input();
        $data = $model->like($param);
        if(!$data){
            return $this->resultError($model->getError());
        }
        return $this->resultSuccess($model,'点赞成功');
    }

    public function reply(Request $request)
    {
        $model = new model;
        $param = $request->input();
        $data = $model->reply($param);
        if(!$data){
            return $this->resultError($model->getError());
        }
        return $this->resultSuccess($model,'回复成功');
    }
}
