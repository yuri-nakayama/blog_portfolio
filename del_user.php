<?php
  include 'functions/functions.php';
  // session_start();
  
  // $login_id = $_SESSION['login_id'];
  $login_id = $_GET['login_id'];

  delUser($login_id);  
?>