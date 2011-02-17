<?php
/* End of file  */
 class CContent extends LBaseController
 {
 	/**
 	 * 当前调用的模型
 	 * @var object
 	 */
// 	private $ObjModel;
 	function __construct()
 	{
 		$this->LoadModel('MContent');
 		parent::__construct();
 		
 		
 	}
 	function __destruct()
 	{
 	}
 	/**
 	 * 测试函数
 	 */
 	function Hello()
 	{
 		$StrTime = split('-',date('Y-m-d'));
				 $dir = '../source/'.$StrTime[0].'/'.$StrTime[1].'/'.$StrTime[2].'/';
				echo $dir;
				var_dump($this->ObCommon->BuildPath($dir) );
 		
 		echo '---hello CContent---';
 	}
 	/**
 	 * 添加一条记录
 	 * @todo
 	 */
 	function AddContent()
 	{
 		if(empty($_POST))
 		{
	 		$temp = $this->MContent->GetCategory(1);
	 		foreach ($temp as $value)
	 		{
	 			$Str1Category .= '<option value="'.$value[0].'">'.$value[1].'</option>';
	 		}
	 		$temp = $this->MContent->GetCategory(2);
	 		$Str2Category = json_encode($temp);
	 		$ArrData['{@1category}'] = $Str1Category;
	 		$ArrData['{@2category}'] = $Str2Category;
	 		$ArrData['{@baseurl}'] = 'http://127.0.0.1/etouch_english_manage';
	 		$this->LoadView('header',$ArrData);
	 		$this->LoadView('index' , $ArrData);
	 		$this->LoadView('rightbar');
	 		$this->LoadView('footer');
 		}else
 		{
 			$ArrPOstData = array(	'title' 		=>	$_POST['title'],
 									'category'		=>	($_POST['viceCategory'] == null ) ? $_POST['category'] : $_POST['viceCategory'],
// 									'viceCategory' 	=>	$_POST['viceCategory'],
 									'description'	=>	$_POST['description'],
 									'keywords'			=>	$_POST['lable'],			//关键字
 									'Thumb'			=>	'/files/'.$_POST['UploadThumb_'],			//缩略图
 									'Img'			=>	'/files/'.$_POST['UploadImg_'],           //原图
 									'content'		=>	str_replace('"','\"',$_POST['content']),
 									'resouceurl'	=>	$_POST['UploadAudioFiles_'],//mp3文件的地址
 								);
 			if($IntAddId = $this->MContent->AddContent($ArrPOstData))
 			{
 				$url = 'http://s.wap.io:8080/english_listen/SyscToCMS?category='.$ArrPOstData['category'].'&contentid='.$IntAddId;
 				if( $this->ObCommon->SentAGet($url) == '<success>Sysc Success</success>' )
 					echo '<script	type="text/javascript">alert(\'插入成功!\');</script>';
 				else echo '插入成功，不能更新。';
 				$this->ObCommon->Redirect('content/addcontent');
 				
 			}
 		}
 	}
 	/**
 	 * 显示所有信息列表
 	 * @todo
 	 */
 	function ShowList()
 	{
 		$ArrData['{@baseurl}'] = 'http://127.0.0.1/etouch_english_manage';
	 	$this->LoadView('header',$ArrData);
 		$this->LoadView('showlist',$ArrData);
 		$this->LoadView('rightbar');
 		$this->LoadView('footer');
 	}
 	/**
 	 * 上传原图片到服务器上
 	 * @todo 分离出来作为一个helper插件
 	 */
 	function UploadImg()
 	{
 		$Arr = $this->UploadFile('UploadImg');
 	}
 	/**
 	 * 上传Thumb图标到服务器上
 	 * @todo 分离出来作为一个helper插件
 	 */
 	function UploadThumb()
 	{
 		$Arr = $this->UploadFile('UploadThumb');
 	}
 	/**
 	 * 上传音频文件到服务器上
 	 * @todo 分离出来作为一个helper插件
 	 */
 	function UploadAudioFiles()
 	{
 		$Arr = $this->UploadFile('UploadAudioFiles');
 	}
 	/**
 	 * 上传文件到服务器上去
 	 * @return 上传的文件的文件名
 	 * @todo 分离出来作为一个helper插件
 	 */
 	function UploadFile($fileElementName)
 	{
 		
 		//记录错误信息
	 	$error = "";
	 	//一个记号，用来判断返回值标识的类型
	 	// key = 'error' 返回的是错误信息  key = 'file' 返回的是文件的文件名
		$key = '';
		//允许上传的文件格式
		$ArrAgreeType = array('image/jpeg','image/gif','audio/mpeg');
		if(!empty($_FILES[$fileElementName]['error']))
		{
			switch($_FILES[$fileElementName]['error'])
			{
	
				case '1':
					$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
					break;
				case '2':
					$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
					break;
				case '3':
					$error = 'The uploaded file was only partially uploaded';
					break;
				case '4':
					$error = 'No file was uploaded.';
					break;
	
				case '6':
					$error = 'Missing a temporary folder';
					break;
				case '7':
					$error = 'Failed to write file to disk';
					break;
				case '8':
					$error = 'File upload stopped by extension';
					break;
				case '999':
				default:
					$error = 'No error code avaiable';
			}
			$key = 'error';
		}elseif(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
		{
			$error = 'No file was uploaded..';
			$key = 'error';
		}elseif (!in_array($_FILES[$fileElementName]['type'], $ArrAgreeType))
		{
			$error = 'The file format is not allowed.';
			$key = 'error';
		}else 
		{
	//			$msg .= " File Name: " . $_FILES[$fileElementName]['name'] . ", ";
	//			$msg .= " File Size: " . @filesize($_FILES[$fileElementName]['tmp_name']);
				//for security reason, we force to remove all uploaded file
			 
			 //如果是mp3文件就重新放置文件位置
			 if( $_FILES[$fileElementName]['type'] == 'audio/mpeg')
			 {
				 $StrTime = split('-',date('Y-m-d'));
				 $dir = '/source/'.$StrTime[0].'/'.$StrTime[1].'/'.($StrTime[2]+3).'/';
				 //创建 目录
				 if( !$this->ObCommon->BuildPath('..'.$dir) )
				 	echo '目录创建失败..';
//				 if(is_dir('..'.$dir.$StrfileName))
//				 die('111');
			 	 $StrfileName = 'eth_'.uniqid().'_'.rand(1000,9999).'.eth';
			 	 $f='..'.$dir.$StrfileName;
			 }
			 else 
			 {
			 	$dir="./files/";
			 	$StrfileName = 'icon_'.uniqid().'_'.rand(1000,9999).'.'.end(split('\.',$_FILES[$fileElementName]['name']));
			 	$f=$dir.$StrfileName;
			 }
			 
			 if(!move_uploaded_file($_FILES[$fileElementName]['tmp_name'],$f))
			 {
			         $error = "move file failed";
			         $key = 'error';
			 }
			 else {
			 	$key = 'file';
			 	$error = "/files/".$StrfileName;
			 }
			 @unlink($_FILES[$fileElementName]);		
		}		
		
		echo $error.'##'.$key;
		return array('data'=>$error,'key'=>$key);
 	}

 	
 }