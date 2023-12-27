<?php
require "../includes/conn.php";
session_start();

$email=$_POST['email'];
$email=mysqli_real_escape_string($con,$email);

$password=$_POST['password'];
$password=mysqli_real_escape_string($con,$password);
$password=md5($password);

$query="SELECT id,email,password from users where email='".$email."' and  password='".$password."'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num==0){
    $m = "Please enter valid E-mail id and Password";
    echo '<script>
    document.addEventListener("DOMContentLoaded", function() {
      alert("'.$m.'");
      window.location.href = "../login.php";
    });
    </script>';
}
else{
    $row = mysqli_fetch_array($result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['user_id'] = $row['id'];

    header('location: ../index.php');
}
