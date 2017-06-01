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
      <?php
        $sql = "SELECT  eqm_name, eqm_detail, eqm_total, eqm_amount
                FROM    equiment";
        $result = mysql_query($sql);

        //$row = mysql_num_rows($result);
        //echo "$row";
      ?>
      <table border="1">
        <tr>
          <td>ลำดับ</td>
          <td>ชื่ออุปกรณ์</td>
          <td>รายละเอียด</td>
          <td>จำนวนอุปกรณ์ทั้งหมด</td>
          <td>อุปกรณ์ที่เหลือให้ยืม</td>
        </tr>
        <?php
        $r = 1;
          while ($data = mysql_fetch_array($result)) {
            echo "<tr>";

            echo "<td> {$r} </td>
                  <td> {$data['eqm_name']} </td>
                  <td> {$data['eqm_detail']} </td>
                  <td> {$data['eqm_total']} </td>
                  <td> {$data['eqm_amount']} </td>
            ";
            echo "</tr>";
            $r = $r+1;
          }
        ?>

      </table>

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
