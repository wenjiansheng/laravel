<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 返回成功调用的封装后的API数据到客户端
     * @access public
     * @param  mixed     $data 要返回的数据
     * @param  mixed     $msg 提示信息
     * @return void
     */
    public function resultSuccess($data, $msg = '')
    {
        $data = empty($data) ? [] : $data;
        return ['code'=>200,'msg'=>$msg,'data'=>$data];
    }

    /**
     * 返回失败调用的封装后的API数据到客户端
     * @access public
     * @param  mixed     $msg 提示信息
     * @return void
     */
    public function resultError($msg = '')
    {
        return ['code'=>400,'msg'=>$msg,'data'=>array()];
    }
}
