<?php
/**
 *	MVC模型核心类库
 *	author: love_shift
 *  date: 2016/04/14
 */


//设置时区为中国时区: PRC
date_default_timezone_set('PRC');

/**
 * 定义项目环境变量
 */

//项目跟路径，且绝对路径.
define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']));
//站点路径，相对路径
define('SITE_PATH',dirname($_SERVER['SCRIPT_NAME']));
//系统配置路径
define('APP_SYS_PATH',dirname(__FILE__));
// define('APP_SITE_PATH',dirname(dirname(__FILE__)));


//引用全局函数
require_once(APP_SYS_PATH."/functions.php");

//获取控制器 && 方法
$route = getRoute();
$controller = $route['c'];
$action = $route['a'];

$controllerName = $controller.'Controller';
$controllerFile = sprintf("%s/app/controller/%s.php",APP_PATH,$controllerName);

// var_dump($controllerFile);

if (file_exists($controllerFile)) {
	// 引用控制器.
	require_once APP_SYS_PATH."/controller.php";
	require_once $controllerFile;
	// 申明类的实例 && 调用方法.
	$myins = new $controllerName();
	$myins->_before_action();
	$myins->{$action}();
	$myins->_after_action();

} else {
	echo "Page not found. 404";

}


?>