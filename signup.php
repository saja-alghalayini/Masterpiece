<?php

session_start();



include_once('.\Connection\connect.php');
if (isset($_POST['submit'])) {


    $fname = $_POST['fname'];

    $lname = $_POST['lname'];

    $mobile = $_POST['Mobile'];

    $date = $_POST['Date'];

    $email = $_POST['Email'];

    $pass = $_POST['password'];

    $Confirm = $_POST['Confirm'];

    



    $letters = "/^(?=.{1,50}$)[a-z]+(?:['_.\s][a-z]+)*$/i";

    if (preg_match($letters, $fname)   && preg_match($letters, $lname)) {
        $checkFN = true;

    } else {
        $checkFN = false;
        $b = '<style type="text/css">
        #i1, #one {
            display: inline;
        }
        </style>';
    }



    $number = "/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})?[-.\\s]?([0-9]{4})$/";
    if (strlen($mobile) <= 14 &&strlen($mobile) >= 10) {
        $checkMobile = true;

    } else {
        $c = '<style type="text/css">
        #i5, #five {
            display: inline;
        }

        </style>';
        $checkMobile = false;
    }



    if ((floor((time() - strtotime($date)) / 31556926)) > 16) {
        $checkdate = true;
        
    } else {
        $d = '<style type="text/css">
        #i6, #six {
            display: inline;
        }
        </style>';
        $checkdate = false;
    }


    $filter2 = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";

    $sql="SELECT email FROM user;";
    $run= mysqli_query($conn,$sql);
    $resultcheck = mysqli_num_rows($run);

    if($resultcheck > 0)
    {

    while($row = mysqli_fetch_assoc($run)){

        if($row['email']== $email){
            $e = '<style type="text/css">
            #i7, #seven1 {
                display: inline;
            }
            </style>';
            $checkEmaile = false;

        }
    }
}

   

     if (preg_match($filter2, $email)) {
        $checkEmaile = true;

    } else {
        $e = '<style type="text/css">
        #i7, #seven {
            display: inline;
        }
        </style>';
        $checkEmaile = false;
    }

    $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=(.*[\d]){2,})[A-Za-z\d?]{8,32}$/";
    $num = "/[\d]{2,}/";
    $capital = "/[A-Z]/";
    $symboles = "/[#$@!%&*?]/";
    if (preg_match($regex, $pass)) { //To check from 2 passwords syntax

        $f = '<style type="text/css">
    #i8, #eight {
        display: inline;
    }
    </style>';


        $checkpass = false;


    } else if (!preg_match($capital, $pass)) { //To check from the first letter
        $f = '<style type="text/css">
        #i8, #eight2{
            display: inline;
        }
        </style>';

        $checkpass = false;


    } else if (!preg_match($num, $pass)) { //To check if it contains numbers

        $f = '<style type="text/css">
        #i8, #eight3{
            display: inline;
        }
        </style>';

        $checkpass = false;


    } else if (!preg_match($symboles, $pass)) { //To check if it contains special charcter

        $f = '<style type="text/css">
        #i8, #eight4{
            display: inline;
        }
        </style>';

        $checkpass = false;


    } else if (strlen($pass) < 8) {  //To check if it contains at least 8 

        $f = '<style type="text/css">
        #i8, #eight6{
            display: inline;
        }
        </style>';

        $checkpass = false;


    } else if (strpos($pass, ' ')) {

        $f = '<style type="text/css">
        #i8, #eight5{
            display: inline;
        }
        </style>';

        $checkpass = false;
    } else {
        $checkpass = true;
    }

    if ($pass != $Confirm) {
        $g = '<style type="text/css">
        #i9, #nine{
            display: inline;
        }
        </style>';

        $checkco = false;
    } else {
        $checkco = true;
    }

    if ($checkFN && $checkMobile && $checkEmaile && $checkdate && $checkpass && $checkco) {

        $reg = '<style type="text/css">
  #reg, .pop{
      display: block;
  }
  </style>';

  $pass=md5($pass);
        $sql = "INSERT INTO user (first_name, last_name, email,pass,mobile,datee ) 
  VALUES ('$fname', '$lname', '$email', '$pass', '$mobile','$date');";


        if (mysqli_query($conn, $sql)) {
            echo '';
        } else {
            echo "error:" . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

        echo "<script language='javascript'>
setTimeout(() => {
    window.location.href = 'login.php'; 
 }, 3000);
</script>";
    }


    if(!empty($email)) $x1= $email;
    if(!empty($mobile)) $x2= $mobile;
    if(!empty($fname)) $x3= $fname;
    if(!empty($lname)) $x33= $lname;
    if(!empty($date)) $x4= $date;

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/signup.css">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
    <script src="https://kit.fontawesome.com/ccfa87eec6.js" crossorigin="anonymous"></script>
    <title>Register Page</title>
    <link rel="shortcut icon" href=".\Images\logo.png">

    <style>
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
}

.container {
  /* background-color: #f1f1f1; */
  padding: 20px;
}

#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

.invalid {
  color: red;
  font-size: 11px !important;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
    <title> sign up form</title>



</head>

<body>
    <nav>
        <div class="logo">
        <img width="110px" src=".\Images\logo.png" style="margin-left: 80%;">
        </div>

        <div class="tab1">
            <a href="landingpage.php">HOME</a>
            <a href="ProductsPage.php">PRODUCTS</a>
            <a href="contactUS.php">CONTACT US</a>
            <a href="aboutUS.php">ABOUT US</a>
        </div>
        <div class="tab2">
            <a href="login.php">LOGIN</a>
        </div>
    </nav>
    <section id="intro">
        <div class="container">
            <div class="left-col">

            </div>
            <div class="right-col">

                <div class="form-container">
                    <form method="post">
                        <h1 class="h1">Sign Up</h1>
                        <div class="field-group">
                            <label for="first-name">Full Name</label>
                            <input name='fname' id="first-name" type="text" required="true" placeholder='First name' class='na1' value="<?php if(isset($x3)) echo $x3;?>">

                            <input name='lname' id="last-name" type="text" required="true" placeholder='last name' class='na2' value="<?php if(isset($x33)) echo $x33;?>">

                            <img src="./img/icon-error (1).svg" class="error-icon" alt="" id="i1">
                            <p class="error-text" id='one'>Name field required only alphabet characters</p>
                            <?php if (isset($b)) {
                                echo $b;
                            } ?>
                        </div>


                        <div class="field-group">
                            <label for="Mobile">Mobile Numde</label>
                            <input name='Mobile' id="Mobile" type="number" required="true" value="<?php if(isset($x2)) echo $x2;?>">
                            <img src="./img/icon-error (1).svg" class="error-icon" alt="" id='i5'>
                            <p class="error-text" id='five'>Mobile Numde must btween 10-14 diget</p>
                            <?php if (isset($c)) {
                                echo $c;
                            } ?>
                        </div>


                        <div class="field-group">
                            <label for="Date"> Date of Birth</label>
                            <input name='Date' id="Date" type="date" required="true" value="<?php if(isset($x4)) echo $x4;?>">
                            <img src="../img/icon-error (1).svg" class="error-icon" alt="" id='i6'>
                            <p class="error-text" id='six'>age can not be under 16</p>
                            <?php if (isset($d)) {
                                echo $d;
                            } ?>
                        </div>


                        <div class="field-group">
                            <label for="Email">Email Address</label>
                            <input name='Email' id="Email"  type="email" required="true" value="<?php if(isset($x1)) echo $x1;?>">
                            <img src="./img/icon-error (1).svg" class="error-icon" alt="" id='i7'>
                            <p class="error-text" id='seven'>Looks like this is not email</p>
                            <p class="error-text" id='seven1'>this email already sign up</p>
                            <?php if (isset($e)) {
                                echo $e;
                            } ?>
                        </div>


                        <div class="field-group">
                            <label for="password">Password </label>
                            <input name='password' id="password" value="" type="password" required="true" >
                            <img src="./img/icon-error (1).svg" class="error-icon" alt="" id='i8'>
                            <p class="error-text" id='eight'>password syntax is Incorrect'</p>
                            <p class="error-text" id='eight2'>first letter must be capital</p>
                            <p class="error-text" id='eight3'>password must contain 2 numbers at least</p>
                            <p class="error-text" id='eight4'>password must contain at least 1 special character</p>
                            <p class="error-text" id='eight5'>password can not contain a space</p>
                            <p class="error-text" id='eight6'>password lenght should be 8 or more</p>
                            <div id="message">


  <h3 style="font-size: 11px;">Password must contain the following:</h3>
  <p id="letter" style="font-size: 12px;" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" style="font-size: 12px;" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number"  style="font-size: 12px;" class="invalid">A <b>number</b></p>
  <p id="length" style="font-size: 12px;" class="invalid">Minimum <b>8 characters</b></p>
</div>
                            <?php if (isset($f)) {
                                echo $f;
                            } ?>
                        </div>
                        <div class="field-group">
                            <label for="Confirm">Confirm Password</label>
                            <input name='Confirm' id="Confirm" value="" type="password" required="true">
                            <img src="./img/icon-error (1).svg" class="error-icon" alt="" id='i9'>
                            <p class="error-text" id='nine'>Password not matching</p>
                            <?php if (isset($g)) {
                                echo $g;
                            } ?>
                        </div>
                        <input type="submit" value='Sign Up' name='submit' id='signup'>
                        <div class="pop">
                            <p id='reg'> successfully registered</p>
                        </div>
                            <?php if (isset($reg)) {
                                echo $reg;
                            } ?>
                        <p class="form-footer">By clicking the button, you are agreeing to our <span>Terms and Services</span></p>
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

    <script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

myInput.onkeyup = function() {
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
</body>
</html>