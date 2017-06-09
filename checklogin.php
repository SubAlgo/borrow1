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

  if ($count==1) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header( "location: http://localhost/borrow1/index.php" );
    exit(0);
  }

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
