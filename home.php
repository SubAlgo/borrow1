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
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
      function setdates() {
        var s_day = document.getElementById('start_date').value;
        var e_day = document.getElementById('end_date').value;
        //document.getElementById("start_day").innerHTML = document.getElementById('start_date').value;
        //document.getElementById("end_day").innerHTML = document.getElementById('end_date').value;
        document.getElementById("show_day").innerHTML = "รายการยืมอุปกรณ์ </br> ประจำวันที่ "+ s_day + " ถึงวันที่ " + e_day;
        return false;
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


      <table align="center" border="0" width="1024">
        <!-- container -->
        <div align="center">
          <tr>
            <td>
              <div align="center">
                <form class="" action="" method="post" onsubmit="javascript:return setdates();">
                  ค้นหาราย ระหว่างวันที่
                  <input type="date" name="start_date" id="start_date" value="">
                  ถึงวันที่
                  <input type="date" name="end_date" id="end_date" value="">
                  <button type="submit" name="button">ยืนยัน</button>
                </form>


                  <!--ประจำวันที่ <div id="start_day"></div> ถึงวันที่ <div id="end_day"></div> -->
                  <div id="show_day"></div>
                  <br>
                  จำนวนทั้งหมด 0 รายการ
                  <table class="" align="center" cellspacing="1"cellpadding="1" border="0" widtg="90%">
                    <tbody>
                      <tr>
                        <td bgcolor="#FDE365" width="37">
                          <div align="center">ลำดับ</div>
                        </td>
                        <td bgcolor="#FDE365" width="420">
                          <div align="center">ชื่ออุปกรณ์</div>
                        </td>
                        <td bgcolor="#FDE365" width="334">
                          <div align="center">ผู้ยืม</div>
                        </td>
                        <td bgcolor="#FDE365" width="122">
                          <div align="center">วันที่ยืม</div>
                        </td>
                        <td bgcolor="#FDE365" width="126">
                          <div align="center">วันที่กำหนดคืน</div>
                        </td>
                        <td bgcolor="#FDE365" width="11%">
                          <div align="center">status</div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </td>
          </tr>
        </div>
        <!-- container -->
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
