<?php

require_once('db_func.php');

function register($username, $email, $password) {
// register new person with db
// return true or error message

  // connect to db
  $conn = db_connect();

  // check if username is unique
  $result = $conn->query("select * from user where username='".$username."'");
  if (!$result) {
    throw new Exception('不能够执行查询');
  }

  if ($result->num_rows>0) {
    throw new Exception('用户名已存在');
  }

  // if ok, put in db
  $result = $conn->query("insert into user values
                         ('".$username."', sha1('".$password."'), '".$email."')");
  if (!$result) {
    throw new Exception('注册失败，请稍候再试！');
  }

  return true;
}

function login($username, $password) {
// check username and password with db
// if yes, return true
// else throw exception

  // connect to db
  $conn = db_connect();

  // check if username is unique
  $result = $conn->query("select * from user
                         where username='".$username."'
                         and passwd = sha1('".$password."')");
  if (!$result) {
     throw new Exception('登录失败');
  }
//echo $result->num_rows;
  if ($result->num_rows>0) {
     return true;
  } else {
     throw new Exception('登陆失败');
  }
}

function check_valid_user() {
// see if somebody is logged in and notify them if not
  if (isset($_SESSION['valid_user']))  {
//      echo "用户： ".$_SESSION['valid_user'].".<br />";
      return true;
  } else {
     // they are not logged in
//     do_html_header('问题:');
     echo '<div style="margin-top: 160px">You are not logged in.</div>';
//     do_html_url('login.php', 'Login');
//     do_html_footer();
     exit;
  }
}

function change_password($username, $old_password, $new_password) {
// change password for username/old_password to new_password
// return true or false

  // if the old password is right
  // change their password to new_password and return true
  // else throw an exception
  login($username, $old_password);
  $conn = db_connect();
  $result = $conn->query("update user
                          set passwd = sha1('".$new_password."')
                          where username = '".$username."'");
  if (!$result) {
    throw new Exception('密码修改失败');
  } else {
    return true;  // changed successfully
  }
}

function get_random_word($min_length, $max_length) {
// grab a random word from dictionary between the two lengths
// and return it

   // generate a random word
  $word = '';
  // remember to change this path to suit your system
  $dictionary = '/usr/share/dict/words';  // the ispell dictionary
  $fp = @fopen($dictionary, 'r');
  if(!$fp) {
    return false;
  }
  $size = filesize($dictionary);

  // go to a random location in dictionary
  $rand_location = rand(0, $size);
  fseek($fp, $rand_location);

  // get the next whole word of the right length in the file
  while ((strlen($word) < $min_length) || (strlen($word)>$max_length) || (strstr($word, "'"))) {
     if (feof($fp)) {
        fseek($fp, 0);        // if at end, go to start
     }
     $word = fgets($fp, 80);  // skip first word as it could be partial
     $word = fgets($fp, 80);  // the potential password
  }
  $word = trim($word); // trim the trailing \n from fgets
  return $word;
}

function reset_password($username) {
// set password for username to a random value
// return the new password or false on failure
  // get a random dictionary word b/w 6 and 13 chars in length
  $new_password = get_random_word(6, 13);

  if($new_password == false) {
    throw new Exception('重置密码失败，未能产生新密码');
  }

  // add a number  between 0 and 999 to it
  // to make it a slightly better password
  $rand_number = rand(0, 999);
  $new_password .= $rand_number;

  // set user's password to this in database or return false
  $conn = db_connect();
  $result = $conn->query("update user
                          set passwd = sha1('".$new_password."')
                          where username = '".$username."'");
  if (!$result) {
    throw new Exception('密码修改失败');  // not changed
  } else {
    return $new_password;  // changed successfully
  }
}

function notify_password($username, $password) {
// notify the user that their password has been changed

    $conn = db_connect();

    //"select email from user where username='"
    //$username
    //"'"
    //==select email from user where username='username';
    $result = $conn->query("select email from user
                            where username='".$username."'");
    if (!$result) {
      throw new Exception('未找到email地址');
    } else if ($result->num_rows == 0) {
      throw new Exception('未找到email地址.');
      // username not in db
    } else {
      $row = $result->fetch_object(); //取出一列作为对象
      $email = $row->email;
      $from = "From: support@sms.com \r\n";
      $mesg="Your password has been changed to ".$password."\r\n"
              ."Please change it next time you log in.\r\n";

      if (mail($email, 'SMS login information', $mesg,$from)) {
        return true;
      } else {
        throw new Exception('邮件发送失败.');
      }
    }
}
?>
