<?php
 /**
 * feed管理
 * 
 * @copyright Copyright (c) blueeon
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 * @todo 完成关键的几个控制器
 */
class CFeed extends LBaseController
 {
 	function __construct()
 	{
 		$this->LoadModel('MFeed');
 		parent::__construct();
// 		echo '这里是首页<br />';
// 		$this->MAction->Hello();
 	}
 	function AddFeed() {
 		$ArrData = array(
 		"cid"	=>	$this->ObjValidate->APost($_POST['cid']),
 		"year"	=>	$this->ObjValidate->APost($_POST['year']),
 		"month"	=>	$this->ObjValidate->APost($_POST['month']),
 		"day"	=>	$this->ObjValidate->APost($_POST['day']),
 		"dateline"	=>	time(),
 		"content"	=>	$this->ObjValidate->APost($_POST['content'])
 		);
 		$StrTag = $this->ObjValidate->APost($_POST['tag']);
 		if($this->MFeed->AddFeed($ArrData , $StrTag))
 			echo "插入成功";
 	}
 	function DelFeed() {
 		;
 	}
 	function updateFeed() {
 		;
 	}
 	function FeedList() {
 		$ArrData = $this->MFeed->FeedList();
 		print_r($ArrData);
 	}
 	function FeedView() {
 		;
 	}
 }