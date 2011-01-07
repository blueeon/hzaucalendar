<?php
/**
 * 数据库CRUD类，实现简单的增查改删，以及普通的sql执行语句。 
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 * @todo 此处单例模型没有实现，需要日后重新实现，或者在引入activerecord后废弃此数据库类
 */
 class LDb extends LDeling
 {
 	/**
 	 * 保存数据库单例对象
 	 * @var object
 	 */
 	public  $ObDb;
 	public function __construct()
 	{
 		if($this->ObDb)
 			return $this->ObDb;
 		parent::__construct();
// 		print_r($this->CONFIG);
 		$conn=mysql_connect($this->CONFIG['db_host'], $this->CONFIG['db_user'],$this->CONFIG['db_psw'])
			or die('error');
		
		mysql_select_db($this->CONFIG['db_name']) //选择数据库mydb 
		or die("数据库不存在或不可用");
		mysql_query('set names '.$this->CONFIG['db_charset'],$conn);
//		print_r($conn);
		return $this->ObDb	=	$conn;
 		
 	}
 	public function hello()
 	{
 		echo 'hello db';
 	}
 	
 	function __destruct()
 	{
 		//关闭数据库
 		mysql_close();
 	}
 }