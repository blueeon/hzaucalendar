<?php
/**
 * Feed模型，封装关于有关Feed操作的业务逻辑
 * 
 * @copyright Copyright (c) blueeon
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 */
 class MFeed extends LBaseModel
 {
 	/**
 	 * 数据库指针，存放单例
 	 * @var unknown_type
 	 */
 	
 	function __construct()
 	{
 		parent::__construct();
 		
 	}
 	/**
 	 * 增加一条feed
 	 * @param $ArrData 表单内容
 	 * @param $StrTag	tags
 	 */
 	function AddFeed($ArrData , $StrTag) {
 		$ArrData = $this->ArrRebuild($ArrData);
 		$query = 'INSERT INTO .`feeds` ('.$ArrData['key'].') VALUES ('.$ArrData['value'].');';
// 		print_r($query);
 		$result = mysql_query($query, $this->ObDb) or die(mysql_error());
 		$result = mysql_query('SELECT LAST_INSERT_ID( )', $this->ObDb) or die(mysql_error());
 		$LastId = mysql_fetch_array($result);
 		$LastId = $LastId[0];
 		$StrTag = spliti(',', $StrTag);
 		$ArrTag = array();
 		foreach($StrTag as $value)
 		{
 			!in_array($value,$ArrTag) ? $ArrTag[] = $value : true;
 		}
 		foreach($ArrTag as $value)
 		{
 			if(trim($value))
 				$Str .= "('$LastId' , '$value'),";
 		}
 		$Str = rtrim($Str,',');
 		$query = 'INSERT INTO `feeds-tags` (fid,tag) VALUES '.$Str.';';
// 		print_r($query);
 		$result = mysql_query($query, $this->ObDb) or die(mysql_error());
 		return true;
 	}
 	function DelFeed() {
 		;
 	}
 	function updateFeed() {
 		;
 	}
 	function FeedList() {
 		$Arrreturn = array();
 		$query = "SELECT * FROM  `feeds` LIMIT 0 , ".$this->SETTING['page_feed_num'];
 		$result = mysql_query($query, $this->ObDb) or die(mysql_error());
 		while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
 		{
 			$Arrreturn[] = $row;
 		}
 		return $Arrreturn;
 	}
 	function FeedView() {
 		;
 	}
 	/**
 	 * 把数组转化为适合插入数据库的字符串
 	 * @param $ArrData
 	 */
 	function ArrRebuild($ArrData) {
 		$Arrreturn = array(key => '',value => '');
 		foreach($ArrData as $key => $value)
 		{
 			$Arrreturn['key'].= $key.',';
 			$Arrreturn['value'].= '\''.$value.'\',';
 		}
 		$Arrreturn['key'] = rtrim($Arrreturn['key'],',');
 		$Arrreturn['value'] = rtrim($Arrreturn['value'],',');
 		return $Arrreturn;
 	}
 }