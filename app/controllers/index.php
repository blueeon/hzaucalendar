<?php
 /**
 * 缺省的控制器
 * 
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 */
 class CIndex extends LBaseController
 {
 	function __construct()
 	{
 		
 		parent::__construct();
 		echo '这里是首页<br />';
 		echo '<a href="index.php?c=content&act=addcontent">插入新的记录</a>';
 		$this->LoadModel('MDefault');
 		
 	}
 	function index()
 	{
 		
//		return $this->ReturnAddId();	
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