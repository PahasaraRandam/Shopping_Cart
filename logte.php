<?php 

session_start();
require_once('connection.php');

if(isset($_POST['submit'])){

    $errors = array();
    //cheaking errors
            $cheacking= array('email','password');
            
            foreach($cheacking as $che){

                if(!isset($_POST[$che]) || strlen(trim($_POST[$che]))<1){
                    $errors[]="- invalid  ".$che . "<br>";
                    }
                }
            
                if(!isset($_POST['manual'])){
                $errors[]="- invali gender <br> ";
                }

    //if errors empty pages dekata wena wenama  geniyannh

            if(empty($errors)){
                /* office */
                $email = mysqli_real_escape_string($connection,$_POST['email']);
                $password = mysqli_real_escape_string($connection,$_POST['password']);
                
                print_r($_POST);
                if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['manual']) && $_POST['manual'] == "admin" ){
                    
                       

                        $query ="SELECT * FROM admin WHERE email= '{$email}' AND password = '{$password}' LIMIT 1";

                        $result =mysqli_query($connection,$query);

                        if($result){

                            if(mysqli_num_rows($result)==1){
                                
                                header('Location:office.php');

                                $office=mysqli_fetch_assoc($result);
                                    
                                $_SESSION['of_first_name'] =$office['first_name'];
                                $_SESSION['of_email'] =$office['email'];
                                $_SESSION['of_id'] =$office['id'];
                                $_SESSION['of_img'] =$office['img'];

                            }else{
                                $errors[] = "invalid email or password";
                            }

                        }else{
                            echo "query faild";
                        }
                    
                }elseif(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['manual']) && $_POST['manual'] == "user" ){
                    /* user */
                    $query ="SELECT * FROM cmp_user WHERE email= '{$email}' AND password = '{$password}' LIMIT 1";
                        
                   
                        $result =mysqli_query($connection,$query);

                        if($result){

                            if(mysqli_num_rows($result)==1){
                                
                                header('Location:user.php');
                                //Sessions Implementing
                                $user=mysqli_fetch_assoc($result);
                                    
                                $_SESSION['first_name'] =$user['first_name'];
                                $_SESSION['email'] =$user['email'];
                                $_SESSION['id'] =$user['id'];
                                $_SESSION['img'] =$user['img'];
                                
                                //user Last Loggin
                                    $query ="UPDATE cmp_user SET last_login = NOW() WHERE id = {$_SESSION['id']} LIMIT 1  ";
                                    $result_set = mysqli_query($connection,$query);

                                        if(!$result_set){
                                            die("time query faild");
                                        }



                                
                            }else{
                                $errors[] = "invalid email or password";
                            }

                        }else{
                            echo "query faild";
                        }
                    
                }
            }/* errors empty nm */
    
}/* isset submit button */

    ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart loggin</title>
    <link rel="stylesheet" href="../bootstrap 5/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="shop.css">
    
</head>
<body>
  
<div class="container bg-dark text-white p-4 rounded-3 login ">

    

            <form action="" method="post" class="">
                
                <div class="h1  p-3 text-center"> Login Form</div>

                     <a href="tabbs.php" class="nav-link h5">&raquo; Back to Webpage</a>

                        <?php
                                                
                                if(!empty($errors)){
                                    echo    "<p class='alert alert-danger'> "; 
                                    echo "You have Errors on Your Form<br/>";

                                    foreach($errors as $er){
                                        print_r(ucwords($er)) ." ". "  <br>";
                                    }
                                    echo "</p>";  
                                }



                                if(isset($_GET['logout'])){

                                    echo "<div class='alert alert-success alert-dismissible'>

                                    <button type='button' class ='btn-close' data-bs-dismiss = 'alert' ></button>        

                                    <strong>Logout Success</strong> Thank You For Login

                                        </div>";
                                }

                        ?>

                <div class="mt-5"> 
                    <div class="form-label">Email</div>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="my-3 ">
                    <label for="password" class="form-label" >password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>


        <!-- check boxx hete -->
                
                <h4 class="my-3">User Type:</h4>

                <div class="form-check form-check-inline">
                <input class="form-check-input " type="radio" name="manual" value="admin" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Admin
                </label>
                </div><!-- form-check -->

                <div class="form-check form-check-inline">
                <input class="form-check-input " type="radio" name="manual" value="user" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    User
                </label>
                </div><!-- form-check -->
        <!-- ------------------------------------------------ -->        

                <div class="my-4 ">
                    <label for=""></label>
                    <input type="submit" value="Submit" name="submit" class="submit btn btn-secondary" >
                </div>

                <div class="muted text-white">
                    <a href="regiser.php" class=" alert-link"> &raquo; Register From Here</a>
                </div>
                
            </form>
            
            
            
            
            
        </div><!-- container -->

        <script src="../bootstrap 5/js/bootstrap.bundle.min.js"></script> 

        <!-- footer -->
        <?php

            require_once('footer.php');
        ?>
</body>
</html>