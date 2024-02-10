<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
      input{
        margin: 10px;
      }
      </style>
</head>
<body>


<?php
include 'crudconfig.php';
$Id = $_GET['Id'];
$Record = mysqli_query($con, "select * from product where Id = '$Id'");

$data = mysqli_fetch_array($Record);


?>

<div class="main">
    <form action="updateAction.php" method="POST" enctype="multipart/form-data">
        <label for="">Name:</label>
        <input type="text" value="<?php echo $data['Name'] ?>" name="name"><br>
        <label for="">Price:</label>
        <input type="text" value="<?php echo $data['Price'] ?>" name="price" id=""><br>
        
        <label for="">Image:</label>
        <td><input type="file" value="<?php echo $data['Image'] ?>" name="image" id="">
        <img src="<?php echo $data['Image'] ?>" width = '230px' height = '120px'></td><br>


        <input type="hidden" name="Id" value="<?php echo $data['Id']?>">
        <button type="submit" name="update" class='btn btn-danger m-2'>Update</button>

    </form>


    </div>
</body>
</html>