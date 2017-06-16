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
                <form class="" action="index.php" method="post" >
                  ค้นหาราย ระหว่างวันที่
                  <input type="date" name="start_date" id="start_date" value="">
                  ถึงวันที่
                  <input type="date" name="return_date" id="return_date" value="">
                  <!-- <button type="submit" name="button">ยืนยัน</button> -->
                  <input type="submit" value="ยืนยัน">
                </form>

                <?php
                  // +++++ กำหนดตัวแปลเพื่อให้เป็น global variable +++++
                  $start_date = null;
                  $return_date = null;
                  $gResult = "";
                  // ----- กำหนดตัวแปลเพื่อให้เป็น global variable -----

                  // +++++ ตรวจสอบ $_POST['start_date'] ถ้ามีค่าให้กำหนดค่าให้ตัวแปร $start_date +++++
                  if(!isset($_POST['start_date']))
                  {
                    echo "";
                  } else {
                    $start_date = $_POST['start_date'];
                  }
                  // ----- ตรวจสอบ $_POST['start_date'] ถ้ามีค่าให้กำหนดค่าให้ตัวแปร $start_date -----


                  // +++++ ตรวจสอบ $_POST['return_date'] ถ้ามีค่าให้กำหนดค่าให้ตัวแปร $return_date +++++
                  if(!isset($_POST['return_date']))
                  {
                    echo "";
                  } else {
                    $return_date = $_POST['return_date'];
                  }
                  // ----- ตรวจสอบ $_POST['return_date'] ถ้ามีค่าให้กำหนดค่าให้ตัวแปร $return_date -----


                  // +++++ กำหนดค่าตัวแปร สำหรับการ SELECT ข้อมูล +++++
                  if(empty($start_date) && empty($return_date))
                  {
                    echo "จำนวนทั้งหมด 0 รายการ<br>" ;
                    createHeadTable();
                  }
                  elseif(!empty($start_date) && !empty($return_date))
                  {
                    QuerySQL($start_date, $return_date);
                  }
                  elseif(!empty($start_date) && empty($return_date))
                  {
                    $return_date = $start_date;
                    QuerySQL($start_date, $return_date);
                  }
                  elseif(empty($start_date) && !empty($return_date))
                  {
                    $start_date = $return_date;
                    QuerySQL($start_date, $return_date);
                  }
                  // ----- กำหนดค่าตัวแปร สำหรับการ SELECT ข้อมูล -----


                  // +++++ Function สำหรับการ Query select ข้อมูล +++++
                  function QuerySQL($start_date1, $return_date1)
                  {
                    $stmt1 =   "SELECT  equiment.eqm_name,
                                         borrow.member_name,
                                         borrow.borrow_date,
                                         borrow.return_date,
                                         borrow.borrow_status
                                FROM borrow
                                LEFT JOIN equiment
                                ON borrow.eqm_id = equiment.eqm_id
                                WHERE borrow.borrow_date BETWEEN  \"".$start_date1."\" AND \"". $return_date1."\"
                                || borrow.borrow_date BETWEEN  \"". $return_date1."\"  AND \"".$start_date1."\"
                                ";

                    $result = mysql_query($stmt1);
                    $row = mysql_num_rows($result);
                    global $gResult;
                    $gResult = $result;

                    echo "รายการยืมอุปกรณ์<br>";
                    echo "ประจำวันที่ ". $start_date1. " ถึงวันที่ ". $return_date1 . "<br>";
                    echo "จำนวนทั้งหมด " . $row . " รายการ<br>";
                    createTable();
                  }

                  /*
                  ++++++++++++++++++++++++++++++++++++++++
                  +++++ Function สำหรับการ Query ข้อมูล +++++
                  ++++++++++++++++++++++++++++++++++++++++
                  */

                  // +++++ กลุ่ม Function สำหรับการสร้างตารางแล้วแสดงผลข้อมูล +++++

                    // +++++ FUNCTION สำหรับสร้างตารางผลลัพธ์ +++++
                    // ***** Description {สร้างตารางผลลัพธ์ โดยเรียกใช้ func [createHeadTable(ส่วนหัวตาราง), showResult(ส่วน list ผลลัพธ์) ] }*****
                    function createTable()
                    {
                     createHeadTable();
                     showResult();
                   }
                    // ----- FUNCTION สำหรับสร้างตารางผลลัพธ์ -----

                    // +++++ {สร้าง Header ของตาราง} +++++
                    function createHeadTable()
                    {
                    echo "
                          <table class='' align='center' cellspacing='1'cellpadding='1' border='0' widtg='90%''>
                            <tbody>
                              <tr>
                                  <th bgcolor='#FDE365' width='37'>
                                    <div align='center'>ลำดับ</div>
                                  </th>
                                  <th bgcolor='#FDE365' width='420'>
                                    <div align='center'>ชื่ออุปกรณ์</div>
                                  </th>
                                  <th bgcolor='#FDE365' width='334'>
                                    <div align='center'>ผู้ยืม</div>
                                  </th>
                                  <th bgcolor='#FDE365' width='122'>
                                    <div align='center'>วันที่ยืม</div>
                                  </th>
                                  <th bgcolor='#FDE365' width='126'>
                                    <div align='center'>วันที่กำหนดคืน</div>
                                  </th>
                                  <th bgcolor='#FDE365' width='11%'>
                                    <div align='center'>status</div>
                                  </th>
                              </tr>
                         ";
                   }
                   // ----- {สร้าง Header ของตาราง} -----

                   // +++++ {แสดงผลลัพธ์จาการ fetch ผลลัพธ์} +++++
                   function showResult()
                   {
                    global $gResult;
                    $r = 1;
                    while ($data = mysql_fetch_array($gResult)) {
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
                  }
                    // ----- {แสดงผลลัพธ์จาการ fetch ผลลัพธ์} -----

                  // ----- กลุ่ม Function สำหรับการสร้างตารางแล้วแสดงผลข้อมูล -----

                  /*
                  ----------------------------------------
                  ----- Function สำหรับการ Query ข้อมูล -----
                  ----------------------------------------
                  */
                ?>

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
