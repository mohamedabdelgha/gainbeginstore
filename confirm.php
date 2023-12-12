<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:home.php');
};
?>
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
    <link rel="stylesheet" href="confirm.css">

</head>
<body bgcolor="F4F0E8">
<center>
<div class="card"> 
    <div class="header"> 
        <div class="image">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 7L9.00004 18L3.99994 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
        </div> 
        <div class="content">
            <span class="title">Order validated</span> 
            <p class="message">Thank you for your purchase. you package will be delivered within 2 days of your purchase</p> 
        </div> 
         <div class="actions">
            <a class="history" href="confirm.php?logout=<?php echo $user_id; ?>">Done</a> 
        </div> 
    </div> 
</div>
</center>
</body>
</html>