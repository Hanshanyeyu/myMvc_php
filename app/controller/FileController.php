<?php
use MyMvcPro\mymvc\File;

/**
 *	文件类控制器.
 *	date: 2016/04/25
 *  author: love_shift
 */


class FileController extends Controller{
 
    //测试文件存储及读取
    public function test(){
        $file = TEMP_PATH."/myfmvc.txt";
        //写入文件内容
        File::write($file,"test data by tanght at 2016/04/25");
        //读取文件内容
        $content = File::read($file);
        echo $content;
    }
 
    //测试缓存保存及读取
    public function cache(){
        $author = array(
            "name"=>"tanght",
            "web"=>"github.com/pytanght.io",
        );
        $key = "author";
        //写入缓存
        File::writeArrayCache($key,$author);
        //读取缓存
        $cacheData = File::readArrayCache($key);
        $this->echoJson($cacheData);
    }
 
}