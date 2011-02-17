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
 	/**
 	 * 返回feed列表xml
 	 */
 	function FeedList() {
		$xmlFeedList = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
 		$ArrData = $this->MFeed->FeedList($this->ObjValidate->APost($_GET['page']));
 		$xmlFeedList .= '<feedlist total = "">';
 		foreach ($ArrData as $key => $value)
 		{
 			$xmlFeedList .= '<feed fid="'.$value['fid'].'" cid="'.$value['cid'].'" >' ;
 			$xmlFeedList .= '<content>'.$value['content'].'</content>';
 			$xmlFeedList .= '<date><year>'.$value['year'].'</year><month>'.$value['month'].'</month><day>'.$value['day'].'</day><dateline>'.$value['dateline'].'</dateline></date>' ;
 			$xmlFeedList .= '</feed>' ;
 		}
 		$xmlFeedList .= '</feedlist>';
 		header("Content-type: text/xml");
 		echo $xmlFeedList;
 	}
 	function FeedView() {
 		;
 	}
 }