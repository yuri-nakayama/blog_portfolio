<?php
  include 'functions/functions.php';

  session_start();
  // if(!isset($_SESSION['login_id'])) {
  //   // header("location: login.php");
  //   echo "<script>window.location.replace('login.php');</script>";
  //   die;// exit, no continue???
  // } 
?>

<!doctype html>
<html lang="en">
  <head>
    <title>upd password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/eb83b1af77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
      <div class="card">
        <div class="card-header text-center">
          <h3 class="card-title">Change Password</h3>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group row">
              <div class="col-lg-6 mx-auto">
                <input type="password" name="old" id="" class="form-control" value="<?php echo $_SESSION['password']?>" placeholder="old password" required>
                <input type="password" name="new" id="" class="form-control" placeholder="new password" required>
                <input type="password" name="password" id="" class="form-control" placeholder="confirm password" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-6 mx-auto">
                <input type="submit" value="Update" name="updateBtn" class="btn btn-info text-white btn-block form-control">
              </div>
            </div>
          </form>
        </div>
        <?php 
          if (isset($_POST['updateBtn'])) {

            if ($_POST['old'] == $_POST['new']) {
              echo "<div class='alert alert-warning text-center'>
                    <strong>PLEASE CHANGE THE PASSWORD</strong>
                    </div>";
              return;

            }
            
            if ($_POST['new'] == $_POST['password']) {

              $login_id = $_SESSION['login_id'];
              $password = $_POST['password'];
              // $password = md5($_POST['password']);

              updUser3($login_id, $password);

            } else {
              echo "<div class='alert alert-warning text-center'>
                    <strong>THE NEW PASSWORD AND CONFIRM PASSWORD ARE NOT THE SAME </strong>
                    </div>";

            }

          }
        ?>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>