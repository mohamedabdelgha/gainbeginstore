<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <title>Orders</title>
   <link rel="icon" href="images/logo.icon">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="orders-list.css">

</head>
<body bgcolor="F4F0E8">
<header id="head">
      <div class="name">
            <a href="orders list.php"><i class="fa-solid fa-backward"></i></a>   
            <img src="images/logo.png" alt="logo">
      </div>
   </header>
<center>
<div class="container">
<div class="shopping-cart">
   <h1 class="heading">Orders</h1><hr>
   <table>
      <thead>
         <th>image</th>
         <th>NAME</th>
         <th>price</th>
         <th>quantity</th>
         <th>sub-total</th>
      </thead>
      <tbody>
      <?php
         include 'config.php';
         if(isset($_POST['veiw-btn'])){
         $id=$_POST['userid'];
        $cart_query = mysqli_query($con, "SELECT * FROM `orders` WHERE user_id='$id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0 ){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
            <tr>
               <td><img src="<?php echo $fetch_cart['image']; ?>" height="100"></td>
               <td><?php echo $fetch_cart['prod_name']; ?></td>
               <td><?php echo $fetch_cart['price']; ?> AED</td>
               <td>
                  <form method="post">
                     <h4><?php echo $fetch_cart['quantity']; ?></h4>
                  </form>
               </td>
               <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>AED</td>
            </tr>
      <?php
         $grand_total += $sub_total;
            }}}
      
      ?>
      <tr class="table-bottom">
         <td colspan="4">Grand Total:</td>
         <td><?php echo $grand_total; ?> AED</td>
      </tr>
   </tbody>
   </table>
   </div>
</div>
</center>
<!-- end of cart -->
</body>
</html>