<?php
/**
 * 全局配置文件
 */
 /**
  * 项目全局配置，每类配置使用  配置类型_配置名 的形式命名： db_host.
  * 凡涉及到目录地址，URL地址，必须以'/'结尾
  * @var array
  */
 $CONFIG = array();
 
 /*
  *  网站基本配置配置
  */
 $CONFIG['baseurl'] 		= 'http://127.0.0.1/dblectureshare/';		//网站的的根URL,以/结尾
 $CONFIG['default']			= 'index';									//默认访问控制器
 
 /*
  * 数据库相关配置
  */
 $CONFIG['db_host'] 		= 'localhost';		//数据库服务器地址
 $CONFIG['db_name'] 		= 'blueeon_dblectureshare';				//数据库名字
 $CONFIG['db_user'] 		= 'root';				//数据库用户名
 $CONFIG['db_psw']			= '123';				//密码
 $CONFIG['db_tablepre']		= '';				//数据库表前缀，tablepre_
 $CONFIG['db_charset']		= 'utf8';			//数据库字符集，默认使用utf8
 
 /*
  * 文件目录相关设置 
  */
 $CONFIG['file_dir']		= 'files/';		//附件存放位置，默认在files目录
 $CONFIG['file_maxsize']	= '2048';			//附件上传大小限制单位为 K
 
//END