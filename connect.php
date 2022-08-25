<?php

$servername = "localhost";
$username = "root";
$password = "";
$db= 'masterpiece';


$conn= mysqli_connect($servername, $username, $password,$db);


if (!$conn) {
    die(" <h1 style = 'color:red;'>Connection failed: " . mysqli_connect_error().'</h1>');
  }


  // echo "<h1> Connected successfully  </h1>";


?>
   