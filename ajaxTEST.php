<?php
session_start();

if(isset($_POST['data'])) {
    $inputData = $_POST['data'];
    if(strlen($inputData) >= 3){
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
        exit();
    }  
    $current_page = $_SESSION['page'];
    if ($current_page > 1) {
        $offset = ($current_page - 1) * 3;
    } else {
        $offset = 0;
    }
    $param = "$inputData%";
    // Prepare the SQL statement with a parameterized query
    $sql = "SELECT login, user_roles.roleID, email, roleName, status, users.userID FROM users JOIN user_roles ON users.userID=user_roles.userID JOIN roles ON roles.roleID=user_roles.roleID WHERE login LIKE :param OR email like :param or roleName like :param or status like :param LIMIT 3 OFFSET :offset";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':param', $param);    // Bind parameters
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);    // Bind parameters

 
    // Execute the statement
    $stmt->execute();


    // Fetch results
    $returnData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Output JSON encoded data
    echo json_encode($returnData);
}
}

?>