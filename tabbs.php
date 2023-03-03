
<?php

session_start();
require_once('connection.php');

$nic="";
$card_num="";
$destina="";
$conta_num="";
$country="";

$table ="";
$text="";
/* $query = "SELECT * FROM shopping_user ORDER BY item_name"; */

if(isset($_GET['search'])){

$text = mysqli_real_escape_string($connection,$_GET['text']);

$query = "SELECT * FROM shopping_user WHERE (item_name LIKE '%{$text}%' OR category LIKE '%{$text}%')  ORDER BY item_name ";

$results = mysqli_query($connection,$query);

if($results){

  if(mysqli_num_rows($results) < 1){

      header('Location:tabbs.php?no=results');


  }
}

}else{
  $query = "SELECT * FROM shopping_user ORDER BY item_name";
}

  
  /* $query = "SELECT * FROM shopping_user ORDER BY item_name"; */


$results = mysqli_query($connection,$query);

if($results){

        while($user=mysqli_fetch_assoc($results)){


            $table.="<tr>";

                    $table.="<td><img src=\"user/{$user['img']}\" class='toys rounded-2' ></td>";

                    $table.="<td class='tabw'> <h5>{$user['item_name']}</h5>
                                <br>
                                <p>{$user['description']}</p><br/>

                                <div class='ms-1'> 
                                    =/{$user['price']}.00 Rs only
                                    <button class='btn btn-primary me-2 float-end'  data-bs-toggle=\"modal\" data-bs-target=\"#myModal\">Buy Now</button>
                                </div>
                               
                            </td>";

                    
                    $table.="<td>{$user['category']}</td>";

                    
                   
                    
            

            $table.="</tr>";



        }}

/* submit button payment */
/* if(isset($_POST['submit_m'])){

$nic=$_POST['nic'];
$card_num=$_POST['card_no'];
$destina=$_POST['desti_de'];
$conta_num=$_POST['contact_number'];
//$country=$_POST['country'];

$nic=mysqli_real_escape_string($connection,$_POST['nic']);
$card_num=mysqli_real_escape_string($connection,$_POST['card_no']);
$destina=mysqli_real_escape_string($connection,$_POST['desti_de']);
$conta_num=mysqli_real_escape_string($connection,$_POST['contact_number']);
$country=mysqli_real_escape_string($connection,$_POST['country']);


$query="INSERT INTO buy (nic,card,desti,number,country) VALUES ('{$nic}','{$card_num}','{$destina}','{$conta_num}','{$country}') LIMIT 1";
$result=mysqli_query($connection,$query);

if($result){
header('Location:tabbs.php?buying=sucess');

}



} */



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="../bootstrap 5/css/bootstrap.min.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>



<nav class="navbar navbar-expand-sm  bg-dark navbar-dark ">
  <div class="container-fluid">
    <a class="nav-link d-flex " href="tabbs.php">
     
        <img src="../Shopping_cart/toys.jpg" style="height:80px; width:80px; " class="navbar-brand rounded-5 ">
        <div class=" navbar-text align-middle h3 mt-3 me-5 ">Retro Toys</div>
        
     
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <ul class="navbar-nav size links">

              <li class="nav-item pe-4" id="tab-1" onclick="tabnum(1)">

                    <a class="nav-link active " href="tabbs.php" >Home</a>

              </li>

              <li class="nav-item pe-4" id="tab-2" onclick="tabnum(2)">

                    <a class="nav-link" href="contact.php" >Contact</a>

              </li>

              <li class="nav-item pe-4" id="tab-3" onclick="tabnum(3)">

                    <a class="nav-link" href="aboutus.php" >About Us</a>
                
              </li>
        
        </ul>
        
        
        <form action="" method="get" class=" d-flex ms-auto me-2 ">
          <input type="text" name="text" class="form-control" id="">
          <button class="btn btn-primary" name="search">Go</button>
        </form>
        
        
        <a href="logte.php" class=" btn btn-secondary me-2"><strong>Login</strong></a>
        
    </div>

  </div>
</nav>

    <?php
    
      if(isset($_GET['no'])){
        echo"
        <div class=\"alert alert-success alert-dismissible  aler \">
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
            <strong>Invalid Search Results!</strong> There is No Advertisements Under That Keyword
        </div>
      ";
      }
    
    ?>




        <table class="table table-striped rounded-4 table-hover tb p-5 mt-5 " style="width: 1200px; ">

            <thead class="text-bg-dark h3 p-5">
                <th>Image</th>
                <th>item Name</th>
                
               
                <th>Category</th>
          
                
            </thead>

            <tbody class="" >
                <?php
                    echo $table;
                ?>
            </tbody>

        </table>


   <div class="modal fade " id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header text-bg-secondary strong">
            <h4 class="modal-title mx-auto">Transaction Details</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->

              <div class="container p-5">

                    <form action="tabbs.php" method="post" >

                          <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="nic" placeholder="Enter NIC" name="nic">
                                <label for="nic">Nice Number:</label>
                          </div>

                          <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="card_no" placeholder="Enter Cad Number" name="card_no">
                            <label for="card_no">Card Number</label>
                          </div>

                          <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="desti_de" placeholder="Enter Destination" name="desti_de">
                            <label for="desti_de">Destination Detals</label>
                          </div>

                          <div class="form-floating mt-3 mb-3">
                            <input type="number" class="form-control" id="contact number" placeholder="Contact Number" name="contact_number">
                            <label for="contact number">Contact Number</label>
                          </div>

                          <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="country" placeholder="Enter country" name="country">
                            <label for="country">Country</label>
                          </div>
                         
                          <buton type="submit" name="submit_m" class="btn btn-primary ms-auto" data-bs-dismiss="modal">Submit</buton>
                    </form>

              </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            
            <div>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                
            </div>

          </div>

        </div>
      </div>
    </div>




<!-- footer -->
        <?php

            require_once('footer.php');
        ?>
<script src="../Shopping_cart/xx.js"></script>
<script src="../bootstrap 5/js/bootstrap.bundle.min.js"></script>   
</body>
</html>


