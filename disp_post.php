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
    <title>post</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/eb83b1af77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php include 'header_admin.php'?>

    <div class="jumbotron jumbotron-fluid bg-primary display-4 text-white p-5">
      <i class="fas fa-pencil-alt"></i>
      Posts
    </div>

    <div class="container mb-5">
      <div class="jumbotron jumbotron-fluid mx-auto p-1 m-0">
        Latest Posts
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th class="border-right-0">DataPosted</th>
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
            // echo "<div class='alert alert-danger text-center'>
            // <strong>NO DATA</strong>
            // </div>";

          }
        ?>
        </tbody>
      </table>
      <div class="row mx-auto w-50">
        <a href="add_post.php" class="btn btn-outline-primary btn-block">
          Add Post
        </a>
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