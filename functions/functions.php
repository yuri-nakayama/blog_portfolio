<?php
  include 'connection.php';
  // include gives content inside that included file (merging files)

  function register ($name, $email, $password) {

    $con = connection();
    // sql
    // 1. insert into login
    $sql = "INSERT INTO login (email, password) VALUES ('$email', '$password')";
    $res = $con->query($sql);// query -> execute the sql code
    
    // create an error reporting
    if ($res) {

    } else {  
      print_r($sql); 
      die ("error adding login error is: ". $con->error);
      // conneect_error -> if you're trying to connect to the database
      // error -> query error

    }

    $last_account_id = $con->insert_id;// automatically checks the last account_id inside the table
    // sql
    // 2. insert into user
    $sql = "INSERT INTO user (name, login_id) VALUES ('$name', '$last_account_id')";
    $res = $con->query($sql);// query -> execute the sql code
    
    // create an error reporting
    if ($res) {
      // header('location: login.php');// header -> redirects us to another this
      echo "<script>window.location.replace('login.php');</script>";
      
    } else {   
      print_r($sql);
      die ("error adding user error is: ". $con->error);
      // conneect_error -> if you're trying to connect to the database
      // error -> query error

    }

  }

  function login ($email, $password) {

    $con = connection();
    // sql
    $sql = "SELECT 
              login.login_id, 
              login.email,
              login.password, 
              login.status,
              user.name
            FROM login
              INNER JOIN user ON login.login_id = user.login_id
            WHERE login.email = '$email' 
              AND login.password = '$password'";
    $res = $con->query($sql);

    if ($res) {

      if($res->num_rows == 1) {

        $row = $res->fetch_assoc();
        $_SESSION['login_id'] = $row['login_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['status'] = $row['status'];

        if ($_SESSION['status'] == "A") {
          // header("location: dashboard.php");
          echo "<script>window.location.replace('dashboard.php');</script>";

        } else {
          // header("location: profile.php");
          echo "<script>window.location.replace('profile.php');</script>";

        }

      } else {
        // any other way???
        echo "<div class='alert alert-danger text-center'>
        <strong>INCORRECT USERNAME OR PASSWORD</strong>
        </div>";

      }

    } else {
      print_r($sql);
      die ("error selecting user error is: ". $con->error);

   }
  
  }

  // function getDashboard ($login_id, $status) {
    function getDashboard () {

    $con = connection();
    // sql
    $sql = "SELECT
              post.post_id,
              post.post_title,
              post.post_dated,
              category.category_name
            FROM user
            INNER JOIN post ON user.login_id = post.login_id
            INNER JOIN category ON post.category_id = category.category_id";
    // if ($status == "U") {
    //   $sql = $sql. " WHERE user.login_id = '$login_id'";
    // }
    $res = $con->query($sql);// query -> execute the sql code
  
    $data = array();
    if ($res) {

      if ($res->num_rows > 0) {// check and get all the true rows
        while ($row = $res->fetch_assoc()) {// it will convert 1 row to an associative array
          $data[] = $row;
        }
      }

    } else {
      print_r($sql);
      die ("error selecting user error is: ". $con->error);

   }

   return $data;

  }

  function addCategory ($category) {

    $con = connection();
    // sql
    $sql = "INSERT INTO category (category_name) VALUES ('$category')";
    $res = $con->query($sql);// query -> execute the sql code
    
    // create an error reporting
    if ($res) {
      echo "<script>window.location.replace('disp_category.php');</script>";

    } else {  
      print_r($sql); 
      die ("error adding login error is: ". $con->error);
      // conneect_error -> if you're trying to connect to the database
      // error -> query error

    }

    
  }

  // function getCategory ($login_id, $status) {
  function getCategory () {

    $con = connection();
    // sql
    $sql = "SELECT
              category.category_id,             
              category.category_name
            FROM category
            -- INNER JOIN post ON category.category_id = category.category_id
            -- INNER JOIN user ON user.user_id = post.user_id";
    // if ($status == "U") {
    //   $sql = $sql. "AND user.login_id = '$login_id'";
    // }
    $res = $con->query($sql);// query -> execute the sql code
  
    $data = array();
    if ($res) {

      if ($res->num_rows > 0) {// check and get all the true rows
        
        while ($row = $res->fetch_assoc()) {// it will convert 1 row to an associative array
          $data[] = $row;
        }
      }

    } else {
      print_r($sql);
      die ("error selecting user error is: ". $con->error);

   }

   return $data;

  }

  function getUser ($user_id, $login_id) {

    $con = connection();
    // sql
    $sql = "SELECT 
              login.login_id, 
              login.email,
              login.password,
              login.status,
              user.user_id,
              user.name,
              user.bio,
              user.picture
            FROM login
              INNER JOIN user ON login.login_id = user.login_id";
    if ($user_id != "-1") {
      $sql = $sql. " WHERE user.user_id = '$user_id'";
    }
    if ($login_id != "-1") {
      $sql = $sql. " WHERE login.login_id = '$login_id'";
    }
    $res = $con->query($sql);

    $data = array();
    if ($res) {

      if ($res->num_rows > 0) {// check and get all the true rows
        while ($row = $res->fetch_assoc()) {// it will convert 1 row to an associative array
          $data[] = $row;
        }
      }

    } else {
      echo($sql);
      echo "<br>";
      die ("error selecting user error is: ". $con->error);

   }
  
   return $data;

  }

  function updUser1 ($user_id, $name, $bio, $password) {

    $con = connection();
    $_bio = $con->real_escape_string($bio);// mysql method

    $sql = "UPDATE user 
            SET name = '$name',
                bio = '$_bio'
            WHERE user_id = '$user_id'";
    $res = $con->query($sql);

    if ($res) {

    } else {
      echo $sql. "<br>"; 
      die ("error updating user error is: ". $con->error);

    }

    $sql = "UPDATE login 
            INNER JOIN user ON login.login_id = user.login_id
            SET login.password = '$password'
            WHERE user.user_id = '$user_id'";
    $res = $con->query($sql);

    if ($res) {

    } else {
      echo $sql. "<br>"; 
      die ("error updating login error is: ". $con->error);

    }

    // close
    $con->close();
    echo "<script>window.location.replace('disp_user.php');</script>";
    
  }

  function updUser2 ($user_id, $bio, $email, $password) {

    $con = connection();
    $_bio = $con->real_escape_string($bio);// mysql method

    $sql = "UPDATE user 
            SET bio = '$_bio'
            WHERE user_id = '$user_id'";
    $res = $con->query($sql);

    if ($res) {

    } else {
      echo $sql. "<br>"; 
      die ("error updating user error is: ". $con->error);

    }

    $sql = "UPDATE login 
            INNER JOIN user ON login.login_id = user.login_id
            SET login.email = '$email',
                login.password = '$password'
            WHERE user.user_id = '$user_id'";
    $res = $con->query($sql);

    if ($res) {

    } else {
      echo $sql. "<br>"; 
      die ("error updating login error is: ". $con->error);

    }

    // close
    $con->close();
    echo "<script>window.location.replace('profile.php');</script>";
    
  }

  function updUser3 ($login_id, $password) {

    $con = connection();
    $sql = "UPDATE login 
            SET login.password = '$password'
            WHERE login.login_id = '$login_id'";
    $res = $con->query($sql);

    if ($res) {

    } else {
      echo $sql. "<br>"; 
      die ("error updating login error is: ". $con->error);

    }

    // close
    $con->close();
    echo "<script>window.location.replace('profile.php');</script>";
    
  }

  function delUser ($login_id) {

    $con = connection();
    $sql = "DELETE login, user FROM login 
            INNER JOIN user ON login.login_id = user.login_id
            WHERE login.login_id = '$login_id'";
    $res = $con->query($sql);

    if ($res) {

    } else {
      echo $sql. "<br>"; 
      die ("error deleting login, user error is: ". $con->error);

    }

    // close
    $con->close();
    echo "<script>window.location.replace('logout.php');</script>";

  }

  function getPost ($post_id) {

    $con = connection();
    // sql
    $sql = "SELECT * FROM post
            INNER JOIN category ON post.category_id = category.category_id
            INNER JOIN user ON post.login_id = user.login_id
            WHERE post_id = '$post_id'";
    $res = $con->query($sql);

    $data = array();
    if ($res) {

      if ($res->num_rows > 0) {// check and get all the true rows
        while ($row = $res->fetch_assoc()) {// it will convert 1 row to an associative array
          $data[] = $row;
        }
      }

    } else {
      print_r($sql);
      die ("error selecting user error is: ". $con->error);

   }
  
   return $data;

  }

  function addPost($post_title, $post_message, $post_dated, $login_id, $category_id) {


    $con = connection();
    $_post_message = $con->real_escape_string($post_message);// mysql method
    // sql
    $sql = "INSERT INTO post (post_title, post_message, post_dated, login_id, category_id) VALUES (
                  '$post_title',
                  '$_post_message', 
                  '$post_dated', 
                  '$login_id', 
                  '$category_id')";
    $res = $con->query($sql);// query -> execute the sql code
    
    // create an error reporting
    if ($res) {
      echo "<script>window.location.replace('disp_post.php');</script>";

    } else {  
      echo $sql. "<br>"; 
      die ("error inserting login error is: ". $con->error);
      // conneect_error -> if you're trying to connect to the database
      // error -> query error

    }
    
  }

  function updPost ($post_id, $post_title, $post_message, $post_dated, $login_id, $category_id) {

    $con = connection();
    $_post_message = $con->real_escape_string($post_message);// mysql method, escaping OOP
    $sql = "UPDATE post 
            SET post_title = '$post_title',
                post_message = '$_post_message',
                post_dated = '$post_dated',
                login_id = '$login_id',
                category_id = '$category_id'
            WHERE post_id = '$post_id'";
    $res = $con->query($sql);

    if ($res) {
      echo "<script>window.location.replace('disp_post.php');</script>";

    } else {
      echo $sql. "<br>"; 
      die ("error updating login error is: ". $con->error);

    }

    // close
    $con->close();
    echo "<script>window.location.replace('disp_post.php');</script>";

  }

  function updPicture ($user_id, $img) {

    $target_dir = 'uploads/';// directory
    $target_file = $target_dir.basename($img);// basename() - retrurns string, gives you the filename if you specify the file path

    $con = connection();
    $sql = "UPDATE user 
            SET picture = '$img'
            WHERE user_id = '$user_id'";
    $res = $con->query($sql);

    if ($res) {
      move_uploaded_file($_FILES['img']['tmp_name'], $target_file);

    } else {
      echo $sql. "<br>"; 
      die ("error updating login error is: ". $con->error);

    }

    // close
    $con->close();
    echo "<script>window.location.replace('profile.php');</script>";

  }
?>