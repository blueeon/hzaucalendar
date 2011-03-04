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
 		$ArrData = $this->MFeed->FeedList($this->ObjValidate->APost($_GET['page']) , $this->ObjValidate->APost($_GET['num']));
 		$xmlFeedList .= '<feedlist total = "">';
 		foreach ($ArrData as $key => $value)
 		{
 			$xmlFeedList .= '<feed fid="'.$value['fid'].'" cid="'.$value['cid'].'" cname="'.$value['cname'].'">' ;
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
 	function TagList()
 	{
 		$xmlTagList = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
 		$ArrData = $this->MFeed->TagList($this->ObjValidate->APost($_GET['num']));
 		$xmlTagList .= '<taglist total = "'.count($ArrData).'">';
 		$tempArr = array();
 		foreach ($ArrData as $key => $value)
 		{
 			$tempArr[] = $value['count'];
 		}
 		
 		foreach ($ArrData as $key => $value)
 		{
 			if(rand(0,40)<4)
 				$xmlTagList .= '<tag type="max">' ;
 			else 
 				$xmlTagList .= '<tag>' ;
 			$xmlTagList .= '<content>'.$value['tag'].'</content>';
 			$xmlTagList .= '<count>'.$value['count'].'</count>' ;
 			$xmlTagList .= '</tag>' ;
 		}
 		$xmlTagList .= '</taglist>';
 		header("Content-type: text/xml");
 		echo $xmlTagList;
//print_r($ArrData);
 	}
 }