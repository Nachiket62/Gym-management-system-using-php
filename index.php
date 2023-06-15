<?php
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'db.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from registration where username='$username' AND password='$password'";
    
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){

                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: welcome.php");
            } 
            else{
                echo '<script>alert("Invalid Credintals")</script>';
            }
        }
        
    
?>

<!DOCTYPE html>
<html>
<head>
<title>GYM Management System</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/slider.css">
</head>
<body>
   <nav>
      <div class="logo">GYM MANANEMENT</div>
      <ul>
         <li><a href="index.php">Home</a></li>
         <li><a href="packages.php">News</a></li>
         <li><a href="index.php">Login/Sign-Up</a></li>
         <li><a href="aboutus.php">About</a></li>
         <li><a href="contactus.php">Contact</a></li>
      </ul>
   </nav>
   <section></section>
   <form action="index.php" class="box" method="post"> 
      <h1>Member login</h1>
      <input type="text" name="username" placeholder="Username" class="text-input">
      <input type="password" name="password" placeholder="Password" class="text-input">
      <input type="submit" name="" value="Login">
      <h2>or</h2>
      <a href="signup.php"><input type="button" name="" value="Sign-Up"></a>
   </form> 
   <div id="slider">
      <ul id="slideWrap"> 
         <li><img src="images/img2.jpg" alt=""></li>
         <li><img src="images/img3.jpg" alt=""></li>
         <li><img src="images/img4.jpg" alt=""></li>
         <li><img src="images/img5.jpg" alt=""></li>
         <li><img src="images/img6.jpg" alt=""></li>
      </ul>
      <a id="prev" href="#">&#8810;</a>
      <a id="next" href="#">&#8811;</a>
   </div> 
   <script src="js/sliderjs.js"></script>
</body>
</html>