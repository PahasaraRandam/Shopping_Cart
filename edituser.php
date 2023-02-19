<?php

session_start();
require_once('connection.php');
/* if(!isset($_SESSION['of_id'])){
    header('Location:logte.php');
} */


$first_name="";
$last_name="";
$email="";




// searcching  process



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

/* user_id from $_get */


if(isset($_POST['submit'])){

$errors = array();
$user_id =$_POST['user_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];



        //cheacking values have been entered

                //did to by normal way cheacking values wheather been entered
                            
                    if(empty(trim($_POST['user_id']))){
                        $errors[]="- ivalid last name <br/>";
                    }

                    if(empty(trim($_POST['first_name']))){
                        $errors[]= "- invalid first name <br/>";
                    }

                    if(empty(trim($_POST['last_name']))){
                        $errors[]= "- invalid last name <br/>";
                    }


        
    //cheacking lenths of he fields

    $names= array("first_name" => 50 ,"last_name"=> 100 , );

        foreach($names as $mn => $val){

            if(trim(strlen($_POST[$mn])>$val)){
                $errors[]="- Characoes of {$mn} should be less than {$val} <br/>";
            }

        }

   

    

// errors empty tring to update the record

            if(empty($errors)){

                $first_name= mysqli_real_escape_string($connection,$_POST['first_name']);
                $last_name= mysqli_real_escape_string($connection,$_POST['last_name']);
                $password= mysqli_real_escape_string($connection,$_POST['password']);
                $query="UPDATE cmp_user SET first_name = '{$first_name}', last_name = '{$last_name}' WHERE id='{$user_id}' LIMIT 1 ";
                    
                $result=mysqli_query($connection,$query);

                if($result){
                    header('Location:office.php?update_saved=success');
                }else{
                    $errors[]= "error of update the user";
                }

            }/* errors empty update */




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
    <title>Office/ Modify User Page</title>
</head>
<body>
        <!-- navigation bar office -->
                <?php
                
                    require_once('office_navi.php');
                
                ?>




    <div class="container ">

            <div class="h3 mt-5 "><strong> Retro Toys Monitoring System</strong><small class="lead h8"> User Control Unit</small> </div>

        
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
            <div class="adduser p-5 border-2 mt-3 h5">

                

                <form action="" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
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
                            <input type="text" class="form-control inputt"  name="email" value="<?php echo  $email;?>" disabled >
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label labell"  >Password</label>
                            <span class="my-3">****  </span><a href="office-edit-pass.php?user_id=<?php echo $user_id;?>" class="alert-link">Change Password Form Here</a>
                        </div>

                        <div class="mb-2">
                            
                            <input type="submit" class="btn btn-primary mt-4" style="margin-left:368px ;"  name="submit">
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