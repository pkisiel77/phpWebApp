<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require 'vendor/autoload.php';

$secret_key = "asdfjkhvozvz80";

function authenticateToken() {
    $token = $_SERVER['HTTP_AUTHORIZATION'] ?? null;
    if (!$token) {
        // Token not found, redirect or handle unauthorized access
        header('Location: login.php');
        exit;
    }
}

function decodejwt($jwt, $secret_key){
    $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
    return $decoded;
}
?>
