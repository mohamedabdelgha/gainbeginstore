<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:user-log.php');
};
if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:user-log.php');
};
if(isset($_POST['add'])){
   $IMAGE= $_POST['image'];
   $NAME = $_POST['name'];
   $PRICE = $_POST['price'];
   $QUANTITY = $_POST['quantity'];
   $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE name = '$NAME' AND user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'This Item Is Already Exsit!';
   }else{
      mysqli_query($con, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$NAME', '$PRICE', '$IMAGE', '$QUANTITY')") or die('query failed');
      $message[] = 'This Item Has Been Successfully Added!';
   } 
}
if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($con, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = ' Your Cart Has Been Successfully Updated';
}
if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($con, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:card.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <title>My Cart</title>
   <link rel="icon" href="images/logo.icon">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="card.css">
</head>
<body bgcolor="F4F0E8">
<header id="head">
         <div class="name">
               <a href="index.php"><i class="fa-solid fa-backward"></i></a>   
               <img src="images/logo.png" alt="logo">
         </div>
      </header>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
<div class="container">
<div class="user-profile">
   <?php
      $select_user = mysqli_query($con, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>
   <p>Current User: <span><?php echo $fetch_user['name']; ?></span> </p>
   <div class="flex">
      <a href="card.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are You Sure You Want To Logout?');" class="delete btn">LOGOUT</a>
   </div>
</div>
<div class="shopping-cart">
   <h1 class="heading">My Cart</h1><hr>
   <table>
      <thead>
         <th>image</th>
         <th>NAME</th>
         <th>price</th>
         <th>quantity</th>
         <th>sub-total</th>
         <th></th>
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><img src="<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td><?php echo $fetch_cart['price']; ?> AED</td>
            <td>
               <form method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" class="num"  min="1" name="quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="Edit" class="option btn">
               </form>
            </td>
            <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>AED</td>
            <td><a href="card.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete btn" onclick="return confirm('Do You Want To Remove This Item From Your Cart?');">REMOVE</a></td>
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
         <td><a href="user_info.php"  class="purchase btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">PURCHASE NOW</a></td>
      </tr>
   </tbody>
   </table>
</div>
</div>
<!-- end of cart -->
</body>
</html>