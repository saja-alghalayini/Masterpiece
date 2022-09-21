<?php
session_start();
include_once('.\Connection\connect.php');

if (isset($_POST['submit'])){
    $Email =$_POST['email'];
    $Password= $_POST['Password'];

    $Password=md5($Password);

    $sql1="SELECT * FROM user;";
    $result= mysqli_query($conn , $sql1);
    $result_check= mysqli_num_rows($result);

    if ($result_check > 0) {
         while ($row=mysqli_fetch_assoc($result)) {
          if($Email== ($row['email'])&& $Password== $row['pass'] && $row['is_admin']==0){
          

            header('location:LandingPage.php?id='.$row["user_id"].'');

          }else {
           
                  $wrong1= '<style type="text/css">
                  #inv11, #inv1{
                      display: inline;
                  }
                  </style>';

                  $wrong2= '<style type="text/css">
                  #inv2, #inv22{
                      display: inline;
                  }
                  </style>';
            
              } 
  }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <script src="https://kit.fontawesome.com/7b836f378e.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./CSS/login.css">
  <title> Sign In </title>
  <link rel="shortcut icon" href=".\Images\logo.png">


  
</head>
<body>
<nav>
      <div>
        <img width="100px" src=".\Images\logo.png" style="margin-left: 80%;">
      </div>


        <div class="tab1">
            <a href=" landingpage.php">HOME</a>
            <a href=" ProductsPage.php">PRODUCTS</a>
            <a href=" contactUS.php">CONTACT US</a>
            <a href=" aboutUS.php">ABOUT US</a>
        </div>


        <div class="tab2">
            <a href="signup.php">REGISTER</a>
        </div>
    </nav>




  <section id="intro">
    <!-- <div class="container">
      <div class="left-col"></div> -->
      
      
      <div class="right-col">
        
        <div class="form-container">
          <form  method="post">
            <h1 class= "h1">LOGIN</h1>
            <div class="field-group">
          
            <div class="field-group">
              <label for="Email">Email Address</label><br>
              <input name='email' id="Email" value="" type="email"  required="true">
              <br>
              <img src="./img/icon-error (1).svg" class="error-icon" alt="" id='inv11'>
              <p class="error-text" id='inv1'>Invalid Email</p>
              <?php if(isset($wrong1)){echo $wrong1;}?>               
            </div>


            <div class="field-group">
              <label for="password">Password </label><br>
              <input name='Password' id="password" value="" type="password"  required="true">
              <br>
              <img src="./img/icon-error (1).svg" class="error-icon" alt="" id='inv2'>
              <p class="error-text" id='inv22'>Wrong Password</p> 
              
              <?php if(isset($wrong2)){echo $wrong2;}?>              
            </div>
          
            <input type="submit" value='LOGIN' name='submit' id='login'> 
          </form>
        </div>
        
      </div>
    </div>
  </section>



  <footer>
    <div id="footerdiv">
        <div class="col-3">
            <img src="./Images/logo.png">
        </div>
        <div class="col-3">
            <h1 style="text-align: center; margin-top:0; color:#653B88;">Stay In Touch</h1><br>
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