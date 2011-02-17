<?php 
/**
 * 这个是用来进行初始化的文件
 * 
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 */
 /**
  * 自动加载
  * @param $classname
  */
 function __autoload($StrClassName) {
 	//自动加载/lib、/app/controllers目录下的类
 	$StrFileName = strtolower(substr($StrClassName,1));	
 	require_once ($StrFileName.'.php');
 }
 /**
  * 允许访问的控制器
  * @var array 
  */
 $ArrControllers = '';
 //获取控制器目录下的文件路径
 $ArrTemp = glob('app/controllers/*');
 foreach ($ArrTemp as $StrController)
 {
 	$ArrControllers[] = current(split('\.', end(split('/', $StrController))));
 }
 //根据get参数选择加载控制器
 $ObjValidate = new LValidate;
 @$StrCFileName = !empty($_GET['c']) & in_array($ObjValidate->AGet($_GET['c']),$ArrControllers) ? $ObjValidate->AGet($_GET['c']) : 'index';
 include_once './app/controllers/'.$StrCFileName.'.php';
 $StrCClassName =  'C'. ucwords($StrCFileName);
 return new $StrCClassName;
/* End of file  */