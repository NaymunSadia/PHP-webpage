<?php
include 'crudconfig.php';
echo $Id = $_GET['Id'];
mysqli_query($con, "delete from product where Id = $Id");

header('Location: crud1.php')
?>