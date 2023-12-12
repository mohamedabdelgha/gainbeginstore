<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="upload.css">
    <link rel="icon" href="images/logo.icon">
    <title>updating</title>
</head>
<body bgcolor="F4F0E8">
    <?php
        include('config.php');
        $ID= $_GET['id'];
        $UP = mysqli_query($con,"select * from prod where id =$ID");
        $DATA = mysqli_fetch_array($UP);
    ?>
    <center>
    <form class="content" action="up.php" method="post" enctype="multipart/form-data">
        <img src="images/logo.png" alt=""> 
        <h1>updating product</h1>
        <div class="inputs">
        <section class="price">
                <h2>id</h2>
                <input type="text" id="id" name='id'value='<?php echo $DATA['id']?>'readonly>
            </section>
            <section class="name">
                <h2>product name</h2>
                <input type="text" id="name" name='name' value='<?php echo $DATA['name']?>'>
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
            <section class="descreption">
                <h2>descreption</h2>
                <input type="text" id="description" rows="3" name='description'value='<?php echo $DATA['description']?>'>
            </section>
            <section class="price">
                <h2>price</h2>
                <input type="text" id="price" name='price'value='<?php echo $DATA['price']?>'>
            </section>
        </div>
            <section class="image">
                <h2>image</h2>
                <input type="file" id="file" name='image' value="<?php echo $DATA['image']?> " required>
                <label for="file">update image</label>
            </section>
        <button class="upload" name='update' type="submit">update product</button>
        <a href="editing.php">see products page</a>        
    </form>
        </center>
    
</body>
</html>