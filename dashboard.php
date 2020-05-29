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
    <title>dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/eb83b1af77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <?php include 'header_admin.php'?>

    <div class="jumbotron jumbotron-fluid bg-primary display-4 text-white p-5 m-0">
      <i class="fas fa-cog"></i>
        Dashboard
    </div>

    <div class="jumbotron jumbotron-fluid">
      <div class="row mx-auto">
        <div class="col-lg-4">
          <a href="add_post.php" class="btn btn-primary btn-block">
            <i class="fas fa-plus"></i>
            Add Post
          </a>  
        </div>
        <div class="col-lg-4">
          <a href="disp_category.php" class="btn btn-success btn-block">
            <i class="fas fa-plus"></i>
            Add Category
          </a>  
        </div>
        <div class="col-lg-4">
          <a href="disp_user.php" class="btn btn-danger btn-block">
            <i class="fas fa-plus"></i>
            Add User
          </a>  
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row mx-auto">
        <div class="col-lg-8">
          <div class="jumbotron jumbotron-fluid mx-auto p-1 m-0">
            Latest Posts
          </div>
         <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Category</th>
                <th>DataPosted</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php
              // $login_id = $_SESSION['login_id'];
              // $status = $_SESSION['status'];
              // $data = getDashboard($login_id, $status);
              $data = getDashboard();

              // ???
              if (count($data) > 0) {
                // when the data is greater than 0
                foreach ($data as $row):
            ?>
              <tr>
                <td><?php echo $row['post_id']?></td>
                <td><?php echo $row['post_title']?></td>
                <td><?php echo $row['category_name']?></td>
                <td><?php echo $row['post_dated']?></td>
                <td>
                  <a href="upd_post.php?post_id=<?php echo $row['post_id']?>" class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-angle-double-right"></i>
                    Detail
                  </a>
                </td>
              </tr>
            <?php
                endforeach;
              } else {
                // when the data is empty
                // ???
                echo "<div class='alert alert-danger text-center'>
                <strong>NO DATA</strong>
                </div>";

              }
            ?>
            </tbody>
          </table>
        </div>
        
        <div class="col-lg-4 text-center text-white">
          <div class="jumbotron bg-primary p-5 mb-3">
            <h4>Posts</h4>
            <h4>
              <i class="fas fa-pencil-alt"></i>
              <?php 
                $data = getDashboard();
                echo count($data);
              ?>
            </h4>
            <a href="disp_post.php" class="btn btn-outline-light">
              view
            </a>
          </div>
          <div class="jumbotron bg-success p-5 mb-3">
            <h4>Category</h4>
            <h4>
              <i class="far fa-folder-open"></i>
              <?php 
                $data = getCategory();
                echo count($data);
              ?>
            </h4>
            <a href="disp_category.php" class="btn btn-outline-light">
              view
            </a>
          </div>
          <div class="jumbotron bg-warning p-5">
            <h4>Users</h4>
            <h4>
              <i class="fas fa-users"></i>
              <?php 
                $user_id = "-1";
                $login_id = "-1";
                $data = getUser($user_id, $login_id);
                echo count($data);
              ?>
            </h4>
            <a href="disp_user.php" class="btn btn-outline-light">
              view
            </a>
          </div>
        </div>
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