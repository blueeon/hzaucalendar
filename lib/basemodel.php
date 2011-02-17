<?php
 /**
 * 模型基类，所有的模型都应该继承自这个类
 * 
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 */
 class LBaseModel extends LDeling
 {
 	/**
 	 * 保存数据库连接
 	 * @var 
 	 */
 	protected $db ;
 	
  	/**
 	 * 保存DB类对象地址
 	 * @var object
 	 */
 	protected $ObDb;	
 	
 	function __construct()
 	{
 		parent::__construct();
// 		echo $this->CONFIG[];
		$LiDb	=	new LDb();
 		$this->ObDb	=	$LiDb->ObDb;
// 		$this->ObDb->hello();

 	}
 	function __destruct()
 	{
 		
 	}
}