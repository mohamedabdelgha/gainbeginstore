<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/logo.icon">
    <title>GAINBEGIN / SHOP</title>
</head>
<body>
<header id="head">
            <a href="index.php" class="cart-btn"><i class="fa-solid fa-backward"></i></a>
            <div class="name">   
                <img src="images/logo.png" alt="logo">
            </div>
            <div>
                <a href="wish.php" class="cart-btn"><i class="fa-regular fa-user"></i></a>
                <a href="wish.php" class="cart-btn"><i class="fa-regular fa-heart"></i></a>
                <a href="card.php" class="cart-btn"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
    </header>   
    <section class="welcome">
        <div class="welcoming">
            <h1>Welcome To GAINBEGIN Store</h1>
            <p>We Presents A Collections Of Best Supplements<br> & Multi Vitamins</p>
        </div>
        <form class="search-container" method="post" action="search.php">
            <input type="search" name="search" id="search" placeholder="search" required value="<?php echo $searchTerm=$_POST['search'] ;?>" >
            <button name="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </section>
<h1 class="title">  search results</h1><hr>

<center>
<main>
<?php
include('config.php');
if(isset(($_POST['search-btn']))){
    $searchTerm = $_POST['search'];

$sql = "SELECT * FROM prod WHERE name LIKE '%$searchTerm%' OR sort LIKE '%$searchTerm%'";
$result = $con->query($sql);

// عرض نتائج البحث
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo"
        <div class='card'>
                <img src='$row[image]' class='card-img-top'>
            <div class='card-body'>
                <h5 class='card-title'>NAME: $row[name]</h5>
                <h6 class='card-price'>PRICE: $row[price]</h6>
                <p class='card-text'>$row[description]</p>
                <a href='wish.php? id=$row[id]'class='wish'><i class='fa-regular fa-heart'></i> Wish list</a>
                <a href='val.php? id=$row[id]'class='cart'><i class='fa-solid fa-cart-shopping'></i> Cart</a>
            </div>
        </div>";
    }
} else {
    echo "لا توجد نتائج للبحث.";
};    
};?>
</main><hr><br>
    </center>
</body>
</html>