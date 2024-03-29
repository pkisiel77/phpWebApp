<?php

require 'jwt.php';
require 'vendor/autoload.php';
session_start();
$servername = getenv('DB_SERVERNAME');
$username = getenv('DB_USERNAME');
$passwd = getenv('DB_PASSWORD');
$db = getenv('DB_NAME');
$port = getenv('DB_PORT');

function createDbConnection($servername, $port, $db, $username, $passwd) {
    try {
        $dsn = "mysql:host=$servername;port=$port;dbname=$db";
        $pdo = new PDO($dsn, $username, $passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        error_log("Connection failed: " . $e->getMessage());
        return null;
    }
}

$pdo = createDbConnection($servername, $port, $db, $username, $passwd);

if(!$pdo) {
    session_destroy();
    die();
}

$jwt = $_SESSION['jwt'];
// TODO: "UPDATE users SET jwtToken = :jwt WHERE login = :login";
$removeJwtQuery = "UPDATE users SET jwtToken = null WHERE jwtToken = :jwtToken";
$statement = $pdo->prepare($removeJwtQuery);
$statement->bindParam(':jwtToken', $jwt);
if ($statement->execute()) {
    header("Location: index.php");
}
session_destroy();
