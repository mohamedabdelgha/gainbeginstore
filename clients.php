<?php
include('config.php');
if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($con, "DELETE FROM `users` WHERE id = '$remove_id'") or die('query failed');
    mysqli_query($con, "DELETE FROM `orders` WHERE user_id = '$remove_id'");
    header('location:clients.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="dashboards.css">
    <link rel="icon" href="images/logo.icon">
    <title>dashboard / clients</title>
</head>
<body>
<!-- <header id="head">
    <div class="name">
        <a href="index.php"><i class="fa-solid fa-backward"></i></a>   
        <img src="images/logo.png" alt="logo">
    </div>
</header> -->
<div class="content">
    <div class="title">
        <h1>clients</h1>
        <i class="fa-solid fa-table"></i>
    </div>
    <table>
        <thead>
            <tr>
                <th>client name</th>
                <th>email</th>
                <th>phone</th>
                <th></th>
            </tr>
        </thead>
        <?php
        include('config.php');
        // استعلام SQL لاسترداد أول 3 صفوف من الجدول
            $sql = "SELECT * FROM users";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                // عرض الصفوف
                while ($row = $result->fetch_assoc()) {
        ?>
                <tbody>
                <tr>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['number']?></td>
                    <td><a href="clients.php?remove=<?php echo $row['id']?>" class="delete btn" onclick="return confirm('Do You Want To Remove This Item From Your Cart?');">REMOVE</a></td>
                </tr>
        <?php
        };
            }else{
            echo"<td colspan='4'><p>there is no clients yet</p></td>";
        };
        ?>
        </table>
        <a class="back" href="dashboard.php">Go Back</a>
</div>
</body>
</html>