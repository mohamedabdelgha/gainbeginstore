
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WISH LIST</title>
    <link rel="icon" href="images/logo.icon">
</head>
<body>
<header id="head">
        <div class="name">
            <a href="index.php"><i class="fa-solid fa-backward"></i></a>   
            <img src="images/logo.png" alt="logo">
        </div>
    </header>
    <h1 class="heading">My Wish List</h1><hr>
<center>
    <main>
        <?php
        include('config.php');
        $ID=$_GET['id'];
        $result= mysqli_query($con,"SELECT * FROM prod where id=$ID");
        while($row = mysqli_fetch_array($result)){
    echo"
        <div class='card'>
            <div class='img-con'>
                <img src='$row[image]' class='card-img-top'>
            </div>
            <div class='card-body'>
                <h5 class='card-title'>NAME: $row[name]</h5>
                <h6 class='card-price'>PRICE: $row[price]</h6>
                <p class='card-text'>$row[description]</p>
                <a href='val.php? id=$row[id]'class='cart'><i class='fa-solid fa-cart-shopping'></i> Add To Cart</a>
            </div>
        </div>
    ";
}
?>
    </main><hr><br>
    </center>
</body>
</html>