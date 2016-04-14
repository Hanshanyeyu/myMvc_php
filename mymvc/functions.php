<?php
/**
 *  MVC功能函数文件: 用于定义一些全局函数集
 *  author: love_shift
 *  date: 2016/04/14
 */


/**
 *  路由解析函数: 用于获取模块，控制器，以及方法的函数。
 */
function getRouteInfo($field){
    $info = filter_input(INPUT_GET, $field, FILTER_SANITIZE_URL);
    if (!empty($info)) {
        return $info;


    } else {
        return 'null';


    }

}

/**
 *  提取url信息函数: 提取和组装url -> 模块.控制器.方法
 *  @param $m => '模块', $c => '控制器'， $a => '方法'  (类似tpg)
 *
 */

function getRoute(){
    $c = getRouteInfo('c');
    $a = getRouteInfo('a');

    //定义默认控制器&&方法
    if ($c == 'null') {
        $c = 'index';

    }

    if ($a == 'null') {
        $a = 'index';

    }

    // 先区分大小写
    $routeUrl['a'] = $a;
    $routeUrl['c'] = $c;
    return $routeUrl;

}


function tlog(){
    var_dump('hello');


}





?>
