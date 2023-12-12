
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="editing.css">
    <link rel="icon" href="images/logo.icon">
    <title>uploaded products</title>
</head>
<body>
    <header id="head">
        <a href="dashboard.php"><i class="fa-solid fa-arrow-left"></i></a>
        <img src="images/logo.png" alt="">
    </header>
    <h1 class="title">Uploaded Products</h1><hr>

    <center>
    <main>
        <?php
include('config.php');
$result= mysqli_query($con,"SELECT * FROM prod");
while($row = mysqli_fetch_array($result)){
    echo"
        <div class='card' style='width: 18rem;'>
            <img src='$row[image]' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>NAME: $row[name]</h5>
                <h6 class='card-price'>PRICE: $row[price]</h6>
                <p class='card-text'>$row[description]</p>
                <a href='update.php? id=$row[id]' class='edit'>Edit</a>
                <a href='delete.php? id=$row[id]' class='delete'>Delete</a>
            </div>
        </div>

    ";
}
?>
    </main>
    </center>
</body>
</html>