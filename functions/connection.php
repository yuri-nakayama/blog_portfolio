<?php
  // the file that would coonect PHP to database
  // aproach: MYSQLI OOP

  function connection() {

    // defined our database
    $servername = 'localhost';
    $username = 'root';// default
    $password = 'root';// for mamp password ($ : root ... for windows : no password)
    $db_name = 'blog';

    $conn = new mysqli($servername, $username, $password, $db_name);// the connection object (variable)
      // mysqli -> a pre-defined class(methods(functions))

    // create our own error repoting
    // connnect_error (reporter of error) -> his job is to show eroor (is there are only ) in connecting to the database
    if ($conn->connect_error) {
      die('error in connecting to the database: '.$conn->connect_error);// this is the error message
      // die() - abort/exit/stop connections

    } else {
      return $conn;
    }
    
    // echo "<pre>";
    // print_r(db_connect());
    // echo "</pre>";

  }

?>