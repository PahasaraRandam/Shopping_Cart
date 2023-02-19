<?php
session_start();
require_once('connection.php');
$text= "";

if(!isset($_SESSION['of_id'])){

        header('Location:logte.php?log=faild');

}

if(isset($_GET['search'])){

    $text = $_GET['text'];

    $query="SELECT * FROM cmp_user WHERE ( first_name LIKE '%{$text}%' OR last_name LIKE '%{$text}%' OR email LIKE '%{$text}%') AND is_deleted=0 ORDER BY first_name";   

}else{
    $query="SELECT * FROM cmp_user WHERE is_deleted = 0 ORDER BY first_name";
}

$table = "";


$result= mysqli_query($connection,$query);

if($result){
        
        while($user = mysqli_fetch_assoc($result)){
            
            $table.="<tr>";

            $table.="<td> 
            
                        {$user['first_name']}
            
                     </td>";
            $table.="<td>
            
                        {$user['last_name']}

                    </td>";
            $table.="<td>
            
                        {$user['last_login']}

                    </td>";

            $table.="<td>
            
                        {$user['email']}

                    </td>";
            
            $table.="<td>
            
                    {$user['img']}

                    </td>";

            $table.="<td> <a href='edituser.php?user_id={$user['id']}' class='alert-link'>Edit  </a> </td>";
            $table.="<td> <a href='deleteof.php?user_id={$user['id']}' class='alert-link' onclick=\"return confirm('are you sure ?');\">Delete</a> </td>";
            

            $table.="</tr>";
        }
        
        
    }
        
        
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>office</title>
    <link rel="stylesheet" href="../bootstrap 5/css/bootstrap.min.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <!-- //navigaion office (office_navi) -->

    <?php
    
        require_once('office_navi.php');
    
    ?>



    <div class="container">

        <div class="h3 mt-5 mb-3"><strong> Retro Toys Monitoring System</strong> </div>

        <br>

        <form action="" method="get">

            <div class="input-group mb-3 input-group-lg" >
                <button type="search" class="input-group-text btn btn-outline-secondary" value="Search Here"  name="search">Search</button>
                <input type="text" class="form-control" placeholder="Search here Baby" name="text" autofocus>
            </div>
            
        </form>

        <table class="table table-striped table-bordered table-hover">

            <thead class="text-bg-dark">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Last Login</th>
                <th>email</th>
                <th>image</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>

            <tbody>
                <?php
                
                     echo $table;
                 
                ?>
            </tbody>

        </table>

    </div>
    <!-- footer -->
    <?php

require_once('footer.php');
?>

    <script src="../bootstrap 5/js/bootstrap.bundle.min.js"></script>  
</body>
</html>