<?php
/**
 *	Test Unit 测试控制器
 *	
 */
use MyMvcPro\libs\Test;


class IndexController extends Controller{
 
    //首页默认方法
    public function index(){
        echo "This is fun index()";
    }
 
    //测试方法
    public function hello(){
        echo "This is fun hello()";
    }

    public function nsTest(){
    	$info = Test::test();
    	echo $info;
    	// var_dump(dirname(APP_SYS_PATH));

    }
}
