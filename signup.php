<!DOCTYPE html>
<?php
include 'db.php';
if (isset($_POST['submit'])){
  $fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $phno=mysqli_real_escape_string($conn,$_POST['phno']);
  $pass=mysqli_real_escape_string($conn,$_POST['pass']);
  $c_pass=mysqli_real_escape_string($conn,$_POST['c_pass']);
  $gender=mysqli_real_escape_string($conn,$_POST['gender']);

if(empty($fullname)){
  $error="Fullname is required";
}
elseif(strlen($fullname) <3 || strlen($fullname) >30){
  $error="Fullname must be between 3 to 30 characters";
}
elseif(empty($username)){
  $error="Username is required";
}
elseif(strlen($username) <3 || strlen($username) >30){
  $error="Username must be between 3 to 30 characters";
}
elseif(empty($email)){
  $error="Email is required";
}
elseif(empty($phno)){
  $error="Phonenumber is required";
}
elseif(empty($pass)){
  $error="Password is required";
}
elseif($pass != $c_pass){
  $error="Password does not match";
}
elseif(strlen($pass) <6){
  $error="Password must be atleast 6 characters";
}
else{
  $check="SELECT * FROM registration WHERE email='$email' || username='$username' ";
  $data=mysqli_query($conn,$check);
  $result=mysqli_fetch_array($data);
  if ($result >0){
    $error="Email or username alredy exist";
  }
  else{
    $password=md5($pass);
    $sql = "INSERT INTO registration (`fullname`, `username`, `email`, `phonenumber`, `password`, `gender`,`dt`)
     VALUES ('$fullname','$username','$email','$phno','$password','$gender',current_timestamp())";
     $q=mysqli_query($conn,$sql);
     if ($q){
      echo ("<script LANGUAGE='JavaScript'>
    window.alert('Registration Successful');
    window.location.href='index.php';
    </script>");
     }
  }
}
}
?>
<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/signstyle.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <nav>
      <div class="logo">GYM MANANEMENT</div>
      <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="#">News</a></li>
         <li><a href="index.php">Login/Sign-Up</a></li>
         <li><a href="#">About</a></li>
         <li><a href="#">Contact</a></li>
      </ul>
   </nav>
  <div class="container">
    <div class="title">Registration Form</div>
    <p style="color: red">
          <?php
          if(isset($error)){
            echo $error;
          }
          ?>
        </p>
        <p style="color: green">
          <?php
          if(isset($success)){
            echo $success;
          }
          ?>
        </p>
    <div class="content">
      <form method="post" action=""> 
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" id="fullname" name="fullname" value="<?php
            if(isset($error)){
              echo $fullname;
            }
            ?>">
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" id="username" name="username" value="<?php
            if(isset($error)){
              echo $username;
            }
            ?>">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" id="email" name="email" value="<?php
            if(isset($error)){
              echo $email;
            }
            ?>">
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" id="phonenumber" name="phno" value="<?php
            if(isset($error)){
              echo $phno;
            }
            ?>">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" id="password" name="pass" >
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" id="cpassword" name="c_pass" >
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="m">
          <input type="radio" name="gender" id="dot-1" value="f">
          <input type="radio" name="gender" id="dot-1" value="o">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Other</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
