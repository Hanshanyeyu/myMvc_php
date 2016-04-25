<?php

namespace MyMvcPro\mymvc;

/**
 *	MVC框架文件操作类
 *	date: 2016/04/25
 *  author: love_shift
 */


class File {
	// 读文件
	public static function read($filename){
		$file_handle = @fopen($filename,'r');
		if (!$file_handle) {
			return null;

		} else {
			$content = fread($file_handle, filesize($filename));
			fclose($file_handle);
			return $content;

		}

	}

	// 写文件
	public static function write($filename,$content){
		// $file_handle = @fopen($filename,'w');
		$dir_name = dirname($filename);
		// 判断目录
		is_dir($dir_name) or mkdir($dir_name,0777);

		$file_handle = @fopen($filename,'w');
		if (!$file_handle) {
			return false;
		
		} else {
			fwrite($file_handle,$content);
			fclose($file_handle);
			return true;

		}

	}

	// 删除文件
	public static function delete($filename){
		if (file_exists($filename)) {
			$res = @unlink($filename);
			if ($res) {
				return true;
			} else {
				return false;
			}

		} else {
			return 'Error,the file is no exists';

		}	
	}

	// 判断是否为空目录
	public function is_empty_dir($pathdir){
		if (is_dir($pathdir) && count(scandir($pathdir)) == 2) {
			return true;

		} else {
			return false;

		}
	} 

	// 循环删除目录 && 文件
	public static function deleteTree($pathdir) {
        if (self::is_empty_dir($pathdir)) {
        	//如果是空目录,直接删除.
            @rmdir($pathdir);
   
        } else {
        	//否则读这个目录，除了.和..外
            $d = dir($pathdir);
            while ($a = $d->read()) {
                if (is_file($pathdir . '/' . $a) && ($a != '.') && ($a != '..')) {
                    @unlink($pathdir . '/' . $a);
                }
                //如果是文件就直接删除
                if (is_dir($pathdir . '/' . $a) && ($a != '.') && ($a != '..')) {//如果是目录
                    if (!self::isEmptyDir($pathdir . '/' . $a)) {//是否为空
                        //如果不是，调用自身，不过是原来的路径+他下级的目录名
                        self::deltree($pathdir . '/' . $a);
                    }
                    if (self::isEmptyDir($pathdir . '/' . $a)) {//如果是空就直接删除
                        @rmdir($pathdir . '/' . $a);
                    }
                }
            }
            $d->close();
            @rmdir($pathdir);
        }
    }
	
    // 循环删除目录和文件
    public function deltree($pathdir){
    	if (self::is_empty_dir($pathdir)) {
    		@rmdir($pathdir);

    	} else {
    		$dirStream = dir($pathdir);
    		while ($sub = $dirStream->read()) {
    			if (is_file($pathdir.'/'.$sub) && ($sub != '.') && ($sub != '..')) {
    				@unlink($pathdir.'/'.$sub);

    			}
    			if (is_dir($pathdir.'/'.$sub) && ($sub != '.') && ($sub != '..')) {
    				if (!is_empty_dir($pathdir.'/'.$sub)) {
    					self::deltree($pathdir.'/'.$sub);

    				}

    				if (is_empty_dir($pathdir.'/'.$sub)) {
    					@rmdir($pathdir.'/'.$sub);

    				}

    			}
    		}


    	}
    	$dirStream->close();
    	@rmdir($pathdir);
 }


 	// TEST DATA
 	 public static function dirList($dir, $pattern = "") {
        $arr = array();
        $dir_handle = opendir($dir);
        if ($dir_handle) {
            // 这里必须严格比较，因为返回的文件名可能是“0”
            while (($file = readdir($dir_handle)) !== false) {
                if ($file === '.' || $file === '..') {
                    continue;
                }
                $tmp = realpath($dir . '/' . $file);
                if (is_dir($tmp)) {
                    $retArr = self::dirList($tmp, $pattern);
                    if (!empty($retArr)) {
                        $arr[] = $file;
                    }
                } else {
                    if ($pattern === "" || preg_match($pattern, $tmp)) {
                        $arr[] = $file;
                    }
                }
            }
            closedir($dir_handle);
        }
        return $arr;
    }


    // 写入数组到文件
    public static function writeArray($file,$data){
    	$dir = dirname($file);
    	is_dir($dir) or mkdir($dir,0777);
    	$data = '<?php return ' . var_export($data, TRUE) . ';';
    	return file_put_contents($file, $data);

    }

 	// 读取数组文件
    public static function readArray($file){
    	if (file_exists($file)) {
    		$data = include_once $file;
    		return $data;

    	}
    	return array();

    }

 	// 读取数组缓存
    public static function writeArrayCache($key, $data) {
        $file = CACHE_PATH . "/" . $key . '.php';
        self::writeArray($file, $data);
    }
 
    /**
     * 读取数组缓存
     * @param string $key 缓存key
     * @return array|mixed
     */

    public static function readArrayCache($key) {
        $file = CACHE_PATH . "/" . $key . '.php';
        return self::readArray($file);
    }
 

}














