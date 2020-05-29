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
    <title>profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/eb83b1af77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      img {
        width: 200px;
        height: 200px;
        object-fit: cover; /* この一行を追加するだけ！ */
      };
    </style>

  </head>
  <body>
    <?php include 'header_user.php'?>

    <div class="jumbotron jumbotron-fluid bg-info display-4 text-white p-5 m-0">
      <i class="fas fa-user"></i>
        Profile
    </div>

    <div class="jumbotron jumbotron-fluid">
      <div class="row mx-auto">
        <div class="col-lg-4">
          <a href="dashboard.php" class="btn btn-light btn-block">
            <i class="fas fa-arrow-left"></i>
              Back To Dashboard
          </a>
        </div>
        <div class="col-lg-4">
          <a href="upd_password.php" class="btn btn-success btn-block">
            <i class="fas fa-lock"></i>
            Change Password
          </a>  
        </div>
        <div class="col-lg-4">
          <a href="del_user.php?login_id=<?php echo $_SESSION['login_id']?>" class="btn btn-danger btn-block">
            <i class="fas fa-trash-alt"></i>
            Delete Account
          </a>  
        </div>
      </div>
    </div>

    <div class="container mb-5">
      <div class="jumbotron jumbotron-fluid p-1">
        Edit Profile
      </div>
      <div class="row mx-auto">
        <?php
          $user_id = "-1";
          $login_id = $_SESSION['login_id'];
          $data = getUser($user_id, $login_id);
        ?>
        <div class="col-lg-8">
          <form action="" method="post">
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" name="email" id="" class="form-control" value="<?php echo $data[0]['email']?>">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="password" id="" class="form-control" value="<?php echo $data[0]['password']?>">
            </div>
            <div class="form-group">
              <label for="">Bio</label>
              <textarea class="form-control" name="bio" id="" rows="6"><?php echo $data[0]['bio']?></textarea>
            </div>
            <button type="submit" name="updateBtn" class="btn btn-primary btn-block">Upadte</button>
          </form> 
          <?php 
            if (isset($_POST['updateBtn'])) {
              
              $user_id = $data[0]['user_id'];
              $email = $_POST['email'];
              $bio = $_POST['bio'];
              $password = $_POST['password'];
              // $password = md5($_POST['password']);

              updUser2($user_id, $bio, $email, $password);

            }
          ?>
        </div>
        <div class="col-lg-4">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card">
              <div class="card-header bg-white text-center">
                <h4 class="card-title text-left"><?php echo $data[0]['name']?></h4>
                <?php 
                  $img = $data[0]['picture'];
                ?>
                  <img class="card-img-top mx-auto img" src="uploads/<?php echo $img?>" alt="">
              </div>
              <div class="card-body">
                <div class="custom-file">
                  <input type="file" name="img" id="img" value="<?php echo $img?>"class="custom-file-input">
                  <label class="custom-file-label" for=""></label>
                </div>
                <button type="submit" name="editImg" class="btn btn-outline-primary btn-block">
                  <i class="fas fa-pencil-alt"></i>
                  Edit Image
                </button>
              </div>
            </div>
          </form>
          <?php
            if (isset($_POST['editImg'])) {

              $user_id = $data[0]['user_id'];
              $img = $_FILES['img']['name'];              
              updPicture($user_id, $img);

            }
          ?>
        </div>
      </div>
    </div>

    <?php include 'footer.php'?>

    <!-- Optional JavaScript -->
     <!-- bsCustomFileInput.init() を呼んで初期化することで、フォームの reset と、input の change イベントにリスナが追加され、ファイル選択で選択したファイルが表示されるようになります。 -->
     <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script>
      bsCustomFileInput.init();
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>