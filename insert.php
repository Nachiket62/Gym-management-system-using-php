<?php
$showAlert = false;
$showError = false;
include_once 'db.php';
   
     $fullname = $_POST['subscribe_fullname'];
     $username = $_POST['subscribe_username'];
     $email = $_POST['subscribe_email'];
     $phonenumber = $_POST['subscribe_phonenumber'];
     $password = $_POST['subscribe_password'];
     $cpassword = $_POST['subscribe_cpassword'];
     $gender = $_POST['subscribe_gender'];

     $sql = "INSERT INTO registration (`fullname`, `username`, `email`, `phonenumber`, `password`, `gender`,`dt`)
     VALUES ('$fullname','$username','$email','$phonenumber','$password','$gender',current_timestamp())";
     if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Registration Successful")</script>';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);

?>