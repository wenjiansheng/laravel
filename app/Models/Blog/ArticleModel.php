<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
            ->groupBy('a.id','b.type_name','a.article_type_id','a.title','a.content','author','create_time','update_time','read_quantity')
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
        return $list;
    }

    public function getDiscuss($id)
    {
        $list = DB::table('la_article_discuss')
            ->where('article_id',$id)
            ->where('pid',0)
            ->paginate(3);
        return $list;
    }

    public function saveData($param)
    {
        try{
            $param['appraise_person'] = '游客'.rand();
            $data = [
                'article_id'=>$param['article_id'],
                'discuss'=>$param['discuss'],
                'appraise_person'=>$param['appraise_person'],
                'create_time'=>time(),
                'update_time'=>time(),
            ];
            $res = DB::table('la_article_discuss')->insert($data);
            return true;
        }catch (\Exception $e){
            echo $e->getMessage();
            return false;
        }

    }
}
