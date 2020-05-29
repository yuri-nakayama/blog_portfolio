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
        <form action="" method="post">
          <div class="form-group row">
            <div class="col-lg-6 mx-auto">
              <input type="text" name="name" id="" class="form-control" placeholder="Name">
              <input type="text" name="email" id="" class="form-control" placeholder="Email">
              <input type="password" name="password" id="" class="form-control" placeholder="Password">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6 mx-auto">
              <input type="submit" value="Add User" name="saveBtn" class="btn btn-warning text-white btn-block form-control">
            </div>
          </div>
        </form>
        <?php 

          if (isset($_POST['saveBtn'])) {
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            // $password = md5($_POST['password']);

            register($name, $email, $password);

          }

        ?>
      </div>

      <table class="table table-striped table-bordered table-hover w-75 mx-auto">
        <thead class="thead thead-dark">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php
          $user_id = "-1";
          $login_id = "-1";
          $data = getUser($user_id, $login_id);
          // ???
          if (count($data) > 0) {
            // when the data is greater than 0
            foreach ($data as $row) { 
        ?>
          <tr>
            <td><?php echo $row['user_id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['password']?></td>
            <td>
              <a href="upd_user.php?user_id=<?php echo $row['user_id']?>" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-angle-double-right"></i>
                Detail
              </a>
            </td>
          </tr>
        <?php
            }
          } else {
            // when the data is empty
            echo "<div class='alert alert-danger text-center'>
                  <strong>NO DATA</strong>
                  </div>";

          }
        ?>
        </tbody>
      </table>
    </div>
    
    <?php include 'footer.php'?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>