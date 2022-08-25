<?php
include_once 'connect.php';

if(isset($_GET["id"])){
  $user_id= $_GET["id"];
}

if(!isset($_GET["id"])){
  $shoppath= 'ProductsPage.php';
  $categorypath= 'CategoriesPage.php?';
  $cartpath= 'login.php';
  $about= 'aboutUS.php';
  $contact= 'contactUS.php';

  $pop='';
}
  else{
      $shoppath= 'ProductsPage.php?id='.$user_id;
      $categorypath= 'CategoriesPage.php?id='.$user_id.'&';
      $cartpath= 'other/cart.php?id='.$user_id;
      $about= 'aboutUS.php?id='.$user_id;
      $contact= 'contactUS.php?id='.$user_id;

  /* ---------------------------------------------------------------------- */
  $querypop="SELECT * FROM cart INNER JOIN products WHERE cart.product_id=products.id  AND user_id=$user_id;";
  $resultpop= mysqli_query($conn, $querypop);
  $resultcheckpop = mysqli_num_rows($resultpop);

  $quan_sum=0;
  if($resultcheckpop > 0){
    
      while($rowpop = mysqli_fetch_assoc($resultpop)){
          $quan_sum+= $rowpop['quantity'];
      }
  }

  $_SESSION["quan_sum"]= $quan_sum;
   
   
   if($_SESSION["quan_sum"]){
   $numeric=$_SESSION["quan_sum"];
   $pop='<div class="sub">'.$numeric.'</div>';
   
   }else{
   $pop='';
   }

/* ---------------------------------------------------------------------- */

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/LandingPage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ccfa87eec6.js" crossorigin="anonymous"></script>
    <title>Home</title>
    <link rel="shortcut icon" href=".\Images\logo.png">
</head>
<body>

    <!-- ------------------------------------- Header -------------------------------- -->
    <header>
    <nav style="display: flex;">
      
      <div>
          <img width="110px" src=".\Images\logo.png" style="margin-left: 80%;">
      </div>

      <div>
          <a href="<?php echo $homepath; ?>">Home</a>
          <a href="<?php echo $shoppath; ?>">Shop</a>
          
          <a href="<?php echo $about; ?>">About Us</a>
          <a href="<?php echo $contact; ?>">Contact Us</a>
      </div>
      
      <div>
      <?php
        echo '<a class="num" href="' . $cartpath . '">
        '.$pop.'<img src="./Images/cart.png" alt="cart" style="height:50px ;"></a>';

        if(!isset($_GET["id"])){
          echo '<a href="login.php">Login</a>
                <a href="signup.php">Register</a>';

        }else{
          echo '<a href="userpage.php?id='.$user_id.'">Account</a>';
          echo '<a href="LandingPage.php">Log Out</a>';
        }

        if(isset($_GET["id"])){
          $id= $_GET["id"];
          $loginpath= "&id=".$id;

        }else{
          $loginpath= "";
        }


          ?>

      </div>
  </nav>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
          <div id = "img1" style="height:500px;">
           
                </div>
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color: white; margin-bottom: 20%; " > Get your beloved one the best gift ever </h3>
              <p></p>
            </div>
          </div>

          <div class="carousel-item">
          <div id = "img2" style="height:500px;">
            
            </div>
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color: black; margin-bottom: 20%; "> Decorate your house with our unique collection </h3>
              <p></p>
            </div>
          </div>

        <div class="carousel-item">
          <div id = "img3" style="height:500px;">

                </div>
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color: white; margin-bottom: 20%; "> Make your world more colorful with our new paintings </h3>
              <p></p>
            </div>
          </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>



    <!-- Body -->
<!-- Features -->

<div class="py-5 service-24">
    <div>
      <h2 style= "text-align: center; margin-bottom: 50px;"> Our Features </h2>
      
        <!-- Row -->
        <div class="row wrap-service-24" style="width: 90%; margin: auto; ">
            
            <!-- Column -->
            <div class="col-lg-2 col-md-6">
                <div class="card card-shadow border-0 mb-4">
                    <a  class="card-hover py-4 text-center d-block rounded"> 
												<span class="bg-success-grediant"><i class="fa-solid fa-truck-fast"></i></span>
                        <h6 class="ser-title"> Free Shipping </h6>
                    </a>
                </div>
            </div>
            <!-- Column -->

            <!-- Column -->
            <div class="col-lg-2 col-md-6">
                <div class="card card-shadow border-0 mb-4">
                    <a class="card-hover py-4 text-center d-block rounded"> 
												<span class="bg-success-grediant"><i class="fa-solid fa-money-bill"></i></span>
                        <h6 class="ser-title"> Money Back Guarantee </h6>
                    </a>
                </div>
            </div>
            <!-- Column -->

            <!-- Column -->
            <div class="col-lg-2 col-md-6">
                <div class="card card-shadow border-0 mb-4">
                    <a  class="card-hover py-4 text-center d-block rounded"> 
												<span class="bg-success-grediant"><i class="fa-solid fa-percent"></i></span>
                        <h6 class="ser-title"> Season Sall </h6>
                    </a>
                </div>
            </div>
            <!-- Column -->
         
           
            
            
						
        </div>
    </div>
</div>


<!-- End Feature Section -->




  
    <h1 id="categories-h1"> Our Categories </h1>
    <div id="categories">
        <a class="button" id ="cat1"  style="width: 20%;" href="<?php echo $categorypath.'cat_id=1' ?>">Impressionism Art</a>
        <a class="button" id ="cat2" style="width: 20%;" href="<?php echo $categorypath.'cat_id=2' ?>">Pop-Up Art</a>
        <a class="button" id ="cat3"  style="width: 20%;" href="<?php echo $categorypath.'cat_id=3' ?>">Abstract Art</a>
        <a class="button" id ="cat4"  style="width: 20%;" href="<?php echo $categorypath.'cat_id=4' ?>">Lorem</a>
    </div>
     

    <h1 id="discount-h1"> Our Discount Section </h1>
    <div id="discount" class="container">

        <?php 
      $sql= 'SELECT * from products where     sale_status=1 LIMIT 4;';
      $result= mysqli_query($conn, $sql);
            $resultcheck = mysqli_num_rows($result);
                    if($resultcheck > 0)
                    {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      $pbs= floor(($row['price'])/((100-$row['sale_pre'])/100)); //// price before sale 

                      echo ' <div class="col-3">
                      <img height="250px" src="'.$row['image'].'">
                      <h4>'.$row['name'].'</h4>
                      <p id = "price_befor">'.$pbs.' JD</p>
                      <p id = "price_after">'.$row['price'].' JD</p>
                      <a href="Product.php?pro_id='.$row["id"].$loginpath.'"><button type="submit" name="sub" id="dis" class="button"> View Product </button></a>
                  </div>';
                    }
                  }

      ?>
      
    </div>
    <div id="seemore"><a href="<?php echo $shoppath; ?>"> Our Full Products <a></div>

 


    


      
    <!-- //////////////////Footer//////////////////// -->

    
    <footer>
    <div id="footerdiv">
        <div class="col-3">
            <img src="./Images/logo.png">
        </div>


        <div class="col-3" style="width:100px">
            <h1 style="text-align: center;"> Stay In Touch </h1><br>
            <h2 style="text-align: center;"></h2>
            <p style="text-align: center;" >
            <a href="https://web.facebook.com/Saja.AlGhalayini/" target="_blank"><i class="fa-brands fa-facebook" style="display: inline;"></a></i>
                    <a href="https://www.instagram.com/_saja_alghalayini/" target="_blank"><i class="fa-brands fa-instagram" style="display: inline;"></a></i>
                    <a href="https://www.linkedin.com/in/saja-al-ghalayini/" target="_blank"><i class="fa-brands fa-linkedin" style="display: inline;"></a></i>
                    <br>
            <p style="text-align: center;">copyright <i class="fa-solid fa-copyright"></i> 2022 Multicolor</p>
        </div>
        <div class="col-3">
        <h1> What Artiest Said </h1>
       
<p> If I could say it in words there would be no reason to paint.<br>
— Edward Hopper. <b>
</p>

    </div>
            </div>
    </footer>

  </body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>