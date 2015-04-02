
<?php 
/*
服务器端配置：
file_uploads=On,支持HTTP上传
upload_tmp_dir=,临时文件保存的目录
upload_max_filesize=2M,允许上传文件的最大值
max_file_uploads=20,允许一次上传的最大文件数
post_max_size=8M,POST方式发送数据的最大值
通过phpinfo（）来查询php.ini配置文件所在位置

文件上传配置：
max_execution_time=-1,设置了脚本被解析器终止之前允许的最大执行时间，单位为妙，防止程序写得不好而占尽服务器资源。
max_input_time=60,脚本解析输入数据允许的最大时间，单位是秒。
max_input_nesting_level=64,设置输入变量的嵌套深度。
max_input_vars=1000,接受多少输入的变量（限制分别应用于$_GET、$_POST和$_COOKIE超全局变量）指令的使用减轻了以哈希碰撞来进行拒绝服务攻击的可能性。如有超过指令数量的变量，将会导致E_WARNING的产生，更多的输入变量将会从请求中截断
memory_limit=128M,最大单线程的独立内存使用量。也就是一个web请求，给予线程最大的内存使用量的定义。

错误信息说明：
UPLOAD_ERR_OK:其值为0，没有错误发生，文件上传成功
UPLOAD_ERR_INI_SIZE:其值为1，上传的文件超过了php.ini中upload_max_filesize选项限制的值。
UPLOAD_ERR_FORM_SIZE:其值为2，上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值
UPLOAD_ERR_PARTIAL:其值为3，文件只有部分被上传。
UPLOAD_ERR_NO_FILE:其值为4，没有文件被上传。
UPLOAD_ERR_TMP_DIR:其值为6，找不到临时文件夹。
UPLOAD_ERR_CANT_WRITE:其值为7，文件写入失败。
UPLOAD_ERR_EXTENSION:其值为8，上传的文件被PHP扩展程序中断。

文件上传限制
服务器端限制：
限制上传文件的大小
限制上传文件类型
检测是否为真实图片类型
检测是否为HTTP POST方式上传
*/

//$_FILES:文件上传变量
//将服务器上的临时文件移动到指定目录下
//move_uploaded_file($tmp_name,$destination):将服务器上的临时文件移动到指定目录下
//叫什么名字，移动成功返回true，否则返回false
// print_r($_FILES);
// $file_name=$_FILES['myfile']['name']; //二维数组
// $type=$_FILES['myfile']['type'];
// $tmp_name=$_FILES['myfile']['tmp_name'];
// $size=$_FILES['myfile']['size'];
// $error=$_FILES['myfile']['error'];

header('content-type:text/html;charset=utf-8');

print_r($_FILES);
$file_info=$_FILES['myfile'];
$file_name=$file_info['name']; //二维数组
$type=$file_info['type'];
$tmp_name=$file_info['tmp_name'];
$size=$file_info['size'];
$error=$file_info['error'];
	
 if(UPLOAD_ERR_OK == $error){
	if(move_uploaded_file($tmp_name, "uploads/".$file_name)){
		echo '文件'.$file_name.'上传成功';
	}else{
		echo '文件'.$file_name.'上传失败';
	}
}else{
	//匹配错误信息 这里还是存在错误的，需要马上找出来，
	switch($error){
		case 1:
			echo '上传的文件超过了PHP配置文件中upload_max_filesize选项的值';
			break;
		case 2:
			echo '超过了表单MAX_FILE_SIZE限制的大小';
			break;
		case 3:
			echo '文件部分被上传';
			break;
		case 4:
			echo '没有选择上传文件';
			break;
		case 6:
			echo '没有找到临时目录';
			break;
		case 7:
		case 8:
			echo '系统错误';
			break;
	}	
}
//copy（$src,$dst）:将文件拷贝到指定的目录，拷贝成功返回true，否则返回false
//move_uploaded_file($tmp_name, "./uploads/".$filename);//php字符串连接使用.

