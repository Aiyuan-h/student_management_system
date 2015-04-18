<?php


define('MYSQL_HOST','localhost');
define('MYSQL_USER','root');
define('MYSQL_PW','password');
define('MYSQL_NAME','users_login');


function db_connect() {
   $result = new mysqli('MYSQL_HOST', 'MYSQL_USER', 'MYSQL_PW', 'MYSQL_NAME');
   if (!$result) {
     throw new Exception('不能够连接数据库服务器！');
   } else {
     return $result;
   }
}

function db_backup(){
    //暂时不进行封装
    $cfg_dbname='users_login';
    $cfg_dbpwd='password';
    $cfg_dbuser='root';
    //设置为北京时间，不加这句的，显示的是格林威治时间
    date_default_timezone_set('PRC');
    // 设置SQL文件保存文件名
    $filename=date("Y-m-d_H-i-s")."-".$cfg_dbname.".sql";

    // 所保存的文件名
    header("Content-disposition:filename=".$filename);
    header("Content-type:application/octetstream");
    header("Pragma:no-cache");
    header("Expires:0");
    // 获取当前页面文件路径，SQL文件就导出到此文件夹内
    $tmpFile = (dirname(__FILE__))."/".$filename;
    // 用MySQLDump命令导出数据库
    //mysqldump指令需要root权限，>重定向符也需要root权限，所以使用一个sudo是不能执行备份操作的！具体见博客有介绍。
    //$result=exec("sudo /opt/lampp/bin/mysqldump -uroot -ppassword users_login --default-character-set=utf8 >".$tmpFile);
    exec("sudo /opt/lampp/bin/mysqldump -u$cfg_dbuser -p$cfg_dbpwd $cfg_dbname --default-character-set=utf8 | sudo tee ".$tmpFile,$output,$return_var);
    if($return_var){
        throw new Exception('备份数据库失败！');
    }else{
//        $file = fopen($tmpFile, "r"); // 打开文件
//        echo fread($file,filesize($tmpFile));
//        fclose($file);
        return true;
    }
}

function db_restore($file_info,$allow_ext='sql'){
    $cfg_dbname='ttt';      //数据库名
    $cfg_dbpwd='password';  //数据库密码
    $cfg_dbuser='root';     //数据库用户名

    $file_name = $file_info['name']; //要导入的SQL文件名
    $tmp_name = $file_info['tmp_name'];

    //判断是否为数据库指定类型
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if($ext!=$allow_ext){
        throw new Exception('文件类型不符');
    }

    //判断文件是否是通过HTTP POST方式上传上来的
    if(!is_uploaded_file($tmp_name)){ 	//判断的是保存在服务器上的临时文件，这里注意写成$file_name，查看php手册上有讲解
        throw new Exception('文件不是通过HTTP POST方式上传来的');
    }

    set_time_limit(0); //设置超时时间为0，表示一直执行。当php在safe mode模式下无效，此时可能会导致导入超时，此时需要分段导入
    $fp = @fopen($tmp_name, "r") or die("不能打开SQL文件 $file_name");//打开文件，判断是否有读权限，否则不能进行重定向操作
    mysql_connect('localhost','root' ,'password') or die("不能连接数据库");//连接数据库
    mysql_select_db('ttt') or die ("不能打开数据库");//打开数据库

    echo "<p>正在清空数据库,请稍等....<br>";
    $result = mysql_query("SHOW tables");//默认使用mysql_select打开的数据库 查找数据表操作
    while ($currow=mysql_fetch_array($result)) {
        mysql_query("drop TABLE IF EXISTS $currow[0]");
        echo "清空数据表【".$currow[0]."】成功！<br>";
    }
    echo "<br>恭喜你清理MYSQL成功<br>";///opt/lampp/htdocs/student_management_system/db_backup/users_login.sq
    echo "正在执行导入数据库操作<br>";

    //导入数据库的MySQL命令,返回值为0、1、2、3、4 ，0表示成功其余都表示失败！
    exec("/opt/lampp/bin/mysql -u$cfg_dbuser -p$cfg_dbpwd $cfg_dbname< ".$tmp_name,$output,$return_var);

    if($return_var){
        throw new Exception('数据库恢复失败！');
    }else {
        echo "<br>导入完成！";
        mysql_close();
        return true;
    }
}

//
//if($file_info['error']>0){
//    //匹配错误信息 这里根据网上资源说，服务器是不限制文件的具体大小的，及时php.ini限制了文件的大小也只是会推送错误，并不会改变error的值
//    //case 1 这种情况可能不发生
//    switch($file_info['error']){
//        case 1:
//            $message= '上传的文件超过了PHP配置文件中upload_max_filesize选项的值';
//            break;
//        case 2:
//            $message= '超过了表单MAX_FILE_SIZE限制的大小';
//            break;
//        case 3:
//            $message=  '文件部分被上传';
//            break;
//        case 4:
//            $message=  '没有选择上传文件';
//            break;
//        case 6:
//            $message=  '没有找到临时目录';
//            break;
//        case 7:
//        case 8:
//            $message=  '系统错误';
//            break;
//    }
//    exit($message);
//}
//
//
//
//
//
//
//
////将临时文件上传到服务器指定文件夹
////确保文件名唯一，防止重名产生覆盖
////$unique_name=md5(uniqid(microtime(true),true)).'.'.$ext;//根据微秒产生唯一的id
////move_uploaded_file($tmp_name, "uploads/".$unique_name)// 使用md5加密后，虽然可以防止重名，但是名字被加过密后，不可分请文件所有者了
////$path='uploads';
////如果文件不存在会建立文件，但是这里由于权限问题，创建是会报权限错误
//if(!file_exists($path)){
//    $oldumask=umask(0);	//将掩码清0，默认掩码一般是0022
//    mkdir($path,0777,true);
//    umask($oldumask);
//    chmod($path,0777);
//}
//$destination=$path.'/'.$file_info['name'];
//if(!@move_uploaded_file($file_info['tmp_name'], $destination)){
//    exit ('文件上传失败');
//}
//return '文件'.$file_info['name'].'上传成功';


