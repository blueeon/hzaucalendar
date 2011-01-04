<?php
/**
 * content模型，封装关于有关content操作的业务逻辑
 * 
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 */
 class MContent extends LBaseModel
 {
 	/**
 	 * 数据库指针，存放单例
 	 * @var unknown_type
 	 */
 	
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
 	function __destruct()
 	{
 		mysql_close($this->db);
 	}
	function hello()
	{
		echo "model11";
	}
	/**
	 * 根据指定的级数返回分类列表
	 * @param $Int 分类的级数
	 * @return 指定级数的分类列表
	 */
	function GetCategory($Int)
	{
		$query = 'SELECT * From category WHERE LEVEL = '.$Int.';';
		$result = mysql_query($query, $this->db) or die(mysql_error());
		while($row=mysql_fetch_array($result))
	    {    
//	        $Array[$row[id]] = array('id' => $row[id],'categoryName' => $row['categoryName'],'parentCategoryId' => $row['parentCategoryId'],'level' => $row['level']);
			$Array[] = array(		 $row[id],					$row['categoryName'],					   $row['parentCategoryId'],		   $row['level']);
	    }
		return $Array;
	}
	/**
	 * 将新的content插入到数据库中
	 * @param $Arr 数据数组 
	 */
	function AddContent($Arr)
	{
		$query = 'INSERT INTO `content` (`categoryId`, `keywords`, `title`, `icon`, `image`, `description`, `content`, `resouceurl`, `state`, `author`, `public_date`) 
				 VALUES ("'.$Arr[category].'", "'.$Arr[keywords].'", "'.$Arr[title].'", "'.$Arr[Thumb].'", "'.$Arr[Img].'", "'.$Arr[description].'", "'.$Arr[content].'", "'.$Arr[resouceurl].'", \'publish\', \'blueeon\', "'.date('Y-m-j').'");';
		$result = mysql_query($query, $this->db) or die(mysql_error());
		return $this->ReturnAddId();
	}
	/**
	 * 返回SELECT last_insert_id()
	 * @return id
	 */
	function ReturnAddId()
	{
		$query = 'SELECT last_insert_id()';
		$result = mysql_query($query, $this->db) or die(mysql_error());
		return current(mysql_fetch_array($result));
	}
 }