<?php
session_start();

require 'db.php';
require 'functions.php';

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: index.php");
    exit;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <title>Welcome - <?php $_SESSION['username']?></title>
  </head>
  <body>
    <center>
    
    <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username']?></h4>
      <p>Hey how are you doing? You are logged in as <?php echo $_SESSION['username']?>.</p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout using this <a href="index.php">link.</a></p>
    </div>
  </div>
  <section>

    <div class="container">
      <strong class="title">My Profile</strong>
    </div>
    
    
    <div class="profile-box box-left">

      <?php

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }


        $query = "SELECT * FROM registration WHERE username = '".$_SESSION['username']."'";

        

        if($result = mysqli_query($conn, $query)) {

          $row = mysqli_fetch_assoc($result);

          echo "<div class='info'><strong>Fullname:</strong> <span>".$row['fullname']."</span></div>";
          echo "<div class='info'><strong>Username:</strong> <span>".$row['username']."</span></div>";
          echo "<div class='info'><strong>email:</strong> <span>".$row['email']."</span></div>";
          echo "<div class='info'><strong>Phone No.:</strong> <span>".$row['phonenumber']."</span></div>";
          echo "<div class='info'><strong>Gender:</strong> <span>".$row['gender']."</span></div>";

          echo "<div class='info'><strong>Date Joined:</strong> <span>".$row['dt']."</span></div>";

        } else {

          die("Error with the query in the database");

        }

      ?>
      
    </div>

  </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
  </center>
  </body>
</html>