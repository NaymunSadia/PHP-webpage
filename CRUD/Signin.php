<?php


include("configsignup.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  
  if(!empty($email) && !empty($pass) && !is_numeric($email)){

  $query = "SELECT * FROM form WHERE email='$email'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

          if (password_verify($pass, $row['pass'])) {
              // Password verification successful
                session_start();
    $_SESSION['email'] = $row['email'];
    header('location: crud/crud1.php');
             
          } else {
            echo "<script>alert('Incorrect email or password')</script>";
            echo "<script>location.href='Signin.php'</script>";
          }
      }
    }
  

  if($email == "admin@gmail.com" && $pass == "admin"){
    session_start();
    $_SESSION['email'] = $email;
    header('location: crud1.php');
}else{
    echo "<script>alert('Incorrect email or password')</script>";
    echo "<scrript>location.href='Signin.php'</script>";
}
}

   
 








?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>

<body>

<div class="container" style="max-width: 3500px" >
  
<div class="row justify-content-center">




            <div class="col-lg-4  col-md-6">
            </div>
            <div class="col-lg-4  col-md-6">
     <div class="login_form p-4 shadow-sm rounded" style="background-color: #99CCFF; color: #black; font-size: 20px; margin-top: 15%">
<h2 class="text-center">Signin Form</h2>
            <form method="POST" autocomplete="off">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pass" class="form-control">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input">
    <label class="form-check-label" for="exampleCheck1">Remember me</label>
  </div>
  <div class="text-center"><button type="submit" name="button" class="form_btn btn btn-outline-dark" class="fw-medium" 
  style="background-color:#3399FF; width: 80px">Login</button></div>
</form>

<p style="font-size: 17px; text-align: center; margin-top: 10px;"><a href="forgot_password.php" class="text-decoration-none" style="color: #00376b;">Forgot Password?</a></p>
<br>
<p class="text-center">Don't have an account? <a href="Signup.php" class="text-decoration-none fw-medium">Sign Up</a></p>
     </div>

            </div>
            
            <div class="col-lg-4  col-md-6">
            </div>
           
</div>
</div>
</div>


                

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" 
integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</html>