
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="dashboards.css">
    <link rel="icon" href="images/logo.icon">
    <title>dashboard</title>
</head>
<body>
    <div class="menu">
        <ul>
            <div class="profile">
                <img src="images/WhatsApp Image 2023-05-05 at 14.58.4333.png" alt="profile image">
                <h2>Gainbegin store</h2>
            </div>
            <li>
                <a class="active"  href="dashboard.php">
                    <i class="fa-solid fa-house"></i>
                    <p>dashboard</p>    
                </a>
            </li>
            <li>
                <a href="upload.php">
                    <i class="fa-solid fa-circle-plus"></i>
                    <p>add products</p>    
                </a>
            </li>
            <li>
                <a href="editing.php">
                    <i class="fa-solid fa-eye"></i>
                    <p>show products</p>
                </a>
            </li>
            <li>
                <a href="orders list.php">
                    <i class="fa-solid fa-list-check"></i>
                    <p>orders list</p>
                </a>
            </li>
            <li>
                <a href="clients.php">
                    <i class="fa-solid fa-users"></i>
                    <p>clients</p>
                </a>
            </li>
            <li>
                <a href="comment.php">
                    <i class='fa-solid fa-message'></i>
                    <p>Comments</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-gear"></i>
                    <p>settings</p>
                    </a>
            </li>
        </ul>
    </div>
    <div class="content">
            <?php
                include('config.php');                
               // استعلام SQL لاسترداد عدد الصفوف في الجدول
                $sql1 = "SELECT COUNT(*) as total_rows FROM users";
                $result1 = $con->query($sql1);
                
                if ($result1->num_rows > 0) {
                    $row1 = $result1->fetch_assoc();
                    $totalRows1 = $row1["total_rows"];
                }
                $sql2 = "SELECT COUNT(*) as total_rows FROM prod";
                $result2 = $con->query($sql2);
                
                if ($result2->num_rows > 0) {
                    $row2 = $result2->fetch_assoc();
                    $totalRows2 = $row2["total_rows"];
                }
                $sql3 = "SELECT COUNT(*) as total_rows FROM comment";
                $result3 = $con->query($sql3);
                
                if ($result3->num_rows > 0) {
                    $row3 = $result3->fetch_assoc();
                    $totalRows3 = $row3["total_rows"];
                }
            ?>
            
            <div class="title">
                <h1>dashboard</h1>
                <i class="fa-solid fa-chart-line"></i>
            </div>
            <div class="data-info">
                <div class="info">
                    <i class="fa-solid fa-users"></i>
                    <div class="data">
                        <p>users</p>
                        <span><?php echo"$totalRows1";?></span>
                    </div>
                </div>
                <div class="info">
                <i class="fa-solid fa-table"></i>
                    <div class="data">
                        <p>products</p>
                        <span><?php echo"$totalRows2";?></span>
                    </div>
                </div>
                <div class="info">
                    <i class='fa-solid fa-message'></i>
                    <div class="data">
                        <p>comments</p>
                        <span><?php echo"$totalRows3";?></span>
                    </div>
                </div>
            </div>
            <div class="title">
                <h1>last Orders</h1>
                <i class="fa-solid fa-table"></i>
            </div>
                <?php
                include('config.php');
                // استعلام SQL لاسترداد أول 3 صفوف من الجدول
                $sqlu="SELECT * FROM orders";
                $results = $con->query($sqlu);
                $roww = mysqli_fetch_array($results);
                if ($results->num_rows > 0) {
                    $id=$roww['user_id'];
                    $sql = mysqli_query($con,"SELECT * FROM users WHERE id=$id LIMIT 5")or die('query failed');
                    if ($sql->num_rows > 0) {
                        // عرض الصفوف
                        while ($row = $sql->fetch_assoc()) {
                        $user_id= $row['id'];
                        $sqls=mysqli_query($con,"SELECT * FROM orders Where user_id='$user_id'");
                        $rows = mysqli_fetch_array($sqls);
                        echo"
                        <table>
                        <thead>
                            <tr>
                                <th>client name</th>
                                <th>email</th>
                                <th>date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$rows[date]</td>
                        </tr>";};
                    };
                }else{
                    echo"<td colspan='3'>there is no orders</td>";
                };
                // إغلاق اتصال قاعدة البيانات
                $con->close();
                ?>
                </tbody>
            </table>
            <div class="title">
                <h1>recent products</h1>
                <i class="fa-solid fa-table"></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>product</th>
                        <th>price</th>
                        <th>discreption</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include('config.php');
                // استعلام SQL لاسترداد أول 3 صفوف من الجدول
                $sql = "SELECT * FROM prod LIMIT 5";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    // عرض الصفوف
                    while ($row = $result->fetch_assoc()) {
                    echo"<tr>
                        <td>$row[name]</td>
                        <td>$row[price]</td>
                        <td>$row[description]</td>
                    </tr>";
                    };
                }
                // إغلاق اتصال قاعدة البيانات
                $con->close();
                ?>
                    
                </tbody>
            </table>
    </div>
</body>
</html>