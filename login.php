<?php
  include("config.php");
?>
<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> -->
<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ระบบยืม-คืนอุปกรณ์</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
      function fncSubmit()
      {
        if(document.getElementById('username').value == "")
        {
          alert('PLEASE INPUT Username');
          return false;
        }

        if(document.getElementById('password').value == "")
        {
          alert('PLEASE INPUT Password');
          return false;
        }

        /*if(document.getElementById('username').value == "korn" && document.getElementById('password').value == "123456")
        {
          alert('Login Successed');
          return false;
        } else {
          alert('Login Failed!!!');
          return false;
        }*/
      }
    </script>

  </head>

  <body>
    <!-- Logo -->
      <table>
        <tr>
          <td>Logo</td>
        </tr>
      </table>
    <!-- Logo -->

    <!-- Nevigator -->
      <?php
        include "nev.php";
      ?>
    <!-- Nevigator -->

    <!-- Body -->
    <form class="" action="checklogin.php" method="post" onsubmit="javascript:return fncSubmit();">
      <table>
        <tr>
          <td>Login</td>
        </tr>
        <tr>
          <td>Username: </td>
          <td><input type="text" name="username" id="username" value=""></td>
        </tr>
        <tr>
          <td>Password: </td>
          <td><input type="password" name="password" id="password" value=""></td>
        </tr>
        <tr>
          <td><button type="submit" name="button">Submit</button></td>
        </tr>
      </table>
    </form>

    <!-- Body -->

    <!-- Foot -->
      <table>
        <tr>
          <footer>This Footer</footer>
        </tr>
      </table>
    <!-- Foot -->
  </body>

</html>
