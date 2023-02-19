
<?php

session_start();
require_once('connection.php');
if(!isset($_SESSION['email'])){
    header('Location:logte.php?email-faild');
}



if(isset($_POST['submit'])){

$email=$_POST['email'];


$item_name=$_POST['item_name'];
$description=$_POST['description'];
$price=$_POST['price'];
$category=$_POST['category'];

   //images move into folders

        $name=$_FILES['img']['name'];
        $tmp_name=$_FILES['img']['tmp_name'];
        $destination_img="user/";
        move_uploaded_file($tmp_name,$destination_img.$name);


    //insert_query                        
         $query="INSERT INTO shopping_user (item_name,description,email,img,price,category) VALUES ('{$item_name}','{$description}','{$email}','{$name}',{$price},'{$category}') LIMIT 1 ";
         $results= mysqli_query($connection,$query);

        

                if($results){
                    header('Location:post.php');
                } 

 
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="../bootstrap 5/css/bootstrap.min.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
           

    <!-- //navbar -->
            <?php

                require_once('navi.php');

            ?>






    <div class="container shopingcon  p-5 rounded border-4">

        <form action="user.php" method="post" enctype="multipart/form-data" >
        
                <div class="h2 text-start">Add Your Post Here </div>  
                    

                <input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>">
                
               
                <div class="mt-5"> 
                    <label class="form-label labell"  for="item name">Item Name</label>
                    <input type="text" name="item_name" id="item name" class="form-control inputt">
                </div>

                <div class="my-3">
                    <label for="description" class="form-label labell " >description</label>
                    <textarea name="description" id="description" class="form-control inputt" cols="30" rows="10"></textarea>
                </div>
                
                <div class="my-3">
                    <label for="img" class="form-label labell" >Incert Picture Here</label>
                    <input type="file" name="img" id="img" class="form-control inputt">
                </div>

                <div class="mt-5 "> 
                    <label class="form-label labell" for="price">price</label>
                    <input type="number" name="price" id="price" class="form-control inputt">

                </div><div class="mt-5 "> 
                    <label class="form-label labell" for="category">category</label>
                    <input type="text" name="category" id="category" class="form-control inputt">
                </div>


                <div class="my-4 ">
                    <label for="" class=" labell"></label>
                    <input type="submit" value="Submit" name="submit" class=" btn btn-primary inputt" >
                </div>

        </form>
            
            
    </div><!-- main conainer -->

    <!-- footer -->
            <?php

            require_once('footer.php');

            ?>




</body>
</html>