<?php

  include "config.php";
  $username = $_POST['username'];
  $password = $_POST['password'];

  // To protect MySQL injection (more detail about MySQL injection)
  $username = stripslashes($username);
  $password = stripslashes($password);
  $username = mysql_real_escape_string($username);
  $password = mysql_real_escape_string($password);


  $sql_checkUser = "SELECT admin_id
                    FROM admin
                    WHERE admin_id = '$username' and admin_password = '$password'";

  $result = mysql_query($sql_checkUser);

  $count=mysql_num_rows($result);


//---------จัดการส่วนการ redirect การ Login---------
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $indexPage = 'index.php';
  $loginPage = 'login.php';

  if ($count==1) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("Location: http://$host$uri/$indexPage");
    //header( "location: http://localhost/borrow1/index.php" ); //Redirect to index.php
    exit(0);
  } else {
    echo 'ID หรือ Password ไม่ถูกต้อง <br>';
    echo "กลับสู่หน้า Login";

    //header("refresh:2; Location: http://$host$uri/$loginPage", true, 303);
    header("refresh:2; url=http://$host$uri/$loginPage", true, 303);

    //header( "location: http://localhost/borrow1/login.php" ); //Redirect to index.php <script> alert('ID หรือ Password ไม่ถูกต้อง') </script>
    exit(0);
  }
//---------จัดการส่วนการ redirect การ Login---------
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include "nev.php"; ?>
  </body>
</html>
