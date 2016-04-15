<?php
/**
 *	Admin后台管理类
 *	author: love_shift
 *  date:2016/04/15
 */

class UserController extends Controller{
	//Test 用户信息
	public function userInfo(){
		$userinfo = array(
			'name'=>'love_shift',
			'job'=>'engineer',
			'locate'=>'xiamen',
			'env'=> APP_SYS_PATH,
		);
		header('Content-Type:application/json; charset=utf-8');
		echo json_encode($userinfo);

	}



}