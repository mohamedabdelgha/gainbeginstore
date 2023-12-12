<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>orders List</title>
    <link rel="icon" href="images/logo.icon">
<!-- custom css file link  -->
<link rel="stylesheet" href="orders-list.css">
</head>
<body bgcolor="F4F0E8">
<header id="head">
        <div class="name">
            <a href="dashboard.php"><i class="fa-solid fa-backward"></i></a>   
            <img src="images/logo.png" alt="logo">
        </div>
</header>
<center>
<div class="container">
<h1 class="heading">Orders List</h1><hr>
<form action="veiw-order.php" class="shopping-cart" method="post" enctype="multipart/form-data">
<table>
    <thead>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>INFORMATION</th>
        <th>ORDERS</th>
        <th>DATE</th>
</thead>
<tbody>
    <?php
        include('config.php');
        $sqlu="SELECT * FROM orders";
        $results = $con->query($sqlu);
        $roww = mysqli_fetch_array($results);
        $id=$roww['user_id'];
        $result= mysqli_query($con,"SELECT * FROM users");
        if(mysqli_num_rows($result) > 0 and $row['id']=$roww['id']){
        while($row = mysqli_fetch_array($result)){
            $sql=mysqli_query($con,"SELECT * FROM orders Where user_id='$id'");
            $rows = mysqli_fetch_array($sql);
        ?>
    <form action="veiw-order.php" method="post">
    <input type="hidden" name="userid" value="<?php echo $row['id']; ?>">
    
    <tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['number'];?></td>
        <td><span>country :</span> <?php echo $row['country'];?><br>
            <span>city :</span> <?php echo $row['city'];?><br>
            <span>address :</span> <?php echo $row['address'];?>
        </td>
        <td><button class="veiw-btn" name="veiw-btn">Veiw Orders</button></td>
        <td><?php echo $rows['date'];?></td>
    </tr>
    </form>
    <?php    
    };
    }else{
        echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">There Is No Orders Yet</td></tr>';
    };
    ?>
</tbody>
</table>
</center>
    </form>
</div>
<script src="app.js"></script>
</body>
</html>