<?php
include_once '..\Connection\connect.php';
session_start();
$id= $_GET["id"];

$e=0;
$arr_q=[];
if(isset($_GET['save'])){

    foreach (array_keys($_GET) as $key) {
        $str = $key;
        $pattern = "/quan/i";
        if(preg_match($pattern, $str)){
            $e++;
            $arr_q[] = $key;
        } 
    }
/*-------------------------------------------------------- */
    $queryt="SELECT * FROM cart INNER JOIN products WHERE cart.product_id=products.id  AND user_id=$id;";
    $resultt= mysqli_query($conn, $queryt);
    $resultcheckt = mysqli_num_rows($resultt);


    if($resultcheckt > 0)
    {
        $i=0;
        while($rowt = mysqli_fetch_assoc($resultt)){

            for($r=0; $r < $e; $r++){
                $index= "quan".$i;
                $q=$_GET[$index];

                /*------------------------- */
                $index1= "product_id".$i;
                $pro_id=$_GET[$index1];
    
            }

            $sqlt = "UPDATE cart SET quantity=$q WHERE product_id=$pro_id AND user_id=$id;";
            mysqli_query($conn, $sqlt);

            $i++;
        }
    }
}


if(isset($_GET['del_pro'])){
    $del_pro= $_GET['del_pro'];
    $query2= "DELETE FROM cart WHERE product_id=$del_pro AND user_id=$id;";
    $result2= mysqli_query($conn, $query2);
}



$query="SELECT * FROM cart INNER JOIN products WHERE cart.product_id=products.id  AND user_id=$id;";
$result= mysqli_query($conn, $query);
$resultcheck = mysqli_num_rows($result);
                    
if(isset($_POST['checkout'])){
    header("location:  checkout.php");
}

$homepath= ' landingpage.php?id='.$id;
$shoppath= ' ProductsPage.php?id='.$id;
$categorypath= ' CategoriesPage.php?id='.$id.'&';
$cartpath= '#';
$about= 'aboutUS.php?id='.$id;
$contact= ' contactUS.php?id='.$id;

?>


<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart UI</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
    <link href="testCart.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
    
</head>
<body>


   <div class="CartContainer">
   	   <div class="Header">
   	   	<h3 class="Heading">Shopping Cart</h3>
   	   </div>

          <?php

$quan_sum=0;
$sum=0;
if($resultcheck > 0)
    {
    $i=0;
    while($row = mysqli_fetch_assoc($result))
    {
        if(isset($_GET['save'])){
            for($r=0; $r < $e; $r++){
                $index= "quan".$i;
                $q=$_GET[$index];
                
                /* -------------------------------------- */
                $index1= "product_id".$i;
                $pro_id=$_GET[$index1];

            }
        }else{
            $q = $row['quantity'];
        };

    echo '<form action="" method="get">

   	   <div class="Cart-Items">
   	   	  <div class="image-box">
                <img src=".'. $row['image'] .'" width="50px" alt="">
   	   	  </div>

   	   	  <div class="about">
   	   	  	<h1 class="title">'.$row['name'].'</h1>   	   	  	
   	   	  </div>

   	   	  <div class="counter">
          
                <input type="hidden" value="'.$row['product_id'].'" name="product_id'.$i.'">
                <input type="number" class="num" min="1" value="'.$q.'" name="quan'.$i.'" id="">
            


            <div>$'.($row['price']*$row['quantity']).'</div> 
            </div>';
            


            $quantity[] = $row['quantity'];

            $sum+= ($row['price']*$row['quantity']);
            $i++;
            }} 
            $_SESSION["total"]= $sum;
            $_SESSION["id"]= $id;

            echo '<input type="hidden" value="'.$id.'" name="id">';
   	   	  

   	   	  <div class="prices">
   	   	  	<div class="amount">$'.$row['price'].'</div>
   	   	  	<div class="remove"><a href="cart.php?id='.$id.'&del_pro='.$row['id'].'"><u>Remove</u></div>
   	   	  </div>
   	   </div>

   	   ?>
   	 <hr> 
   	 <div class="checkout">
   	 <div class="total">
   	 	<div>
   	 		<div class="Subtotal">Sub-Total</div>
   	 	</div>
        
   	 	<div class="total-amount">Total Payment: <?php echo $sum; ?> JD</div>
   	 </div>

   	 <button class="button">Checkout</button></div>

   </div>





</body>
</html>