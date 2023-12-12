<?php
include('config.php');
if(isset($_POST['upload'])){
    $NAME= $_POST['name'];
    $DESCRIPTION=$_POST['description'];
    $PRICE=$_POST['price'];
    $IMAGE=$_FILES['image'];
    $SORT=$_POST['sort'];
    $image_location=$_FILES['image']['tmp_name'];
    $image_name=$_FILES['image']['name'];
    $image_up="prod-images/".$image_name;
    $insert="INSERT INTO prod (name,description,price,image,sort) VALUES ('$NAME','$DESCRIPTION','$PRICE','$image_up','$SORT')";
    mysqli_query($con,$insert);
    if(move_uploaded_file($image_location,'prod-images/'.$image_name)){
        echo"<script>alert('your product has been successfully uploaded')</script>";
    }
    else{
        echo"<script>alert('some thing went wrong please try again')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="upload.css">
    <link rel="icon" href="images/logo.icon">
    <title>Admin Page</title>
</head>
<body bgcolor="F4F0E8">
<header id="head">
    <div class="name">
        <a href="dashboard.php"><i class="fa-solid fa-backward"></i></a>   
        <img src="images/logo.png" alt="logo">
    </div>
</header>
    <center>
    <form class="content"  method="post" enctype="multipart/form-data">
        <br><h1>uploading products</h1><br>
        <div class="inputs">
            <section class="name">
                <input type="text" id="name" name='name' placeholder="Product Name" required>
            </section>
            <section class="sort">
                <select name="sort">
                    <option value="Whey protein">Whey protein</option>
                    <option value="Mass gainers">Mass gainers</option>
                    <option value="Post workout & Recovery">Post workout & Recovery</option>
                    <option value="Fat burners">Fat burners</option>
                    <option value="Pre-workout & energy">Pre-workout & energy</option>
                </select>
            </section>
            <section class="price">
                <input type="text" id="price" name='price' placeholder="Price" required>
            </section>
            <section class="descreption">
                <textarea type="text" id="description" rows="3" name='description' placeholder="Description" required></textarea>
            </section>
        </div>
            <section class="image">
                <h2>image</h2>
                <input type="file" id="file" name='image' required>
                <label for="file">upload image</label>
            </section>
        <button class="upload" name='upload'>upload product</button>
        <a href="editing.php">see products page</a>
        <a href="orders list.php">see orders list</a>
        
    </form>
        </center>
    
</body>
</html>