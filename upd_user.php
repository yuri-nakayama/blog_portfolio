<?php
  include 'functions/functions.php';

  session_start();
  if(!isset($_SESSION['login_id'])) {
    // header("location: login.php");
    echo "<script>window.location.replace('login.php');</script>";
    die;// exit, no continue???
  } 
?>

<!doctype html>
<html lang="en">
  <head>
    <title>user</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/eb83b1af77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php include 'header_admin.php'?>

    <div class="jumbotron jumbotron-fluid bg-warning display-4 text-white p-5">
      <i class="fas fa-users"></i>
        Users
    </div>

    <div class="container">
      <div class="jumbotron jumbotron-fluid w-75 mx-auto p-3">
        <?php
          $user_id = $_GET['user_id'];
          $login_id = "-1";
          $data = getUser($user_id, $login_id);
        ?>
        <form action="" method="post">
          <div class="form-group row">
            <div class="col-lg-2">
              <label for="">Name</label>
            </div>
            <div class="col-lg-10">
            <input type="text" name="name" id="" class="form-control" value="<?php echo $data[0]['name']?>">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-2">
              <label for="">Bio</label>
            </div>
            <div class="col-lg-10">
              <textarea class="form-control" name="bio" id="" rows="6"><?php echo $data[0]['bio']?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-2">
              <label for="">Password</label>
            </div>
            <div class="col-lg-10">
              <input type="password" name="password" id="" class="form-control" value="<?php echo $data[0]['password']?>">
            </div>
          </div>
          <div class="form-group row w-50 mx-auto">
            <input type="submit" value="Update" name="updateBtn" class="btn btn-warning text-white form-control">
          </div>
        </form>
        <?php 

          if (isset($_POST['updateBtn'])) {
            
            $user_id = $_GET['user_id'];
            $name = $_POST['name'];
            $bio = $_POST['bio'];
            $password = $_POST['password'];
            // $password = md5($_POST['password']);

            updUser1($user_id, $name, $bio, $password);

          }

        ?>
      </div>
    </div>

    <?php include 'footer.php'?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>