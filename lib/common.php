<?php
/**
 * 封装了一些通用的方法
 * 
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 */

 class LCommon{
 	/**
	 * 重定向控制器
	 * @param $Str
	 * @example Redirect('index/index')  重定向到index控制器的index方法 
	 * @todo
	 */
	 function Redirect($Str)
	 {
	 	$Str = split('/', $Str);
	 	$StrController = empty($Str[0]) ? 'c=index' : "c=$Str[0]";
	 	$StrAction = empty($Str[1]) ? '' : "&act=$Str[1]";
	 	$StrUrl = $StrController.$StrAction;
//	 	$StrUrl = 'http://127.0.0.1/etouch_english_manage/index.php';
//	 	print_r($StrUrl);
		echo '<meta http-equiv="content-type" content="text/html; charset=UTF-8" />';
		echo "<META  HTTP-EQUIV=\"Refresh\" CONTENT=\"1; URL=index.php?$StrUrl\">";
		echo "重定向到 $StrUrl";
	 	
	 }
	 /**
	  * 发送一个get请求
	  * @param $url 
	  */
	 function SentAGet($url)
	 {
	 	return file_get_contents($url);
	 }
	 /**
	  * 根据传递的path的值创建目录
	  * @param $Str
	  */
	 function BuildPath($Str)
	 {
	 	if(!is_dir($Str))
	 	{
	 		mkdir($Str,'0777',true);
	 	}
	 	return true;
	 }
 }