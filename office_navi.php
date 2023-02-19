<nav class="navbar navbar-expand-sm  bg-dark navbar-dark p-3" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="user/<?php echo $_SESSION['of_img'];  ?>" alt="Logo" style="width:100px;" class="rounded-pill float-start">
      <div class="h4 float-start navbar-text ms-3">Retro Office Monitoring: <br> Welcome <?php echo ucfirst($_SESSION['of_first_name']); ?></div>
    </a>


    <a href="logout.php" class=" btn btn-secondary me-1"><strong>LogOut</strong></a>

  </div>
</nav>