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
<body bgcolor="F4F0E8">
<header id="head">
        <div class="name">
            <a href="dashboard.php"><i class="fa-solid fa-backward"></i></a>   
            <img src="images/logo.png" alt="logo">
        </div>
</header>    <section class="comment">
        <?php
            include('config.php');
            if(isset($_GET['remove'])){
                $remove_id = $_GET['remove'];
                mysqli_query($con, "DELETE FROM `comment` WHERE id = '$remove_id'") or die('query failed');
                header('location:comment.php');
            }
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
                        <a href='comment.php?remove=$rows[id]' class='delete btn' onclick='return confirm('Do You Want To Remove This comment ?')'>REMOVE</a>
                    </div>";
                }
            }else{
                echo "<P class='comment-p' style='text-align: center;'>Sorry, No Comments Yet </P>";
            };   
        ?>
    </section>
</body>
<html>