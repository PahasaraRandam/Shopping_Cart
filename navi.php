

<nav class="navbar navbar-expand-sm  bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="user/<?php echo $_SESSION['img'];  ?>" alt="Logo" style="width:80px;" class="rounded-pill float-start">
      <div class="h5 float-start navbar-text ms-3">Retro Member: <br> <?php echo ucfirst($_SESSION['first_name']); ?></div>
    </a>

    <ul class="navbar-nav h4 size ">
          
        <li class="nav-item">
            <a class="nav-link  me-5 " href="user.php">Add Post Here</a>
        </li>

         <li class="nav-item">
            <a class="nav-link me-5" href="post.php">Your Post</a>
         </li>

         <li class="nav-item">
            <a class="nav-link me-5" href="edit.php">Edit Account</a>
         </li>
     
    </ul>

    <a href="logout.php" class="btn btn-secondary me-1 "><strong>LogOut</strong></a>

  </div>
</nav>


