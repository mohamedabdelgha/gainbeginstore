<?php
include('config.php');
if(isset($_POST['update'])){
    $ID=$_POST['id'];
    $NAME= $_POST['name'];
    $DESCRIPTION=$_POST['description'];
    $PRICE=$_POST['price'];
    $IMAGE=$_FILES['image'];
    $image_location=$_FILES['image']['tmp_name'];
    $image_name=$_FILES['image']['name'];
    $image_up="prod-images/".$image_name;
    $update="UPDATE prod SET name='$NAME', description='$DESCRIPTION', price='$PRICE', image='$image_up'WHERE id=$ID ";
    mysqli_query($con,$update);
    if(move_uploaded_file($image_location,'prod-images/'.$image_name)){
        echo"<script>alert('your product has been successfully updated')</script>";
    }
    else{
        echo"<script>alert('some thing went wrong please try again')</script>";
    }
}
header('location: editing.php');
?>