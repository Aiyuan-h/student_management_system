<!-- 文件的上传和下载 -->
<!-- 客户端配置： -->
<!-- 表单页面 -->
<!-- 表单的发送方式为post -->
<!-- 添加enctype=“multipart/form-data” -->

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>the image</title>
</head>
<body>
<form action="do_action.php" method="post" enctype="multipart/form-data">
请选择要上传的文件：
<input type="file" name="myfile" /><br />
<input type="submit" value="上传文件"/><br />
</form>
</body>
</html>