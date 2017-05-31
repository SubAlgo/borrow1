<?php

  include "config.php";
  $username = $_POST['username'];
  $password = $_POST['password'];

  // To protect MySQL injection (more detail about MySQL injection)
  $username = stripslashes($username);
  $password = stripslashes($password);
  $username = mysql_real_escape_string($username);
  $password = mysql_real_escape_string($password);


  $sql_checkUser = "SELECT member_id
                    FROM member
                    WHERE member_id = '$username' and member_password = '$password'";

  $result = mysql_query($sql_checkUser);

  $count=mysql_num_rows($result);

  if ($count==1) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
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
