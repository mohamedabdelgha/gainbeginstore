<?php
include('config.php');
$ID=$_GET['id'];
$up=mysqli_query($con , "select * from prod where id=$ID");
$data=mysqli_fetch_array($up);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="vall.css">
    <link rel="icon" href="images/logo.icon">
    <title>Confirming purchase</title>
</head>
<body>
    <h1 class="title">Confirming Purchase</h1>
    <h2 class="title2">Do you Want To Buy This Product?</h2>
    <center>
        <form class='card' style='width: 18rem;' method="post" action="card.php">
            <img src='<?php echo $data['image']?>' class='card-img-top'>
            <div class='card-body'>
            <input type="hidden" name="image" value='<?php echo $data['image']?>'>
                <input type="hidden" name="name" value='<?php echo $data['name']?>'>
                <input type="hidden" name="price" value='<?php echo $data['price']?>'>
                <h5 class='card-title'>NAME: <?php echo $data['name']?></h5>
                <h6 class='card-price'>PRICE: <?php echo $data['price']?></h6>
                <p class='card-text'><?php echo $data['description']?></p>
                <div class="card-num">
                    <h3>Quantity: </h3>
                    <input type="number" placeholder="0" name="quantity">
                </div>
                <button name="add" class="add">CONFIRM</button><br><br>
                <a href="index.php">I CHANGED MY MIND</a>
                
            </div>
        </form>
    </center>

</body>
</html>