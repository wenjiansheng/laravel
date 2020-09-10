<?php

namespace App\Models\Blog;

use Illuminate\Auth\Events\Validated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Validator;

class ArticleModel extends Model
{

    protected $table = 'la_classification';
    public function getDataList($param)
    {

        $list = DB::table('la_article as a')
            ->leftJoin('la_article_type as b','a.article_type_id','=','b.id')
//            ->leftJoin('la_article_discuss as c','a.id','=','c.article_id')
            ->leftJoin('la_article_discuss as c',function($join){
                $join->on('a.id','=','c.article_id')->where('c.pid',0);
            })
            ->selectRaw('a.*,b.type_name,count(c.id) as discuss_times');
        if(!empty($param['article_type_id'])){
            $list = $list->where('a.article_type_id',$param['article_type_id']);
        }
        $list = $list
            ->groupBy('a.id','b.type_name')
            ->paginate(5);
        return $list;
    }

    public function getDataById($id)
    {
        $list = DB::table('la_article as a')
            ->leftJoin('la_article_type as b','a.article_type_id','=','b.id')
//            ->leftJoin('la_article_discuss as c','a.id','=','c.article_id')
            ->selectRaw('a.*,b.type_name')
            ->where('a.id',$id)
            ->first();
        DB::table("la_article")->where('id',$id)->increment("read_quantity");//自增1
        return $list;
    }

    public function getDiscuss($id)
    {
        $list = DB::table('la_article_discuss')
            ->where('article_id',$id)
            ->where('pid',0)
            ->orderBy('create_time','desc')
            ->paginate(3);
        return $list;
    }

    public function getReply($id)
    {
        $list = DB::table('la_discuss_reply as a')
            ->leftJoin('la_article_discuss as b','a.discuss_id','=','b.id')
            ->where('b.article_id',$id)
            ->selectRaw('a.*')
            ->get();
        return $list;
    }

    public function saveData($param)
    {
        $rule = [
            'article_id' => 'bail|required',
            'discuss' => 'required',
        ];
        $msg = [
            'article_id.required' => '文章id不能为空',
            'discuss.required' => '评论不能为空',
        ];
        $validator = Validator::make($param,$rule,$msg);
        if(!$validator->fails()){
            $this->error = $validator->errors()->first();
            return false;
        }
        try{
            $param['appraise_person'] = '游客'.rand();
            $data = [
                'article_id'=>$param['article_id'],
                'discuss'=>$param['discuss'],
                'appraise_person'=>$param['appraise_person'],
                'create_time'=>time(),
                'update_time'=>time(),
            ];
            DB::table('la_article_discuss')->insert($data);
            return true;
        }catch (\Exception $e){
            $this->error = $e->getMessage();
            return false;
        }

    }

    public function like($param)
    {
        $rule = [
            'id' => 'bail|required',
        ];
        $msg = [
            'article_id.required' => '文章id不能为空',
            'id.required' => '评论id不能为空',
        ];
        $validator = Validator::make($param,$rule,$msg);
        if(!$validator->fails()){
            $this->error = $validator->errors()->first();
            return false;
        }
        try{
            DB::table("la_article_discuss")->where('id',$param['id'])->increment("like");//自增1
            return true;
        }catch (\Exception $e){
            $this->error = $e->getMessage();
            return false;
        }
    }

    public function reply($param)
    {
        $rule = [
            'discuss_id' => 'bail|required',
            'reply' => 'bail|required',
        ];
        $msg = [
            'reply.required' => '回复内容不能为空',
            'discuss_id.required' => '评论id不能为空',
        ];
        $validator = Validator::make($param,$rule,$msg);
        if($validator->fails()){
            $this->error = $validator->errors()->first();
            return false;
        }
        try{
            $data = [
                'discuss_id'=>$param['discuss_id'],
                'reply'=>$param['reply'],
                'update_time'=>time(),
                'create_time'=>time(),
            ];
            DB::table("la_discuss_reply")->insert($data);
            return true;
        }catch (\Exception $e){
            $this->error = $e->getMessage();
            return false;
        }
    }
}
