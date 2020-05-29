<!-- nav-expand-{breakpoint} を指定すると、画面が狭い時はナビゲーションアイコンとして、画面が広い時はナビゲーションバー上にメニューを展開して表示します  -->
<!-- <nav class="nav bg-success navbar-expand-lg p-3"> -->
<nav class="navbar navbar-expand-sm navbar-light bg-success p-3">
  <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
      aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavId">

    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a href="add_post.php" class="text-light nav-link">Add Post</a>
      </li>
      <li class="nav-item">
        <a href="disp_post.php" class="text-light nav-link">View Posts</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
          <a href="profile.php" class="text-light nav-link">
            <i class="fas fa-user"></i>
            Welcome!
            <?php echo $_SESSION['name'];?>
          </a>
      </li>
      <li class="nav-item">
          <a href="logout.php" class="text-light nav-link">
            <i class="fas fa-user-times"></i>
            Logout
          </a>
      </li>
    </ul>
  </div>
</nav>
