<?php
include 'crudconfig.php';


if(isset($_POST['upload'])){
    $Name = $_POST['name'];
    $Price = $_POST['price'];
    $Image = $_FILES['image'];
  $img_loc = $_FILES['image']['tmp_name'];
  $img_name = $_FILES['image']['name'];
  $img_des = "images/".$img_name;
  move_uploaded_file($img_loc,'images/'.$img_name);


  mysqli_query($con, "insert into product (Name, Price, Image) VALUES ('$Name','$Price','$img_des')");
  header("location: crud1.php");

}
?>