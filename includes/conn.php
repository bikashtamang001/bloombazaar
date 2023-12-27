<?php
$con=mysqli_connect("localhost","root","","plantshop");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
