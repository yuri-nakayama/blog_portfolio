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
    <title>category</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/eb83b1af77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php include 'header_admin.php'?>

    <div class="jumbotron jumbotron-fluid bg-danger display-4 text-white p-5">
      <i class="far fa-folder-open"></i>
        Category
    </div>
    
    <div class="container mb-5">
      <div class="jumbotron jumbotron-fluid w-75 mx-auto">
        <form action="" method="post" class="form-inline">
          <div class="form-group mx-auto">
            <label for="" class="mr-sm-2">Add Category</label>
            <input type="text" name="category" class="form-control mr-sm-2"> 
            <button type="submit" name="addBtn" class="btn btn-outline-dark">
              Add
            </button>
          </div>
        </form> 
        <?php
          if (isset($_POST['addBtn'])) {

            $category = $_POST['category'];

            addCategory($category);
  
          }
        ?> 
      </div>  
      <table class="table table-striped table-bordered table-hover text-center w-75 mx-auto m-0">
        <thead class="thead-dark">
          <th>Id</th>
          <th>Category Name</th>
        </thead>
        <tbody>
          <?php
            // $login_id = $_SESSION['login_id'];
            // $status = $_SESSION['status'];
            // $data = getCategory($login_id, $status);
            $category_data = getCategory();
            // ???
            if (count($category_data) > 0) {
              // when the data is greater than 0
              foreach ($category_data as $row):
          ?>
            <tr>
              <td><?php echo $row['category_id']?></td>
              <td><?php echo $row['category_name']?></td>
            </tr>
          <?php
              endforeach;
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