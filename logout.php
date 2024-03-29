<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require 'jwt.php';
require 'vendor/autoload.php';
session_start();
$servername = "kp120977-001.eu.clouddb.ovh.net";
$username = "pwapoc";
$pswrd = "AAQWpFyDN85gL4d";
$db = "pwapoc";
try {
    $dsn = "mysql:host=$servername;port=35467;dbname=$db";    
    $pdo = new PDO($dsn, $username, $pswrd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$jwt = $_SESSION['jwt'];
$removejwt = "UPDATE users SET jwtToken = null WHERE jwtToken = '$jwt'";
if ($pdo->query($removejwt)) {
    header("Location: index.php");
    $conn->close();
    session_destroy();  
}

?>
!