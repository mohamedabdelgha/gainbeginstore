<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, md5($_POST['password']));

   $select = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:users.php');
   }else{
      $message[] = 'incorrect password or email!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <link rel="icon" href="images/logo.icon">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="user-s.css">
   <style>
      input{
         text-align: center;
      }
   </style>
</head>
<body>
      <header>
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
   
<div class="form-container">

   <form action="" method="post">
      <h3>Sign In</h3>
      <img src="images/Sign in-pana.png" alt="">
      <input type="email" name="email" required placeholder="Email" class="box">
      <input type="password" name="password" required placeholder="Password" class="box">
      <input type="submit" name="submit" class="btn" value="Sign In">
      <p> Don't Have An Email? <a href="user-sign.php">New One</a></p>
   </form>

</div>

</body>
</html>