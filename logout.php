<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require 'jwt.php';
require 'vendor/autoload.php';
session_start();
$servername = "localhost";
$username = "root";
$pswrd = "";
$db = "logindb";
$conn = new mysqli($servername, $username, $pswrd, $db);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$jwt = $_SESSION['jwt'];
$removejwt = "UPDATE Users SET jwtToken = null WHERE jwtToken = '$jwt'";
if (mysqli_query($conn, $removejwt)) {
    header("Location: MainPage.php");
    $conn->close();
    session_destroy();  
}

?>
