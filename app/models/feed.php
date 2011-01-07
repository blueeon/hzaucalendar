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
 	function AddFeed($ArrData , $StrTag) {
 		$ArrData = $this->ArrRebuild($ArrData);
 		$query = 'INSERT INTO .`feeds` ('.$ArrData['key'].') VALUES ('.$ArrData['value'].');';
 		$result = mysql_query($query, $this->ObDb) or die(mysql_error());
 		$result = mysql_query('SELECT LAST_INSERT_ID( )', $this->ObDb) or die(mysql_error());
 		$LastId = mysql_fetch_array($result);
 		$LastId = $LastId[0];
 		$StrTag = spliti(',', $StrTag);
 		foreach($StrTag as $value)
 		{
 			if(trim($value))
 				$Str .= "('$LastId' , '$value'),";
 		}
 		$Str = rtrim($Str,',');
 		$query = 'INSERT INTO `feeds-tags` (fid,tag) VALUES '.$Str.';';
 		print_r($query);
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
 		;
 	}
 	function FeedView() {
 		;
 	}
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