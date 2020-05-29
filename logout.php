<?php
  session_start();
  session_unset();// to remove all the session valiables
  session_destroy();// to close the session to destroy the session
  // header("location: login.php");
  echo "<script>window.location.replace('login.php');</script>";

?>