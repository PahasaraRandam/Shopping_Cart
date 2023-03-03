<?php 

session_start();
require_once('connection.php');

$first_name="";
$last_name="";
$email="";
$password="";

if(isset($_POST['submit'])){

    $errors = array();
    
    $first_name=$_POST['first_name'];
    $last_name= $_POST['last_name'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    
            //cheacking values have been entered
    
                    //did to by normal way cheacking values wheather been entered
                                
                        if(empty(trim($_POST['first_name']))){
                            $errors[]= "- invalid first name <br/>";
                        }
    
                        if(empty(trim($_POST['last_name']))){
                            $errors[]="- ivalid last name <br/>";
                        }
                        
                        
    
                    //cheacked values by fore each loops
                        $cheacking = array("email","password");
    
                        foreach($cheacking as $che){
    
                            if(empty(trim($_POST[$che]))){
    
                                $errors[]="- invalid {$che} <br/>";
                            }
                        }
            
        //cheacking lenths of he fields
    
        $names= array("first_name" => 50 ,"last_name"=> 100 ,"email"=> 100 ,"password"=> 40 );
    
            foreach($names as $mn => $val){
    
                if(trim(strlen($_POST[$mn])>$val)){
                    $errors[]="- Characoes of {$mn} should be less than {$val} <br/>";
                }
    
            }
    
        //cheacking email type is whether right
    
            if(!is_email($_POST['email'])){
                $errors[]="- Invalid Email Type: Enter <strong> asb@gmail.com </strong>";
    
            }
    
        // cheacking is there other email for this email
    
                $query= "SELECT * FROM cmp_user WHERE email= '{$email}' LIMIT 1";
                $result= mysqli_query($connection,$query);
                $email=mysqli_real_escape_string($connection,$_POST['email']);
    
                if($result){
                    if(mysqli_num_rows($result)==1){
                        $errors[]="- email already excists";
                    }
                }
    
    // errors empty tring to save the record
    
                if(empty($errors)){

                     //images move into folders

                        $name=$_FILES['img']['name'];
                        $tmp_name=$_FILES['img']['tmp_name'];
                        $destination_img="user/";
                        move_uploaded_file($tmp_name,$destination_img.$name);

    
                    $first_name=mysqli_real_escape_string($connection,$_POST['first_name']);
                    $last_name= mysqli_real_escape_string($connection,$_POST['last_name']);
                    $password= mysqli_real_escape_string($connection,$_POST['password']);
                    
                    $query="INSERT INTO cmp_user (first_name, last_name, email, password, img, is_deleted) VALUES('{$first_name}','{$last_name}','{$email}','{$password}','{$name}',0) LIMIT 1";
                    
                    $result=mysqli_query($connection,$query);
    
                    if($result){
                        header('Location:logte.php?user_saved=success');
                    }else{
                        echo "error of saving the user";
                    }
    
                }/* errors empty */
    
    
    
    
    }/* isset submit eka */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User Page</title>
    <link rel="stylesheet" href="../bootstrap 5/css/bootstrap.min.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<nav class="navbar navbar-expand-sm p-3 bg-dark navbar-dark">
  <div class="container-fluid">
  <a class="nav-link d-flex " href="tabbs.php">
     
        <img src="../Shopping_cart/toys.jpg" style="height:80px; width:80px;" class="navbar-brand rounded-5 ms-3">
        <div class="h4 navbar-text mt-3">Retro Toys</div>
     
    </a>

    

    <a href="logout.php" class=" btn btn-secondary me-3"><strong>LogOut</strong></a>

  </div>
</nav>


<div class="container ">
        <div class="h2 my-3 "><strong>Add User Page</strong> <a href="logte.php" class="alert-link  h4">  <small>&raquo;Back To Login Page</a></small></div>

        <br>
                    <?php
                        
                            if(!empty($errors)){

                                
                                 echo "<div class='alert alert-warning alert-dismissible  '>
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
            <div class="adduser p-5 border-2 h5">

                

                <form action="" method="post" enctype="multipart/form-data">
      
                        <div class="mb-2">
                            <label for="first_name" class="form-label labell"  >First Name</label>
                            <input type="text" class="form-control inputt"  name="first_name" value="<?php echo $first_name; ?>">
                        </div>
                        <div class="mb-2">
                            <label for="last_name" class="form-label labell"  >Last Name</label>
                            <input type="text" class="form-control inputt"  name="last_name" value="<?php echo $last_name; ?>">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label labell"  >Email</label>
                            <input type="text" class="form-control inputt"  name="email" value="<?php echo  $email;?>">
                        </div>

                        <div class="my-3">
                            <label for="img" class="form-label labell" >Incert Picture Here</label>
                            <input type="file" name="img" id="img" class="form-control inputt"  value= "<?php echo  $name;?>" >
                        </div>

                        <div class="mb-2">
                            <label for="password" class="form-label labell"  >Password</label>
                            <input type="text" class="form-control inputt"  name="password">
                        </div>

                        <div class="mb-2">
                            
                            <input type="submit" class="btn btn-primary mt-2" style="margin-left: 365px;" name="submit">
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