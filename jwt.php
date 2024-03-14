<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require 'vendor/autoload.php';

$secret_key = "asdfjkhvozvz80";


function decodejwt($jwt, $secret_key){
    $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
    return $decoded;
}
?>
