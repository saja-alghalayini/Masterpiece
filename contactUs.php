<?php
include_once '.\Connection\connect.php';
if(isset($_POST["submit"])) {
    $name = $_POST["userName"];
    $email = $_POST["userEmail"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];


  $sql="INSERT INTO contact (namee,email,subjectt,messagee) VALUES ('$name','$email','$subject','$message');";
  mysqli_query($conn, $sql);
}


    if(isset($_GET["id"])){
      $user_id= $_GET["id"];
    }
    if(!isset($_GET["id"])){
      $homepath= ' landingpage.php';
      $shoppath= ' ProductsPage.php';
      $categorypath= ' CategoriesPage.php?';
      $cartpath= ' login.php';
      $about = ' aboutUS.php';
      $contact = ' contactUs.php';
      $pop="";

    }else{
      $homepath= ' landingpage.php?id='.$user_id;
      $shoppath= ' ProductsPage.php?id='.$user_id;
      $categorypath= ' CategoriesPage.php?id='.$user_id.'&';
      $cartpath= ' cart.php?id='.$user_id;
      $about = ' aboutUS.php?id='.$user_id;
      $contact = ' contactUs.php?id='.$user_id;

      /* ------------------------------------------------------------------- */
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

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Contact Us page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7b836f378e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/contactUs.css">
    <link rel="shortcut icon" href=".\Images\logo.png">
</head>


<body>
    
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
              '.$pop.'<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>';

              if(!isset($_GET["id"])){
                echo '<a href=" login.php">Login</a>
                      <a href=" signup.php">Register</a>';

              }else{
                echo '<a href=" userpage.php?id='.$user_id.'">Account</a>';
                echo '<a href=" LandingPage.php">Log Out</a>';
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
                
        <div class="container my-4">
       
        <!-- Section: Contact -->
    <section class="my-5">
    
      <!-- Section heading -->
      <h2 class="h1-responsive font-weight-bold text-center my-5">Contact us</h2>


    <!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="form-title">
                    <h5>If you need anything please don't hesitate to contact us</h5>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est, assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse natus!</p> -->
                </div>
                 <div id="form_status"></div>
                <div class="contact-form">
                    <form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
                        <p>
                            <input type="text" placeholder="Name" name="name" id="name">
                            <input type="email" placeholder="Email" name="email" id="email">
                        </p>
                        <p>
                            <input type="tel" placeholder="Phone" name="phone" id="phone">
                            <input type="text" placeholder="Subject" name="subject" id="subject">
                        </p>
                        <p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
                        <input type="hidden" name="token" value="example@mail.test" />
                        <p><input type="submit" value="Submit"></p>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form-wrap">
                    
                    <div class="contact-form-box">
                        <h4><i class="far fa-clock"></i> Shop Hours </h4>
                        <p>24/7 </p>
                    </div>
                    <div class="contact-form-box">
                        <h4><i class="fas fa-address-book"></i> Contact</h4>
                        <p>Phone: +77 808 9122 <br> Email: support@Multicolor.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end contact form -->

        </div>

    
      

      <footer>
    <div id="footerdiv">
        <div class="col-3">
            <img src="./Images/logo.png">
        </div>
        <div class="col-3">
            <h1 style="text-align: center;">Stay In Touch</h1><br>
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
</html>