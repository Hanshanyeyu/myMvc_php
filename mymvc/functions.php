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



// C方法，获取和设置配置参数，借鉴Thinkphp
function C($name=null, $value=null, $default=null){
    // 静态变量，只有在为定义时候定义，这里相当于引入全局 $_config
    // static $_config = array();
    // C() 返回 config.php 配置参数
    global $_config;
    if (empty($name)) {
        return $_config;

    }
    if (is_string($name)) {
        //id 一维变量
        if (!strpos(".", $name)) {
            //统一upper
            // $name = strtoupper($name);
            if (empty($value)) {
                return isset($_config[$name]) ? $_config[$name] : $default;

            }
            $_config[$name] = $value;
            // 赋值不返回.
            return null;
        }
        //user.id 二维变量
        $nameAr = explode(".", $name);
        if (empty($value)) {
            return isset($_config[$nameAr[0]][$nameAr[1]]) ? $_config[$nameAr[0]][$nameAr[1]] : $default;
        }
        $_config[$nameAr[0]][$nameAr[1]] = $value;
        return null;
    }
}


// 自动加载类
function loader($className){
    $classFile = getClassFile($className);
    if (file_exists($classFile)) {
        var_dump('exists');
        require_once($classFile);


    }
}



// 获取class绝对路径
function getClassFile($className){
    global $namespaces;
    $names = explode("\\",$className);
    $name = array_pop($names);

    $spaceDir = join("\\",$names);
    if ($spaceDir == 'MyMvcPro/mymvc') {
        $path = APP_SYS_PATH;

    } else {
        $path = $namespaces[$spaceDir];

    }
    $file = $path . "/" . $name . ".php";
    var_dump($namespaces);
    var_dump($spaceDir);
    var_dump($file);
    return $file;

}



?>
