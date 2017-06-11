<?php
include "config.php";
  $start_date = $_POST['start_date'];
  $return_date = $_POST['return_date'];

  //echo $start_date;
/*  $stmt = "SELECT  equiment.eqm_name,
                              borrow.member_name,
                              borrow.borrow_date,
                              borrow.return_date,
                              borrow.borrow_status
                      FROM    borrow
                      LEFT JOIN equiment
                      ON borrow.eqm_id = equiment.eqm_id
                      where borrow.borrow_date BETWEEN 	&#39;". $start_date ."&#39; AND 	&#39;".$return_date ."&#39;

                      ";
                      */
    $stmt  =  "SELECT equiment.eqm_name,
                      borrow.member_name,
                      borrow.borrow_date,
                      borrow.return_date,
                      borrow.borrow_status
                FROM borrow
                LEFT JOIN equiment
                ON borrow.eqm_id = equiment.eqm_id
                where borrow.borrow_date BETWEEN \"2017-06-01\" AND \"2017-06-01\"";

    $stmt1 =     "SELECT equiment.eqm_name, borrow.member_name, borrow.borrow_date, borrow.return_date, borrow.borrow_status
                FROM borrow
                LEFT JOIN equiment
                ON borrow.eqm_id = equiment.eqm_id
                where borrow.borrow_date BETWEEN  \"".$start_date."\" AND \"". $return_date."\"";


                      echo $stmt1;
   $result = mysql_query($stmt1);

  // $_SESSION['selectborrow'] = $result;



  $row = mysql_num_rows($result);
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
