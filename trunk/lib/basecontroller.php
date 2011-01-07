<?php
 /**
 * 控制器基类，所有的控制器都应该继承自这个类
 * 
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 */
 class LBaseController extends LDELING
 {
 	/**
 	 * 保存共用函数库对象地址
 	 * @var object
 	 */
 	protected $ObCommon;
 	protected $ObjValidate;
 	public  function __construct()
 	{
 		parent::__construct();
 		$ObjValidate = new LValidate;
 		$this->ObjValidate = $ObjValidate;
 		@$StrAct = $ObjValidate->AGet($_GET['act']);
 		$this->ObCommon = new LCommon;
 		
 		$ArrMethods = get_class_methods($this);
 		foreach ($ArrMethods as $value )
 		{
 			$ArrMethods[] = strtolower($value);
 		}

 		//检查act值
 		if((!in_array($StrAct, $ArrMethods) || empty($StrAct)))
 		{
 			
 			//重定向
 			if(@$ObjValidate->AGet($_GET['c']) != $this->CONFIG['default'])
//	 			readfile($this->CONFIG['baseurl'].'index.php?c=index&act=index');
 				@$this->ObCommon->Redirect($ObjValidate->AGet($_GET['c']).'/index');
 		}
 		else	$this->$StrAct();
 	}
 	function index()
 	{
 		echo '默认控制器';
 	}
 	/**
 	 * 模型加载函数，加载完毕后将可直接使用   $this->模型名 的形式调用模型方法
 	 * @param $Str 模型类名
 	 */
 	protected function LoadModel($Str)
 	{
 		$StrFileName = strtolower(substr($Str,1));
 		require_once ('./app/models/'.$StrFileName.'.php');
 		$ObjMOdel = new $Str;
 		$this->$Str = $ObjMOdel;
 	}
 	/**
 	 * 加载视图，进行一些数据的替换
 	 * @param $Str 视图文件名  
 	 * @param $Array 需要进行简单替换的一些标记 
 	 * @todo
 	 */
 	protected function LoadView($Str , $Array = '')
 	{
// 		$StrFileName = strtolower(substr($Str,1));
// 		include_once ('./app/views/'.$Str.'.tpl');
		$StrTemp = file_get_contents('./app/views/'.$Str.'.tpl');
		if(is_array($Array))
		{
			foreach($Array as $key => $value)
			{
				$StrTemp = str_replace($key,$value,$StrTemp);
			}
		}
		echo $StrTemp;
// 		readfile('./app/views/'.$Str.'.tpl');
// 		$ObjMOdel = new $Str;
// 		$this->$Str = $ObjMOdel;	
//		echo $Str.'tpl';	
 	}
 	/**
 	 * 加载一个助手类
 	 * @param $Str 助手类类名
 	 */
 	protected function LoadHelper($Str)
 	{
 		$StrFileName = strtolower(substr($Str,1));
 		require_once ('./app/helpers/'.$StrFileName.'.php');
 		$ObjHelper = new $Str;
 		$this->$Str = $ObjHelper;
 	}
 }
/* End of file  */