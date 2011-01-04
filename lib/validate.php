<?php 
/**
 * 封装了一些数据过滤验证处理的方法
 * 
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 */
 class LValidate
 {
	 /**
	  * 处理一个post请求后的数据
	  * @param $Str
	  * @todo 
	  */
	 function APost($Str)
	 {
	 	$Str = $this->AREQUEST($Str);
	 	return $Str;
	 }
	 /**
	  * 处理一个GET请求后的数据
	  * @param $Str
	  * @todo
	  */
	 function AGet($Str)
	 {
	 	$Str = $this->AREQUEST($Str);
	 	return $Str;
	 }
	 /**
	  * 对浏览器发送过来的请求做一个统一的处理
	  * @param $Str
	  * @todo
	  */
	 function AREQUEST($Str)
	 {
	 	return $Str;
	 }
	 function hello()
	 {
	 	echo 'hello world.';
	 }
 }
 
/* End of file  */