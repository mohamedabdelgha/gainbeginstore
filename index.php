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
            <label for="checkbox" class="toggle">
                <span class="line-top common"></span>
                <span class="line-middle common"></span>
                <span class="line-bottom common"></span>
                <h1>Menu</h1>
            </label>
            <div class="name">   
                <img src="images/logo.png" alt="logo">
            </div>
            <div class="navs">
                <a href="users.php" class="cart-btn"><i class="fa-solid fa-user"></i></a>
                <a href="wish.php" class="cart-btn"><i class="fa-solid fa-heart"></i></a>
                <a href="card.php" class="cart-btn"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
    </header>   
    <a id="up" href="#head"><i class="fa-solid fa-arrow-up"></i> Go Up</a>

    <label>
    <input type="checkbox" id="checkbox" >
    <div class="slide">
        <h1>menu</h1> <span></span>
        <ul>
            <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
            <div class="main">
            <li><a href="wish.php"><i class="fa-solid fa-heart"></i>Wish list</a></li>
            <li><a href="users.php" class="cart-btn"><i class="fa-solid fa-user"></i> Account</a></li>
            <li><a href="card.php" class="cart-btn"><i class="fa-solid fa-cart-shopping"></i> My Cart</a></li>
            </div>
            <li><a href="#whey"><i class="fa-solid fa-jar"></i>Whey protein</a></li>
            <li><a href="#mass"><i class="fa-solid fa-dumbbell"></i>Mass gainers</a></li>
            <li><a href="#post"><i class="fa-solid fa-bottle-water"></i>Post workout & Recovery</a></li>
            <li><a href="#Fat"><i class="fa-solid fa-fire"></i>Fat burners</a></li>
            <li><a href="#Pre"><i class="fa-solid fa-jar"></i>Pre-workout & energy</a></li>  
            <li><hr></li>
            <li><a href="#contact"><i class="fa-solid fa-phone-volume"></i> Get In Touch</a></li>
            <li><a href="#aboutus"><i class="fa-solid fa-info"></i> About Us</a></li>
            <li><a href="#comment"><i class='fa-solid fa-message'></i> Feed backs</a></li>
            <li><a href="#contact"><i class="fa-solid fa-headset"></i>support</a></li>
            <li><hr></li>
        </ul>
    </div>
    </label>
    <section class="welcome">
        <div class="welcoming">
            <h1>Welcome To GAINBEGIN Store</h1>
            <p>We Presents A Collections Of Best Supplements<br> & Multi Vitamins</p>
        </div>
        <form class="search-container" method="post" action="search.php">
            <input type="search" name="search" id="search" placeholder="search" required>
            <button name="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </section>
    <h1 class="title">  Own Your Products</h1><hr>
    <center>
    <h2 class="title"id="whey"> Whey protein</h2><hr>
    <main >
        <?php
include('config.php');
$result= mysqli_query($con,"SELECT * FROM prod WHERE sort='Whey protein'");
while($row = mysqli_fetch_array($result)){
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
        </div>";}?>
</main><hr><br>
<h2 class="title"id="mass">Mass gainers</h2><hr>
    <main >
        <?php
include('config.php');
$result= mysqli_query($con,"SELECT * FROM prod WHERE sort='Mass gainers'");
while($row = mysqli_fetch_array($result)){
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
        </div>";}?>
</main><hr><br>
<h2 class="title"id="post">Post workout & Recovery</h2><hr>
    <main >
        <?php
include('config.php');
$result= mysqli_query($con,"SELECT * FROM prod WHERE sort='Post workout & Recovery'");
while($row = mysqli_fetch_array($result)){
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
        </div>";}?>
</main><hr><br>
<h2 class="title"id="Fat">Fat burners</h2><hr>
    <main >
        <?php
include('config.php');
$result= mysqli_query($con,"SELECT * FROM prod WHERE sort='Fat burners'");
while($row = mysqli_fetch_array($result)){
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
        </div>";}?>
</main><hr><br>
<h2 class="title"id="Pre">Pre-workout & energy</h2><hr>
    <main >
        <?php
include('config.php');
$result= mysqli_query($con,"SELECT * FROM prod WHERE sort='Pre-workout & energy'");
while($row = mysqli_fetch_array($result)){
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
        </div>";}?>
</main><hr><br>
    </center> 
    <h1 class="com-t">Clients Feed backs</h1><hr>
    <section class="comment">
        <?php
            include('config.php');
            $results= mysqli_query($con,"SELECT * FROM comment");
                if(mysqli_num_rows($results) > 0){
                    while($rows = mysqli_fetch_array($results)){
                echo"
                    <div class='cont'>
                        <img src='images/WhatsApp Image 2023-05-05 at 14.58.4333.png' alt='user'>
                        <div class='comment_card'>
                                <h5 class=''><i class='fa-solid fa-user'></i> $rows[name]</h5>
                                <p class='comment-p'> $rows[comments]</p>
                        </div>
                    </div>";
                }
            }else{
                echo "<P class='comment-p' style='text-align: center;'>Sorry, No Comments Yet </P>";
            };   
        ?>
    </section>
    <center>
<section class="contact" id="contact">
    <section class="co">
    <div class="nav">
    <h1>Get in touch</h1>
        <p><i class="fa-solid fa-location-dot"></i> dubai-emirates</p>
        <p target="_blank" href=""><i class="fa-solid fa-mobile"></i> 0588 344 309</p>
        <a target="_blank" href="#"><i class="fa-solid fa-square-envelope"></i> gainbegin@gmail.com</a>
        <div>
            <a target="_blank" href="#"><i class="fa-brands fa-facebook"></i></a>
            <a target="_blank" href="#"><i class="fa-brands fa-instagram"></i></a>
            <a target="_blank" href="#"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
    </div>
    <form class="nav2" name="comment" method="post" >
        <h3>leave a Feed back </h3>
        <input type="text" name='co_name' placeholder="your name">
        <textarea name='comment' id="comment" cols="30" rows="5" placeholder="your Feed back"></textarea>
        <input type="submit" onclick="return confirm('Thanks for supporting us , We wanna see you again :)');" name='send' class="send-btn" value="Send">
    </form>
    <?php
    include('config.php');
    if(isset($_POST['send'])){
        $CO_NAME=$_POST['co_name'];
        $COMMENT=$_POST['comment'];
        $insert="INSERT INTO comment (name,comments) VALUES ('$CO_NAME','$COMMENT')";
        mysqli_query($con,$insert);
    };
    ?>
    </section>
    </center>
    <section class="aboutus" id="aboutus">
    <h1>About Us</h1><hr>
    <p>"Welcome to our website, where we offer you the best nutritional supplements to achieve optimal health and well-being. We believe in the importance of balanced nutrition and healthy eating habits to enhance a better lifestyle.
        We provide a diverse range of high-quality dietary products specifically designed to meet your health needs. Our varied selection of nutritional supplements includes carefully chosen natural ingredients such as vitamins, essential minerals, amino acids, and herbal extracts.
        We work with top manufacturing companies in the nutritional supplement industry to ensure the quality of the products we offer. We meticulously test our products according to the highest industry standards to guarantee the effectiveness and safety of each item.
        Regardless of your individual health requirements, we strive to meet them by offering a wide range of diverse nutritional supplements. Whether you are looking to boost energy and vitality, build muscle, strengthen your immune system, or improve digestion, we have the perfect product for you.
        Shop with confidence as we provide excellent customer service and detailed guidance on product usage and recommended dosages. We believe in the importance of promoting nutritional awareness and providing our customers with the necessary information to make informed and healthy choices.
        Join us today and embark on your journey towards better health and a more active and fulfilling life. Explore our wide range of nutritional supplements and get the support you need to achieve your health goals."</p>
    </section>
    <div class="madeby">
        <hr>
        <p>Powered By : Mohamed Abd EL-ghany</p>
    </div>
</section>
<script>
    let up=document.getElementById('up');
    window.onscroll=function(){
        if(scrollY >=625){
            up.style.display='block'
        }else{
            up.style.display='none'
        }
    }
</script>
</body>
</html>