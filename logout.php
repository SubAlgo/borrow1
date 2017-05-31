<?php
  include "config.php";

  session_destroy();
  include "nev.php";
  mysql_close($connection);
?>
