<?php
include_once '.\Connection\connect.php';

if (isset($_GET["id"])) {
  $user_id = $_GET["id"];
}
if (!isset($_GET["id"])) {
  $homepath = 'landingpage.php';
  $shoppath = 'ProductsPage.php';
  $categorypath = 'CategoriesPage.php?';
  $cartpath = 'login.php';
  $about = 'aboutUS.php';
  $contact = 'contactUs.php';

  $pop="";
} else {
  $homepath = 'landingpage.php?id=' . $user_id;
  $shoppath = 'ProductsPage.php?id=' . $user_id;
  $categorypath = 'CategoriesPage.php?id=' . $user_id . '&';
  $cartpath = 'cart.php?id=' . $user_id;
  $about = 'aboutUS.php?id=' . $user_id;
  $contact = 'contactUs.php?id=' . $user_id;

  /* -------------------------------------------------------------------- */
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
/* ----------------------------------------------------- */

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="shortcut icon" href=".\Images\logo.png">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/7b836f378e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="./CSS/aboutUs.css">
  
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
            
            <div >
            <?php
              echo '<a class="num" href="' . $cartpath . ' " >
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


        <div class="container">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 order-2 order-md-1 mt-4 pt-2 mt-sm-0 opt-sm-0">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mt-4 pt-2">
                            <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                                <img src="./Images/ourteam1.jpg" class="img-fluid" alt="Image" />
                                <div class="img-overlay bg-dark"></div>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-12">
                            <div class="mt-4 pt-2 text-right">
                                
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->

                <div class="col-lg-6 col-md-6 col-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                                <img src="./Images/ourteam3.jpg" class="img-fluid" alt="Image" />
                                <div class="img-overlay bg-dark"></div>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-lg-12 col-md-12 mt-4 pt-2">
                            <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                                <img src="./Images/ourteam2.jpg" class="img-fluid" alt="Image" />
                                <div class="img-overlay bg-dark"></div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end col-->


      <div class="col-lg-6 col-md-6 col-12 order-1 order-md-2">
        <div class="section-title ml-lg-5">
         
          <h4 class="title mb-4 display-4 "><span class="custom"> Multi</span>color</h4>
          <p class="text-muted mb-0 cus">I'm a full-stack web developer with a passion for art.
             I created this website to help those who like art as well as help artists market themselves.
             <br> Check out our fantastic Artist work at our shop, and don't forget to check our categories.
             </p>
        </div>
      </div>
      <!--end col-->
    </div>
    <!--enr row-->


    <div class=" py-5 flx">
      <div class="container py-5  ">
        <div class="row mb-4">
          <div class="col-lg-5">
            <h2 class="display-4 font-weight-light text-center" style="margin-bottom: 50px; color: #561F8F;">Multicolor Developer</h2>

          </div>
        </div>

        <div class="row text-center flx">

          <!-- Team item-->
          <div class="row text-center flx">
          
            <!-- Team item-->
            <div class="col-xl-4 col-sm-6 mb-5">
              <div class="bg-white rounded shadow-sm py-5 px-4 "><img src=".\Images\Saja.png" alt=""  width="175" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-bg">
                <h4 class="mb-0"> Saja Al Ghalayini </h4> <span class="small text-uppercase text-muted">Project Owner <br> Full Stack Web Developer</span>
                <ul class="social mb-0 list-inline mt-3">
                  <li class="list-inline-item"><a href="https://www.facebook.com/Saja.AlGhalayini" target="_blank" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                  <li class="list-inline-item"><a href="https://github.com/saja-alghalayini" target="_blank" class="social-link"><i class="fa fa-github"></i></a></li>
                  <li class="list-inline-item"><a href="https://www.instagram.com/_saja_alghalayini" target="_blank" class="social-link"><i class="fa fa-instagram"></i></a></li>
                  <li class="list-inline-item"><a href="https://www.linkedin.com/in/saja-al-ghalayini" target="_blank" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- End-->


        </div>
      </div>
    </div>
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
            <a href="https://www.facebook.com/sephora/" target="_blank" ><i class="fa-brands fa-facebook"style="display: inline;"></a></i>
            <a href="https://www.instagram.com/sephora/" target="_blank" ><i class="fa-brands fa-instagram"style="display: inline;"></a></i>
            <a href="https://www.linkedin.com/company/sephora/" target="_blank" ><i class="fa-brands fa-linkedin"style="display: inline;"></a></i>
            <br>
            <p style="text-align: center;">copyright <i class="fa-solid fa-copyright"></i> 2022 Multicolor</p>
        </div>
        <div class="col-3">
        <h1> What Artists Said </h1>
       
<p> If I could say it in words there would be no reason to paint.<br>
— Edward Hopper. <b>
</p>
    </div>
            </div>
    </footer>
</body>

</html>