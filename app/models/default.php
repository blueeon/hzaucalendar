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
 		$query = "SELECT * FROM  `category`";
 		$result = mysql_query($query, $this->ObDb) or die(mysql_error());
 		while($row=mysql_fetch_array($result))
	    {    
	    	print_r($row);
	    }
 	}
 }