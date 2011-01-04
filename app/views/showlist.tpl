<div id="maincontent">
<div id="left">
<h2><a href="#">听力材料列表</a></h2>
<div id="en_listBOx">
	
</div>


</div>
<script	type="text/javascript" src="js/ajaxfileupload.js"></script> 
<script	type="text/javascript">
	$(document).ready(function() {
		//$('#ID值').attr('属性名','属性值');  比如
		$('#resouceurl').attr('value','test');
		
		function ajaxFileUpload()
		{	
			$("#loading")
			.ajaxStart(function(){
				$(this).show();
			})
			.ajaxComplete(function(){
				$(this).hide();
			
			});

			$.ajaxFileUpload
			(
				{
					url:'../FileUpload',
					secureuri:false,
					fileElementId:'resource',
					dataType: 'json',
					success: function (data, status)
					{
						if(typeof(data.error) != 'undefined')
						{
						alert("test");
						}
					},
					error: function (data, status, e)
					{
					}
				}
			)
			return false;
		}
});	
	
</script>