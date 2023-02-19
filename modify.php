
<?php

session_start();
require_once('connection.php');
if(!isset($_SESSION['email'])){
    header('Location:logte.php?email-faild');
}




$item_name="";
$description="";
$price="";
$category="";
$img="";

if(isset($_GET['id'])){

$user_id= mysqli_real_escape_string($connection,$_GET['id']);

$query ="SELECT * FROM shopping_user WHERE id =  '{$user_id}' LIMIT 1  ";
$res=mysqli_query($connection,$query);

if($res){

    if(mysqli_num_rows($res)){

        $detail=mysqli_fetch_assoc($res);
            $item_name = $detail['item_name'];
            $description = $detail['description'];
            $img=$detail['img'];
            $price = $detail['price'];
            $category = $detail['category'];


    }

}

}/* get_id-serch */



if(isset($_POST['submit'])){



$email=$_POST['email'];

$user_id=$_POST['user_id'];
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
      /*    $query="INSERT INTO shopping_user (item_name,description,email,img,price,category) VALUES ('{$item_name}','{$description}','{$email}','{$name}',{$price},'{$category}') LIMIT 1 ";
         $results= mysqli_query($connection,$query);
 */
        
    //update Query

    $query="UPDATE shopping_user SET 
    item_name = '{$item_name}',description='{$description}',email='{$email}',img='{$name}',price={$price},category='{$category}' WHERE id='{$user_id}' LIMIT 1";
    $ress=mysqli_query($connection,$query);


    if($ress){

        header('Location:post.php?modified=success');
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
</head>
<body>
           

    <!-- //navbar -->


<nav class="navbar navbar-expand-sm  bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="user/<?php echo $_SESSION['img'];  ?>" alt="Logo" style="width:80px;" class="rounded-pill float-start">
      <div class="h5 float-start navbar-text ms-3">Welcome To Office: <br> <?php echo ucfirst($_SESSION['first_name']); ?></div>
    </a>

    <ul class="navbar-nav h4 size ">
          
          <li class="nav-item">
            <a class="nav-link active " href="user.php">Add Post Here</a>
          </li>

        <li class="nav-item">
            <a class="nav-link " href="post.php">Your Post</a>
          </li>
     
    </ul>

    <a href="logout.php" class="btn btn-secondary me-1 "><strong>LogOut</strong></a>

  </div>
</nav>




    <div class="container shopingcon  p-5 rounded border-4">

        <form action="modify.php" method="post" enctype="multipart/form-data" >
        
                <div class="h2 text-start">User Page </div>  
                    

                <input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>">
                <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                
               
                <div class="mt-5"> 
                    <label class="form-label labell"  for="item name">Item Name</label>
                    <input type="text" name="item_name" id="item name" class="form-control inputt" value="<?php echo $item_name; ?>">
                </div>

                <div class="my-3">
                    <label for="description" class="form-label labell " >description</label>
                    <textarea name="description"  id="description" class="form-control inputt" 
                    cols="30" rows="10"></textarea>
                </div>
                
                <div class="my-3">
                    <label for="img" class="form-label labell" >Incert Picture Here</label>
                    <input type="file" name="img" id="img" class="form-control inputt" >
                </div>

                <div class="mt-5 "> 
                    <label class="form-label labell" for="price">price</label>
                    <input type="number" name="price" id="price" class="form-control inputt" value="<?php echo $price; ?>">

                </div><div class="mt-5 "> 
                    <label class="form-label labell" for="category">category</label>
                    <input type="text" name="category" id="category" class="form-control inputt" value="<?php echo $category; ?>">
                </div>


                <div class="my-4 ">
                    <label for="" class=" labell"></label>
                    <input type="submit" value="Submit" name="submit" class="submit btn btn-primary inputt" >
                </div>

        </form>
            
            
    </div><!-- main conainer -->

    <!-- footer -->
    <?php

require_once('footer.php');
?>




</body>
</html>