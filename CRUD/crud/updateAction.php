<?php
include 'crudconfig.php';


if(isset($_POST['update'])){
    $Id = $_POST['Id'];
    $Name = $_POST['name'];
    $Price = $_POST['price'];
    $Image = $_FILES['image'];
  $img_loc = $_FILES['image']['tmp_name'];
  $img_name = $_FILES['image']['name'];
  $img_des = "images/".$img_name;
  move_uploaded_file($img_loc,'images/'.$img_name);


  mysqli_query($con, "UPDATE `product` SET `Name`='$Name',`Price`='$Price',`Image`='$img_des' WHERE Id = '$Id' ");
  header("location: crud1.php");

}
?>