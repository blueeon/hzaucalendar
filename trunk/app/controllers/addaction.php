<?php
 /**
 * 添加一个活动
 * 
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 * @todo 时间来不及了，只能做这么简单，需要完善的地方还很多，够不上产品级
 */
 class CAddAction extends LBaseController
 {
 	function __construct()
 	{
 		parent::__construct();
 		echo '这里是首页<br />';
// 		echo '<a href="index.php?c=content&act=addcontent">插入新的记录</a>';
 		$this->LoadModel('MAction');
// 		$this->MAction->Hello();
		if($_POST['submit'])
			$this->AddIntoDatabase();
		
 	}
/**
 * 添加活动控制器的视图
 * @see lib/LBaseController::index()
 * 
 */
 	function index()
 	{
 		$ArrData['{@formaction}'] = '';
 		$ArrData['{@actionType}'] = '';
 		$this->LoadView('addaction',$ArrData);
 	}
 	private function AddIntoDatabase()
 	{
 		$ArrPostsList	=	array('actname','desc','startTime','Endtime','Location','Province','City','selecttype1','selecttype2','Organizers','Attention','Spend');
 		$ArrPostDate	=	array();
 		foreach ($ArrPostsList as $key) {
 			$ArrPostDate[$key]	=	$_POST[$key];
 		}
 		$this->MAction->AddAction($ArrPostDate);
 	}
 	/**
 	 * 登陆函数
 	 */
 	function Login()
 	{
 		
 	}
 	/**
 	 * 登出函数
 	 */
 	function Logout()
 	{
 		
 	}
 }
 /* End of file  */