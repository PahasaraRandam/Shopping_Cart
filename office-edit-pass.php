<?php

session_start();
require_once('connection.php');
if(!isset($_SESSION['of_id'])){
    header('Location:logte.php');
}

$user_id = mysqli_real_escape_string($connection,$_GET['user_id']);
$query = "SELECT * FROM cmp_user WHERE id = {$user_id} LIMIT 1";


$result_set= mysqli_query($connection,$query);

if($result_set){
    if(mysqli_num_rows($result_set)){
        $update=mysqli_fetch_assoc($result_set);
        $first_name = $update['first_name']; 
        $last_name = $update['last_name']; 
        $email = $update['email']; 

    }else{
        header('Location:office.php?userupdate=no');
    }
}else{
    header('Location:office.php?update_quer=faild');
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
                        header('Location:office.php?password_update_saved=success');
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
</head>
<body>


            <!-- office navigation bar -->

                    <?php
                        
                            require_once('office_navi.php');
                        
                    ?>


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

    <script src="../bootstrap 5/js/bootstrap.bundle.min.js"></script>    
</body>
</html>