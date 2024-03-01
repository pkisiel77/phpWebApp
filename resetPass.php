<?php
    $token = @$_GET['token'];

    $servername = "localhost";
    $username = "root";
    $pswrd = "";
    $db = "logindb";
    $conn = new mysqli($servername, $username, $pswrd, $db);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $tokencheck = "SELECT * from users where token = '$token'";
    $result = mysqli_query($conn, $tokencheck);
    $matchFound = mysqli_num_rows($result);
    if(!$matchFound)
    {
        header("Location: forgotPass.php");
        $conn->close();
    }
    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"
</head>
<body>

<div class="container-md">
    <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5 ">
                    <form method="post">
                    <div class="mb-3 align-items-center">
                        <h3>Zresetuj hasło</h3>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" maxlength="30" required></input> 
                            <?php
                            if(isset($_POST['w'])){

                                $password = @$_POST['password'];;
                                $number = preg_match('@[0-9]@', $password);
                                $uppercase = preg_match('@[A-Z]@', $password);
                                $lowercase = preg_match('@[a-z]@', $password);
                                $specialChars = preg_match('@[^\w]@', $password);
                                
                                if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                                echo "<small><p class='text-danger'> Password must be at least 8 characters, have uppercase and lowercase letters, a number and a special symbol.</p></small>";
                                }                                
                            }
                        ?>
                        </div>

                        <div class="mb-3"><input class="btn btn-dark w-100" type="submit" name="w"></input> </div>
                        <?php
                            if(isset($_POST['w'])){
                                $password = @$_POST['password'];;
                                $number = preg_match('@[0-9]@', $password);
                                $uppercase = preg_match('@[A-Z]@', $password);
                                $lowercase = preg_match('@[a-z]@', $password);
                                $specialChars = preg_match('@[^\w]@', $password);
                                
                                if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                                echo "<small><p class='text-danger'> Password must be at least 8 characters, have uppercase and lowercase letters, a number and a special symbol.</p></small>";
                                }   
                                else{
                                    echo "<h3 class='text-success'>Zresetowano!</h3><small><a class='text-primary' href='MainPage.php'>Powrót</a></small>";
                                }  
                            }
                        ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>