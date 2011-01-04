<div id="maincontent">
<div id="left">
<h2><a href="#">新增内容</a></h2>
<form action="" method="post" ENCTYPE= "multipart/form-data">
<div  id="en_input_title">标题：<input  type=text name=title><img class='en_right' src="images/check.png"></div>
<br></br>
<div>主分类： 
	<select id='category1' name="category">
		{@1category}
	</select> 
	二级分类： 
	<select id='viceCategory' name="viceCategory">

	</select>
</div>
<br></br>
<div>描述：<textarea name="description" cols="40" rows="3"></textarea><img class='en_right' src="images/check.png"></div>

<br></br>
<div>标签：<input type=text name=lable> 多个标签请用  , 隔开</div>
<br></br>
<div >缩略图：	<input id="UploadThumb" type=file name="UploadThumb">
				<input id="UploadThumb_" name="UploadThumb_" type='hidden'  >
			 	<input type=button	value=上传 id="en_UploadThumb">
			 	<img 	class="loading loadingUploadThumb" src="loading.gif" style="display: none;">
			 	<img class='en_right' src="images/check.png">
</div>
<div>原图片：	<input type=file name='UploadImg' id='UploadImg' >
				<input id='UploadImg_' name='UploadImg_' type=hidden >
				<input type=button value=上传 id="en_UploadImg">
				<img 	class="loading loadingUploadImg" src="loading.gif" style="display: none;">
				<img class='en_right' src="images/check.png">
</div>
<div>内容：<textarea id="en_xh"  name="content" cols="60" rows="5"></textarea></div>
<div>音频文件：	<input id='UploadAudioFiles' type=file name='UploadAudioFiles'>
				<input id='UploadAudioFiles_' name='UploadAudioFiles_' type=hidden >
				<input	type=button value=上传 id="en_UploadAudioFiles">
				<img	class="loading loadingUploadAudioFiles" src="loading.gif" style="display: none;">
				<img class='en_right' src="images/check.png">
</div>
<div><input type=submit value=提交></div>
</form>
</div>
<script	type="text/javascript" src="js/ajaxfileupload.js"></script>
<script	type="text/javascript" src="js/xheditor-1.1.0/xheditor-zh-cn.min.js"></script>

<script	type="text/javascript">
	$(document).ready(function() {
		$('#en_input_title').keyup(function(){
			if($('#en_input_title input').attr('value').length>1 )
				$('#en_input_title').find('img').css('display','block');
			else $('#en_input_title').find('img').css('display','none');
		});
		//上传组件
		uploadFile('#en_UploadThumb');
		uploadFile('#en_UploadImg');
		uploadFile('#en_UploadAudioFiles');
	
		$('#en_xh').xheditor({tools:'full',skin:'nostyle',width:500,wordDeepClean:false});	
		var Str2Category = {@2category};
		//生成select 列表
		$('#viceCategory').empty().append(buildSelectHtml($('#category1').val()));
		$('#category1').change(function(){
			$('#viceCategory').empty().append(buildSelectHtml($(this).val()));
		});
		function buildSelectHtml(parentId)
		{
			var HTML='';
			var Obj2Category = Str2Category;
			for(var i=0;i<Obj2Category.length;i++)
			{
				if( Obj2Category[i][2] ==  parentId)
				{
					HTML += '<option value="'+Obj2Category[i][0]+'">'+Obj2Category[i][1]+'</option>' ;
				}
			}
			if(HTML)
				return HTML;
		}
		//上传文件的函数
		function uploadFile(ID)
		{
			$(ID).click(function(){
				$(this).parent().find(".loading"+ID.split('_')[1])
				.ajaxStart(function(){
//					alert(".loading"+ID.split('_')[1]);
					$(this).show();
				})
				.ajaxComplete(function(){
					$(this).hide();
					
				});
				ajaxFileUpload(ID.split('_')[1]);
//				alert($(this).parent().html());
			});
		}
		
		function ajaxFileUpload(id)
		{
//				var selected=$("#csvFrom").val();
				
				$.ajaxFileUpload
				(
					{
						
						url:'{@baseurl}/index.php?c=content&act='+id,
						secureuri:false,
//						data:{'select':ID},
						fileElementId:id,
						dataType: 'text',
						success: function (data, status)
						{
								key = data.split('##')[1];
								data = data.split('##')[0];
								if(key == 'error')
								{
									alert('抱歉:'+data);
								}
								else if(key == 'file'){
//									alert('#'+id+'_');
									$('#'+id+'_').attr('value',data);
//									alert('file:'+data);
								}else
								{
									alert(data);
								}
						},
						error: function (data, status, e)
						{
							alert(e);
						}
	
					}
				)		
			return false;
		}

});	
	
</script>