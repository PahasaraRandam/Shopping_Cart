<?php

session_start();
require_once('connection.php');
if(!isset($_SESSION['email'])){
    header('Location:logte.php');
}

   
    $table ="";
    $query ="SELECT * FROM shopping_user WHERE email = '{$_SESSION['email']}' ORDER BY item_name ";
    $results = mysqli_query($connection,$query);
   

    if($results){

            while($user=mysqli_fetch_assoc($results)){


                $table.="<tr>";

                        $table.="<td><img src=\"user/{$user['img']}\" class='toys' ></td>";

                        $table.="<td class='tabw'> <h5>{$user['item_name']}</h5>
                                    <br>
                                    <p>{$user['description']}</p>
                                        <br/>=/ {$user['price']}.00 Rs
                                
                                </td>";

                        
                        $table.="<td>{$user['category']}</td>";

                        $table.="<td> <a href='modify.php?id={$user['id']}' class='alert-link'>Edit  </a> </td>";
                        $table.="<td> <a href='delete.php?id={$user['id']}' class='alert-link'>Delete  </a> </td>";
                    
                        
                

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
    <title>Insert Items</title>
    <link rel="stylesheet" href="../bootstrap 5/css/bootstrap.min.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   


  <!-- //navbar -->
      <?php

          require_once('navi.php');

      ?>


<div class="container">
      <h2 class="p-5 ">Your Posted Advertisements</h2>

    <table class="table table-striped table-bordered table-hover tb p-5 mt-5" style="width: 1200px; ">

            <thead class="text-bg-dark h3 p-5">
                <th>Image</th>
                <th>item Name</th>
                
               
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
                
            </thead>

            <tbody class="" >
                <?php
                    echo $table;
                ?>
            </tbody>

        </table>


       <form action="" method="post">

            <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">

       </form>

 
    




</div><!-- mmain container -->

<!-- footer -->
<?php

require_once('footer.php');
?>
<script src="../bootstrap 5/js/bootstrap.bundle.min.js"></script>   
</body>
</html>


