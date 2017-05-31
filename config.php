<?php
  session_start();
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "borrow";

  $connection = mysql_connect($hostname, $username, $password) or die ("ติดต่อฐานข้อมูลไม่ได้!!!");

  mysql_select_db($database) or die("ไม่สามารถเลือกฐานข้อมูลทีต้องการได้!!!" . mysql_error());

  mysql_query("SET NAMES UTF8");
  mysql_query("SET character_set_results=utf8");
  mysql_query("SET character_set_client=utf8");
  mysql_query("SET character_set_connection=utf8");

?>
