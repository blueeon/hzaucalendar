<?php
/**
 * 默认测试模型
 * 
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 */
 class MDefault extends LBaseModel
 {
 	/**
 	 * 数据库指针，存放单例
 	 * @var unknown_type
 	 */
 	var $db ;
 	function __construct()
 	{
 		parent::__construct();
 		
 		//当前应用配置
//		$contactsCfg=array(
//			'server_name'	=>	'127.0.0.1',
//			'username'		=>	'root',
//			'password'		=>	'123',
////			'database'		=>	'english_listen'
//			'database'		=>	'etouch_english'
//		);
//		/*
//		*查询该用户的通讯录
//		*
//		*/
//		$conn=mysql_connect($contactsCfg['server_name'], $contactsCfg['username'],$contactsCfg['password'])
//			or die('error');
//		mysql_query("set names utf8");
//		mysql_select_db($contactsCfg['database']) //选择数据库mydb 
//		or die("数据库不存在或不可用");
//		$this->db = $conn;
 	}
 }