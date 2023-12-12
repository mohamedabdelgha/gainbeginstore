<?php
include 'config.php';
if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($con, $_POST['name']);
   $NUMBER = mysqli_real_escape_string($con, $_POST['number']);
   $COUNTRY = mysqli_real_escape_string($con, $_POST['country']);
   $CITY = mysqli_real_escape_string($con, $_POST['city']);
   $ADDRESS = mysqli_real_escape_string($con, $_POST['address']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($con, md5($_POST['cpassword']));
   $select = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      mysqli_query($con, "INSERT INTO `users`(name, email, password,number,country,city,address)
      VALUES('$name', '$email', '$pass','$NUMBER','$COUNTRY','$CITY','$ADDRESS')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:user-log.php');
   };}?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <title>GAINBEGIN / SignUp</title>
   <link rel="icon" href="images/logo.icon">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="user-s.css">
   <style>input{text-align: center;}</style>
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
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';}}
?>
<div class="form-container">
   <form action="" method="post">
      <h3>Sign Up</h3>
      <input type="text" name="name" required placeholder="User Name" class="box" required>
      <input type="email" name="email" required placeholder="Email" class="box" required>
      <input type="number" name="number" required placeholder="User number" class="box" required>
      <input type="text" name="country" required placeholder="User country" class="box" required>
      <input type="text" name="city" required placeholder="User city" class="box" required>
      <input type="text" name="address" required placeholder="User address" class="box" required>
      <input type="password" name="password" required placeholder="Password" class="box" required>
      <input type="password" name="cpassword" required placeholder="Password Confirmation" class="box" required>
      <input type="submit" name="submit" class="btn" value="Sign Up">
      <p>Already Have An Acount?<a href="user-log.php"> Sign In</a></p>
   </form>
</div>
</body>
</html>