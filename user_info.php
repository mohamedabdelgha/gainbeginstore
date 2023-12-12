
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <title>user Info</title>
   <link rel="icon" href="images/logo.icon">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="users_data.css">
</head>
<body bgcolor="F4F0E8">
   <header id="head">
      <div class="name">
            <a href="card.php"><i class="fa-solid fa-backward"></i></a>   
            <img src="images/logo.png" alt="logo">
      </div>
   </header>
   <center>
   <?php
   include 'config.php';
   session_start();
   $user_id = $_SESSION['user_id'];
      $select_user = mysqli_query($con, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      }
      else {
      session_encode();
      };
      $date=date('y/m/d');
   ?>
   <h1>My Details</h1><hr>
   <section class="container" >
   <form class="user-data" action="conf.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="date" value="<?php echo $date; ?>">
         <input type="hidden" name="user_id" value="<?php echo $fetch_user['id']; ?>">
         <input type="text" name="name" placeholder="Please Enter Your Name" value="<?php echo $fetch_user['name'];?>" required>
         <input type="email" name="email" placeholder="Please Enter Your Email" value="<?php echo $fetch_user['email'];?>" required>
         <input type="tel"name="phone" maxlength="11" placeholder="Please Enter Your Phone"value="<?php echo $fetch_user['number'];?>" required>
         <input type="text" name="country" placeholder="Please Enter Your Country"value="<?php echo $fetch_user['country'];?>" required>
         <input type="text" name="city" placeholder="Please Enter Your City"value="<?php echo $fetch_user['city'];?>" required>
         <input type="text" name="address" placeholder="Please Enter Your Address"value="<?php echo $fetch_user['address'];?>" required>
         <button name="submit">submit</button>
   </form>
   <form action="conf.php" class="prod-data" method="post">
      <h2>My Products</h2>
   <table>
      <thead>
         <th>Name</th>
         <th>Price</th>
         <th>Quantity</th>
         <th colspan="2">Sub Total</th>
         
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td><?php echo $fetch_cart['price']; ?> AED</td>
            <td>
               <form method="post" action="conf.php" enctype="multipart/form-data">
               <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
               <h4 name="num"><?php echo $fetch_cart['quantity']; ?></h3>  
               </form>
            </td>
            <td colspan="2"><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?> AED</td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">Your Cart Is Empty</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">Grand Total:</td>
         <td><?php echo $grand_total; ?> AED</td>
      </tr>
   </tbody>
   </table>
   <input type="checkbox" id="check1" name="check1" value="true">
   <label for="check1"> Cash On Delivery</label>
   <div>
      <h2>Instructions</h2><hr>
      <ul>
         <li>Make sure that your details is correct to avoid any mistake.</li>
         <li>After submiting your details there is no way to edit it again.</li>
         <li>If you have any questions please contact with us.</li>
         <li>Our payment method is "Cash On Delivery", Other methods will be avilable soon.</li>
         <li>For better use we recommend to use a pc.</li>
         <li>There is a "Delivery Service" that will be added to your order's cost</li>
      </ul>
   </div>
   </form>
   </section>
   </center>
</body>
</html>