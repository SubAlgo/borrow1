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


    <script type="text/javascript">
      function setdates() {
        var s_day = document.getElementById('start_date').value;
        var e_day = document.getElementById('return_date').value;
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
                <!--<form class="" action="selectborrow.php" method="post" onsubmit="javascript:return setdates();"> -->
                <!-- <form class="" action="selectborrow1.php" method="post"> -->
                <form class="" action="index1.php" method="post" >
                  ค้นหาราย ระหว่างวันที่
                  <input type="date" name="start_date" id="start_date" value="">
                  ถึงวันที่
                  <input type="date" name="return_date" id="return_date" value="">
                  <!-- <button type="submit" name="button">ยืนยัน</button> -->
                  <input type="submit" value="ยืนยัน">
                </form>
                <?php
                  $row = 0;
                  echo "จำนวนทั้งหมด ". $row . " รายการ<br>" ;
                ?>


                  <!--ประจำวันที่ <div id="start_day"></div> ถึงวันที่ <div id="end_day"></div> -->
                  <?php
                  $start_date = null;
                  $return_date = null;

                  if(!isset($_POST['start_date']))
                  {
                    $_POST['start_date'] = null;
                  }
                  if(!isset($_POST['return_date']))
                  {
                    $_POST['return_date'] = null;
                  }


                  echo 'reset START_DATE'.$start_date . '<br>';
                  echo 'reset START_DATE'.$return_date. '<br>';
                  echo 'reset _POST[START_DATE]'.$_POST['start_date'] . '<br>';
                  echo 'reset _POST[RETURN_DATE]'.$_POST['return_date'] . '<br>';

                  if(!isset($_POST['start_date']))
                  {
                    return;
                  }
                  else
                  {
                    $start_date = $_POST['start_date'];
                    $return_date = $_POST['return_date'];
                  }
                  echo $start_date . '<br>';
                  echo $return_date;



                  if(!isset($start_date))
                  {
                    echo "ตัวแปลยังไม่กำหนดค่า";
                  }
                  else
                  {
                    $stmt1 =   "SELECT  equiment.eqm_name,
                                         borrow.member_name,
                                         borrow.borrow_date,
                                         borrow.return_date,
                                         borrow.borrow_status
                                FROM borrow
                                LEFT JOIN equiment
                                ON borrow.eqm_id = equiment.eqm_id
                                WHERE borrow.borrow_date BETWEEN  \"".$start_date."\" AND \"". $return_date."\"
                                || borrow.borrow_date BETWEEN  \"". $return_date."\"  AND \"".$start_date."\"
                                ";

                    $result = mysql_query($stmt1);
                    $row = mysql_num_rows($result);
                  }

                   ?>
                  <div id="show_day"></div>
                  <br>
                  จำนวนทั้งหมด <?php echo $row; ?> รายการ
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

                      <?php

                      $r = 1;
                      while ($data = mysql_fetch_array($result)) {
                        echo "<tr>";

                        echo "<td align='center'> {$r} </td>
                              <td align='center'> {$data['eqm_name']} </td>
                              <td align='center'> {$data['member_name']} </td>
                              <td align='center'> {$data['borrow_date']} </td>
                              <td align='center'> {$data['return_date']} </td>
                        ";
                        $status = $data['borrow_status'];
                        if ($data['borrow_status'] == 0) {
                          echo "<td align='center'> ยืม </td>";
                        } else {
                          echo "<td align='center'> คืนแล้ว </td>";
                        }
                        echo "</tr>";
                        $r = $r+1;
                      }

                      $_POST['start_date'] = null;
                      $_POST['return_date'] = null;
                      ?>

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
