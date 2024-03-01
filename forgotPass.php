<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container-md">
    <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5 ">
                    <form method="post">
                    <div class="mb-3 align-items-center">
                        <h3>Przypomnij hasło</h3>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" maxlength="30" required></input>
                            <?php 
                            if(isset($_POST['w'])){
                                $email = $_POST["email"];
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    echo "<small><p class='text-danger'> Invalid e-mail format.</p></small>";
                                }
                            }
                            ?>
                         </div>

                        <div class="mb-3"><input class="btn btn-dark w-100" type="submit" name="w"></input> </div>
                        <?php
                            if(isset($_POST['w'])){
                                $email = $_POST["email"];
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                }
                                else{
                                    $token = bin2hex(random_bytes(24));

                                    $servername = "localhost";
                                    $username = "root";
                                    $pswrd = "";
                                    $db = "logindb";
                                    $conn = new mysqli($servername, $username, $pswrd, $db);
        
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }


                                    $emailcheck = "SELECT * from users where email = '$email'";
                                    $result = mysqli_query($conn, $emailcheck);
                                    $matchFound = mysqli_num_rows($result);
                                    if(!$matchFound)
                                    {
                                        echo "<small><p class='text-danger'>Taki email nie jest zarejestrowany.</p></small>";
                                    }
                                    else{

                                        $tokenupdate = "UPDATE users SET token = '$token' WHERE email = '$email'";
                                        if (mysqli_query($conn, $tokenupdate)) {
                                            
                                            $mail = new PHPMailer(true);
                                            try {
                                                //Server settings
                                                $mail->isSMTP(); // Set mailer to use SMTP
                                                $mail->Host = 'smtp.mailjet.com'; // Mailjet SMTP server
                                                $mail->SMTPAuth = true; // Enable SMTP authentication
                                                $mail->Username = '6d1c0c28754b29f0b585ce4293a997a6'; // Your Mailjet username
                                                $mail->Password = '56edebe0e8a2f9bc2c461a8f855d8858'; // Your Mailjet password
                                                $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                                                $mail->Port = 587; // TCP port to connect to
                                            
                                                //Recipients
                                                $mail->setFrom('burner.mailer.xd@gmail.com', 'Your Name');
                                                $mail->addAddress($email, 'Recipient Name'); // Add a recipient
                                            
                                                // Content
                                                $mail->isHTML(true); // Set email format to HTML
                                                $mail->Subject = 'Reset password';
                                                $mail->Body = 'Reset password: http://localhost/praktyki/phpWebApp/resetPass.php?token='.$token;
                                                $mail->AltBody = 'Reset password: http://localhost/praktyki/phpWebApp/resetPass.php?token='.$token;
                                            
                                                // Send the email
                                                $mail->send();
                                                echo "<h3 class='text-success'>Wysłano E-mail.<h3>";
                                            }
                                            catch (Exception $e) {
                                                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                            }

                                            $conn->close();
                                    }
                                }
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