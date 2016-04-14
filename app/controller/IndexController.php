<?php
/**
 *	Test Unit 测试控制器
 *	
 */

class IndexController extends Controller{
 
    //首页默认方法
    public function index(){
        echo "This is fun index()";
    }
 
    //测试方法
    public function hello(){
        echo "This is fun hello()";
    }
}
