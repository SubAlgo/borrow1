<!-- แสดงรายการอุปกรณ์ที่มีทั้งหมด (SELECT Table "equiment" )  -->
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

        if(document.getElementById('username').value == "korn" && document.getElementById('password').value == "123456")
        {
          alert('Login Successed');
          return false;
        } else {
          alert('Login Failed!!!');
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

        $row = mysql_num_rows($result);

      ?>

      <table border="1" aling='center'>
        <tr>
          <td>รายการอุปกรณ์ที่มี</td>
        </tr>
        <tr>
          <td>จำนวนทั้งหมด <?php echo "$row" ?> รายการ</td>
        </tr>
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