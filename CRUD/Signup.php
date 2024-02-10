<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="regstyle.css"/>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin="anonymous"></script>
   
</head>

<body>
<div class="container">
<div class="row">

<?php

include("configsignup.php");




$nameError = $emailError = $phnError = $passError = $cPassError="";


$name =  $email = $phn = $pass = $cPass =  "";





if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["name"])){
        $nameError = "&#x26A0 Name is required.";

    } else{
        $name = ($_POST["name"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameError = "&#x26A0 Only letters allowed.";
        }
    }

   
    
    if (empty($_POST["email"])){
        $emailError = "&#x26A0 Email is required.";

    } else{
        $email = ($_POST["email"]);

        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $emailError = "&#x26A0 Please enter a valid email.";
        }
    }

    if (empty($_POST["phn"])){
        $phnError = "&#x26A0 Phone number is required.";

    } else{
        $phn = ($_POST["phn"]);

        if (!preg_match("/(\+88)?-?01[3-9]\d{8}$/",$phn)) {
            $phnError = "&#x26A0 Please enter a valid number.";
        }
    }

    if (empty($_POST["pass"])){
        $passError = "&#x26A0 Please enter a password.";

    } 
    else{
        $pass = ($_POST["pass"]);

        if(strlen($pass)<8){
            $passError = "&#x26A0 Please enter atleast 8 charatcer with number, symbol, small and
            capital letter.";
        }
    }

    if (empty($_POST["cpass"])){
        $cPassError = "&#x26A0 Please confirm the password.";

    } else{
        $cPass = ($_POST["cpass"]);

        if ($pass !== $cPass || $cPass === "") {
            $cPassError = "&#x26A0 Password don't match. ";
        }
    }

}  
    





$options = ['cost' => 12];
$hash = password_hash($pass, PASSWORD_BCRYPT, $options);

$duplicate = mysqli_query($con, "select * from form where email = '$email'");
$count = mysqli_num_rows($duplicate);



if($count>0){
    echo "User already registered.";
}else{

    
if(!empty($email) && !empty($pass) && !is_numeric($email)){

  
     


        $query = mysqli_query($con, "insert into form (name, email, phn, pass) values ('$name', '$email', '$phn', '$hash')");

       
        echo "<script>alert('Registration successful.')</script>";
      
        }else{
         
        }
    
}

       




   
    
   
  


?>


<div class="row">
<div class="col-sm-4">
</div>

<div class="col-sm-4">
  <div class="signup_form">
  <form method="post" action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

    <h2 class="text-center">SignUp Form</h2>

    <div class="mb-4">    
<div class="frm">


                  <input type="text" name="name" class="form-control" placeholder="User name" />
                  <span class="error email-error">
         
              <p class="error-text"> <?php echo $nameError;?> </p>
             
             
            </span> 
</div>          
</div>

               
<div class="mb-4">
            <input type="text" name="email" class="form-control" placeholder="Enter your email" />
         
            <span class="error email-error">
             
              <p class="error-text"> <?php echo $emailError;?> </p>
             
            </span>
            </div>
           
              
                <div class="mb-4">
            <input type="tel" name="phn" class="form-control" placeholder="Enter your phone number" />
         
            <span class="error email-error">
             
              <p class="error-text"> <?php echo $phnError;?></p>
            
            </span>
            </div>
           
       
    
          <div class="mb-4">
          <input type="password" name="pass" class="form-control" placeholder="Enter your password" />
          <span class="perror password-error">
            
            <p class="perror-text"> <?php echo $passError;?> </p>

          </span>
          </div>

         
       

        <div class="mb-4">
          <div class="cp1">
          <input type="password" name="cpass" class="form-control" placeholder="Confirm password" />
           <span class="error email-error">
          
            <p class="perror-text"> <?php echo $cPassError;?> </p>
           
          </span>
          </div>
        </div>
        
        
                
<br>
                <div class="button">
                  <input type="submit" name="submit" id="sub" value="Signup">
                </div>
<br>
                <p class="text-center">Have already an account? <a href="Signin.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

</form>
</div>

            </div>
            
            <div class="col-sm-4">
            </div>
           
</div>

</div>







<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" 
integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>


