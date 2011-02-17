<?php
 /**
 * 框架最原始基类,核心类，加载一些底层方法参数。谨以此类名献给deling.
 * @copyright Copyright (c) etouch.cc
 * @author blueeon(blueeon@blueeon.net)
 * @version 1.0.0b
 */
 class LDeling
 {
 	protected $CONFIG = '';
 	protected $SETTING = '';
 	public function __construct()
 	{
 		//载入配置文件中的数据，并放入一个变量进行保存
 		require 'config/globalconfig.php';
 		require 'config/setting.php';
 		$this->CONFIG = $CONFIG;
 		$this->SETTING = $SETTING;
 	}
 }