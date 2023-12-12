<?php
include('config.php');
if(isset($_POST['submit'])){
    $USER_ID=$_POST['user_id'];
    $cart_query = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = '$USER_ID'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
        while($fetch_cart = mysqli_fetch_assoc($cart_query)){
            $image=$fetch_cart['image'];
            $prod_name=$fetch_cart['name'];
            $price=$fetch_cart['price'];
            $quantity=$fetch_cart['quantity'];
            $DATE=$_POST['date'];
        $insert="INSERT INTO orders (prod_name,price,quantity,user_id,date,image) VALUES ('$prod_name','$price','$quantity','$USER_ID','$DATE','$image')";
        mysqli_query($con,$insert);
        };
    };
    $insertd="DELETE FROM cart WHERE user_id=$USER_ID";
    mysqli_query($con,$insertd);
};header('location:validation.php');
?>