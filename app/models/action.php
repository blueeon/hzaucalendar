<?php
/**
 * action模型，对action的所有数据操作均在此完成
 * 
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 */
 class MAction extends LBaseModel
 {
 	function __construct()
 	{
 		parent::__construct();
 	}
/**
 * 添加新的活动到数据库
 * @param $Arr
 */
 	function AddAction($Arr)
 	{
 		$temp	=	'NULL';
 		foreach ($Arr as $value)
 		{
 			$temp.=	" , \'$value\'";
 		}
 		echo $temp;
 		
 		$query = 'INSERT INTO `action` (`categoryId`, `keywords`, `title`, `icon`, `image`, `description`, `content`, `resouceurl`, `state`, `author`, `public_date`) 
				 VALUES ("'.$Arr[category].'", "'.$Arr[keywords].'", "'.$Arr[title].'", "'.$Arr[Thumb].'", "'.$Arr[Img].'", "'.$Arr[description].'", "'.$Arr[content].'", "'.$Arr[resouceurl].'", \'publish\', \'blueeon\', "'.date('Y-m-j').'");';
//		$sql = 'INSERT INTO `action` VALUES (NULL, \'关于萤火虫只是的讲座\', \'一次关于萤火虫只是的讲座\', \'2010-11-20\', \'2010-11-26\', \'南京市雨花台图书馆\', \'江苏省\', \'南京市\', \'2\', \'南京图书馆\', \'来的时候带好钱\', \'5\');";
 		$result = mysql_query($query, $this->ObDb) or die(mysql_error());
		return $this->ReturnAddId();
 	}
 	function Hello()
 	{
 		echo 'hello 这里是action模型';
 	}
 }