<?php
if(!function_exists('get_tree_list')){
    function get_tree_list($list)
    {
        $temp = [];
        foreach($list as $k=>$v){
            $temp[$v['id']] = $v;
        }
        foreach($temp as $k=>$v){
            $temp[$v['pid']]['children'][] = &$temp[$v['id']];
        }
        // dump($temp);
        // echo 'fd';
        return isset($temp[0]['children']) ? $temp[0]['children'] : [];
    }
}