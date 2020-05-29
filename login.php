<?php
  include 'functions/functions.php';
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/eb83b1af77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php //include 'header.php';?>

    <div class="jumbotron jumbotron-fluid bg-dark display-4 text-white p-5">
      <i class="fas fa-user"></i>
      Log-in
    </div>

    <div class="container">
      <div class="jumbotron jumbotron-fluid p-1">
        Account Login
      </div>
      <form action="" method="post">
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" name="email" id="" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" id="" class="form-control" placeholder="Password" required>
        </div>
        <input type="submit" name="loginBtn" value="Login" class="btn btn-dark btn-block">
      </form>        
      <?php
        if (isset($_POST['loginBtn'])) {

          $email = $_POST['email'];
          $password = $_POST['password'];
          // $password = md5($_POST['password']);
          
          login($email, $password);

        }
      ?>
    </div>
    <br>
    <div class="container mb-5 text-right">
      <a href="upd_password.php">Forget your password?</a>
      <br>
      <a href="register.php">Don't have an accout?</a>
    </div>

    <?php include 'footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>