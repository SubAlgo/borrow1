<?php
include "config.php";
   //+++++ สร้างตัวแปรมาเก็บค่าจาก session ที่ถูกส่งมาจากหน้า index.php +++++
   $start_date = $_POST['start_date'];
   $return_date = $_POST['return_date'];
   //----- สร้างตัวแปรมาเก็บค่าจาก session ที่ถูกส่งมาจากหน้า index.php -----

  /*
  $stmt  =  "SELECT equiment.eqm_name,
                      borrow.member_name,
                      borrow.borrow_date,
                      borrow.return_date,
                      borrow.borrow_status
                FROM borrow
                LEFT JOIN equiment
                ON borrow.eqm_id = equiment.eqm_id
                where borrow.borrow_date BETWEEN \"2017-06-01\" AND \"2017-06-01\"";
  */
   //+++++ SQL Statement สำหรับ select ผลลัพธ์ รายการการยืม(borrow) โดยมีเงื่อนไขตามช่วงเวลาที่เลือก +++++
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

                      echo $stmt1;
   $result = mysql_query($stmt1);
   $row = mysql_num_rows($result);
   echo "Row result = ". $row;
   //----- SQL Statement สำหรับ select ผลลัพธ์ รายการการยืม(borrow) โดยมีเงื่อนไขตามช่วงเวลาที่เลือก -----

   //+++++ เก็บผลลัพธ์ของการ query โดยแปลงเป็น Array แล้วเก็บลง Session เพื่อนำไปใช้แสดงผลที่หน้า index.php +++++

   //$_SESSION['resultBorrowStatement'] = mysql_fetch_array($result);
   //$_SESSION['resultBorrowStatement'] = $result;
   //----- เก็บผลลัพธ์ของการ query เป็น Array ลง Session เพื่อนำไปใช้แสดงผลที่หน้า index.php -----

    //print_r($_SESSION['resultBorrowStatement']);


   //+++++Redirect to index.php+++++

   $host  = $_SERVER['HTTP_HOST'];
   $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
   $indexPage = 'index.php';
   //header("location: http://$host$uri/$indexPage");

   //exit(0);
   //-----Redirect to index.php-----

  //$row = mysql_num_rows($result);
?>
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

        if ($data['borrow_status'] == 0) {
          echo "<td align='center'> ยืม </td>";
        } else {
          echo "<td align='center'> คืนแล้ว </td>";
        }
        echo "</tr>";
        $r = $r+1;
      }
      ?>

    </tbody>
  </table>
