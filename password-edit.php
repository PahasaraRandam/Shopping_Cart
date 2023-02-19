<?php

session_start();
require_once('connection.php');
if(!isset($_SESSION['email'])){
    header('Location:logte.php');
}

$user_id = mysqli_real_escape_string($connection,$_SESSION['id']);
$query = "SELECT * FROM cmp_user WHERE id = {$user_id} LIMIT 1";


$result_set= mysqli_query($connection,$query);

if($result_set){
    if(mysqli_num_rows($result_set)){
        $update=mysqli_fetch_assoc($result_set);
        $first_name = $update['first_name']; 
        $last_name = $update['last_name']; 
        $email = $update['email']; 

    }else{
        header('Location:user.php?userupdate=no');
    }
}else{
    header('Location:user.php?update_quer=faild');
}

if(isset($_POST['submit'])){

    $errors = array();
    $user_id =$_POST['user_id'];
    $password = $_POST['password'];
    
            //cheacking values have been entered
    
                    //did to by normal way cheacking values wheather been entered
                                
                        if(empty(trim($_POST['user_id']))){
                            $errors[]="- ivalid user_id <br/>";
                        }
    
                        if(empty(trim($_POST['password']))){
                            $errors[]= "- invalid password <br/>";
                        }
    
    
            
        //cheacking lenths of he fields
    
        $names= array("password" => 40);
    
            foreach($names as $mn => $val){
    
                if(trim(strlen($_POST[$mn])>$val)){
                    $errors[]="- Characoes of {$mn} should be less than {$val} <br/>";
                }
    
            }
    
    
    
    // errors empty tring to update the password
    
                if(empty($errors)){
    
                    $password= mysqli_real_escape_string($connection,$_POST['password']);
                    $user_id= mysqli_real_escape_string($connection,$_POST['user_id']);
                   
                    $query="UPDATE cmp_user SET password = '{$password}' WHERE id='{$user_id}' LIMIT 1 ";
    
                    $result=mysqli_query($connection,$query);
    
                    if($result){
                        header('Location:user.php?password_update_saved=success');
                    }else{
                        $errors[]= "error of update password the user";
                    }
    
                }/* errors empty update password */
    
    
    
    
    }/* isset submit eka */
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap 5/css/bootstrap.min.css">
    <link rel="stylesheet" href="shop.css">
    <title>Modify User Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<nav class="navbar navbar-expand-sm  bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="user/<?php echo $_SESSION['img'];  ?>" alt="Logo" style="width:80px;" class="rounded-pill float-start">
      <div class="h5 float-start navbar-text ms-3">Welcome To Office: <br> <?php echo ucfirst($_SESSION['first_name']); ?></div>
    </a>

    <ul class="navbar-nav h4 size">
      <li class="nav-item">
        <a class="nav-link active" href="user.php">Add Post Here</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="post.php">Your Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="edit.php">Edit Account</a>
      </li>
      
     
    </ul>

    <a href="logout.php" class=" btn btn-secondary me-1"><strong>LogOut</strong></a>

  </div>
</nav>

    <div class="container ">

        <br>
                    <?php
                        
                            if(!empty($errors)){

                                
                                 echo "<div class='alert alert-warning alert-dismissible show fade '>
                                            <button type='button' class='btn-close ' data-bs-dismiss='alert'></button>";
                                            echo"<strong class='h4 text-danger'> There are Errors in Your Form </strong> <br/>";
                                            echo "<p class='lead text-danger'>";  
                                                    foreach($errors as $err){
                                                            print_r(ucwords($err)) ."<br/>";
                                                
                                                        }
                                            echo "<p/>";
                                            
                                 echo "</div>";


                            }
                        
                    ?>
            <div class="adduser p-5 border-2 mt-2 h5">

                <div class="h2 mb-5">Change Password Here</div>

                <form action="" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <div class="mb-2">
                            <label for="first_name" class="form-label labell"  >First Name</label>
                            <input type="text" class="form-control inputt"  name="first_name" value="<?php echo $first_name; ?>" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="last_name" class="form-label labell"  >Last Name</label>
                            <input type="text" class="form-control inputt"  name="last_name" value="<?php echo $last_name; ?>" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label labell"  >Email</label>
                            <input type="text" class="form-control inputt"  name="email" value="<?php echo  $email;?>" disabled>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label labell"  >Password</label>
                            <input type="text" class="form-control inputt"  name="password" autofocus>
                        </div>

                        <div class="mb-2">
                            <input type="submit" class=" btn btn-primary my-3"  style="margin-left: 367px;" name="submit" value="Change Password">
                        </div>
              
                </form>
            
            </div><!-- login -->

    </div><!-- container -->

    <!-- footer -->
    <?php

require_once('footer.php');
?>

    <script src="../bootstrap 5/js/bootstrap.bundle.min.js"></script>    
</body>
</html>