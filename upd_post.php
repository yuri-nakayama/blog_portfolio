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
    <title>upd post</title>
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

    <div class="container">
      <div class="jumbotron jumbotron-fluid mx-auto p-1 m-0">
        Edit Post
      </div>
      <?php
        $post_id = $_GET['post_id'];
        $data = getPost($post_id);
      ?>
      <form action="" method="post">
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" id="" class="form-control" value="<?php echo $data[0]['post_title']?>">
        </div>
        <div class="form-group">
          <label for="">Date Posted</label>
          <input type="date" name="date" id="" class="form-control" value="<?php echo $data[0]['post_dated']?>">
        </div>
        <div class="form-group">
          <label for="">Category</label>
          <select class="form-control" name="category" id="">
            <option value="<?php echo $data[0]['category_id']?>" selected>
              <?php echo $data[0]['category_name']?>
            </option>
            <?php
              // $login_id = $_SESSION['login_id'];
              // $status = $_SESSION['status'];
              // $category_data = getCategory($login_id, $status);
              $category_data = getCategory();
              // ???
              if (count($category_data) > 0) {
                // when the data is greater than 0
                foreach ($category_data as $row):
            ?>
            <option value="<?php echo $row['category_id']?>">
              <?php echo $row['category_name']?>
            </option>
            <?php
                endforeach;
              } else {
                // // when the data is empty
                // echo "<div class='alert alert-danger text-center'>
                // <strong>NO DATA</strong>
                // </div>";
              }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">Post</label>
          <textarea class="form-control" name="message" id="" rows="6"><?php echo $data[0]['post_message']?></textarea>
        </div>
        <div class="form-group">
          <label for="">Author</label>
          <select class="form-control" name="author" id="">
            <option value="<?php echo $data[0]['user_id']?>" selected>
              <?php echo $data[0]['name']?>
            </option>
            <?php
              $user_id = "-1";
              $login_id = "-1";
              $data = getUser($user_id, $login_id);
              // ???
              if (count($user_data) > 0) {
                // when the data is greater than 0
                foreach ($user_data as $row):
            ?>
            <option value="<?php echo $row['user_id']?>">
              <?php echo $row['name']?>
            </option>
            <?php
                endforeach;
              } else {
                // // when the data is empty
                // echo "<div class='alert alert-danger text-center'>
                // <strong>NO DATA</strong>
                // </div>";
              }
            ?>
        </select>
        </div>
        <div class="form-group row w-50 mx-auto">
          <input type="submit" name="updateBtn" value="Update" class="btn btn-primary form-control">
        </div>
      </form>
      <?php 

        if (isset($_POST['updateBtn'])) {
          
          $post_id = $_GET['post_id'];
          $post_title = $_POST['title'];
          $post_message = $_POST['message'];
          $post_dated = $_POST['date'];
          $login_id = $_POST['author'];
          $category_id = $_POST['category'];
          // print_r($_POST);

          updPost($post_id, $post_title, $post_message, $post_dated, $login_id, $category_id);

        }

      ?>
    </div>
 
    <?php include 'footer.php'?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>