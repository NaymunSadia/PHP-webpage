

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
     
        
</head>
<body>


<header class= "header">
                 

          
                
               
           

          
            
           <button type="submit" name="but" id="but"><a href="Signup.php" class="fs-5 text-decoration-none">Register</a></button>
           <button type="submit" name="but1" id="but1"><a href="Signin.php"  class="fs-5 text-decoration-none">Log In</a></button>
           <button type="submit" name="but1" id="but1"><a href="signout.php"  class="fs-5 text-decoration-none">Log Out</a></button>

           
           
        
          
      
          

          
           </header>










    <div class="main">
    <form action="create.php" method="POST" enctype="multipart/form-data">
        <label for="">Name:</label>
        <input type="text" name="name"><br>
        <label for="">Price:</label>
        <input type="text" name="price" id=""><br>
        <label for="">Image:</label>
        <input type="file" name="image" id=""><br>

        <button type="submit" name="upload" class='btn btn-danger m-2'>Upload</button>

    </form>


    </div>

    <!---fetch data-->
<div class="container">


    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
<tbody>


  <?php
  include 'crudconfig.php';

  $fetch = mysqli_query($con, "select * from product");

  while($row = mysqli_fetch_array($fetch)){


    echo "
    <tr>
      <td>$row[Id]</td>
      <td>$row[Name]</td> 
      <td>$row[Price]</td>
      <td><img src='$row[Image]' width = '230px' height = '120px'></td>
      <td>$row[created_at]</td>
      <td>
          <a class='btn btn-primary btn-sm' href='update.php?Id=$row[Id]'> Edit <a>
          <a class='btn btn-danger btn-sm' href='delete.php?Id=$row[Id]'> Delete <a>
      </td>

    </tr>
    ";
  }


  ?>
  </tbody>
</table>
</div>

</body>
</html>


