<!---->
<!--this is a login module-->
<!---->
<?php
	//include 'database.php';
    session_start(); //启用session

	$con = mysqli_connect('localhost','root','','user_info');

	if (mysqli_connect_errno($con))
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
//    mysqli_select_db($con,'user_info');
//    if($result=mysqli_query($con,"select * from users")){
//        $row=mysqli_fetch_array($result);
//        echo $row[1];
//    }else{
//        echo 'error';
//    }

	echo $_POST['username']."<br/>";
    echo $_POST['password'];

	$userExists = mysqli_query($con, "SELECT password FROM login_info WHERE username = '". $_POST['username'] ."'");
	$rows = mysqli_fetch_array($userExists); //以数组的形式从记录集返回第一行数据



	if(sizeof($rows) !==0)
	{
		if($_POST['password'] === $rows[0])
		{

			$userIDQ = mysqli_query($con, "SELECT userid, accesstype FROM login_info WHERE username = '". $_POST['username'] ."'") or die( 'MySQLi Error: ' .mysqli_error($con) );

			$user = mysqli_fetch_array($userIDQ);


			$_SESSION['userID'] = $user[0]; // code to get userID by username
			$_SESSION['admin'] = $user[1]; // code to determine access level

			mysqli_close($con);
		//	header('Location: alumnimain.php'); //跳转到一个新的地址
			exit;
		}
	}
			mysqli_close($con);
	//		include 'invalid.php';
            echo "<script>alert('Username or Password Invalid')</script>";
            echo "<script>history.back()</script>";

			session_destroy();

		
	/*if(true) //code to checkusername
	{
		if(true) //code to verify username & pass
		{
			$_SESSION['userID'] = 1; // code to get userID by username
			$_SESSION['admin'] = true; // code to determine access level
			
			header('Location: alumnimain.php');
			exit;
		}
		else 
		{
			include 'invalid.php';
			session_destroy();
		}
		
	}
	else 
	{
		include 'invalid.php';
		session_destroy();
	}*/
?>