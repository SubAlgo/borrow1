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
    <table align="center" border="1" width="30%">
      <form class="" action="login1.php" method="post" onsubmit="javascript:return fncSubmit();">
        <tr align='center'>
          <td colspan="2"><p>Login</p></td>
        </tr>
        <tr>
          <td width='30%'>Username :</td>
          <td><input type="text" name="username" id='username' value=""></td>
        </tr>
        <tr>
          <td witdth='30%'>Password :</td>
          <td><input type="password" name="password" id='password' value=""></td>
        </tr>
        <tr align='center'>
          <td colspan="2"><input type="submit" value="submit"></td>
        </tr>
      </form>
    </table>


    <?php
      $_SESSION['username'] = '';
      $userId = '';
      $pass = '';
      $row = '';




      if(isset($_POST['username']))
      {
        $userId = $_POST['username'];
        echo "_POST['username'] = ". $_POST['username'] . '<br>';
      }

      if(isset($_POST['password']))
      {
        $pass = $_POST['password'];
        echo "_POST['password'] = ". $_POST['password'] . '<br>';
      }

      if(!empty($userId) && !empty($pass))
      {
        $str = "SELECT admin_name, admin_surname
                FROM admin
                WHERE admin_id = '". $userId . "' and admin_password = '" . $pass. "'";
        $result = mysql_query($str);
        $row = mysql_num_rows($result);
        echo "$str <br>";
        //echo "SQL_ROW = " . $row . " <br>";
      }

      if($row != 0)
      {
        echo "SQL_ROW (in if) = " . $row . " <br>";
        //สร้าง session มาเก็บค่าไว้สำหรับ auth
      }
      else {
        echo "<script> alert ('รหัสไม่ถูกต้อง'); </script>";
      }



      $_POST['username'] = '';
      $_POST['password']= '';
      echo "Reset Value <br>";
      echo "_POST['username'] = ". $_POST['username'] . '<br>';
      echo "_POST['password'] = ". $_POST['password'] . '<br>';

    ?>

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
