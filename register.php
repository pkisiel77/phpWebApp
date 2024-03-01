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
                    <form method="post" class="row g-3">
                    <div class="mb-3 align-items-center">
                        <h3>Zarejsetruj się</h3>
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

                        <div class="mb-3">
                            <label for="login" class="form-label">Login</label>
                            <input type="text" class="form-control" id="login" name="login" maxlength="30" required></input>
                         </div>

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
                        <small><a class="text-primary" href="forgotpass.php">Przypomnij hasło</a></small>
                        <?php
                        if(isset($_POST['w'])){
                            $login = @$_POST['login'];
                            $password = @$_POST['password'];
                            $email = $_POST["email"];
                            $number = preg_match('@[0-9]@', $password);
                            $uppercase = preg_match('@[A-Z]@', $password);
                            $lowercase = preg_match('@[a-z]@', $password);
                            $specialChars = preg_match('@[^\w]@', $password);
                            
                            if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                            }
                            else{
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                

                            // $mail = new PHPMailer(true);
                            // try {
                            //     //Server settings
                            //     $mail->isSMTP(); // Set mailer to use SMTP
                            //     $mail->Host = 'smtp.mailjet.com'; // Mailjet SMTP server
                            //     $mail->SMTPAuth = true; // Enable SMTP authentication
                            //     $mail->Username = '6d1c0c28754b29f0b585ce4293a997a6'; // Your Mailjet username
                            //     $mail->Password = '56edebe0e8a2f9bc2c461a8f855d8858'; // Your Mailjet password
                            //     $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                            //     $mail->Port = 587; // TCP port to connect to
                            
                            //     //Recipients
                            //     $mail->setFrom('burner.mailer.xd@gmail.com', 'Your Name');
                            //     $mail->addAddress($email, 'Recipient Name'); // Add a recipient
                            //     $mail->addReplyTo('burner.mailer.xd@gmail.com', 'Your Name');
                            
                            //     // Content
                            //     $mail->isHTML(true); // Set email format to HTML
                            //     $mail->Subject = 'Test Email via PHPMailer';
                            //     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                            //     $mail->AltBody = 'This is the plain text version for non-HTML mail clients';
                            
                            //     // Send the email
                            //     $mail->send();
                            //     echo 'Message has been sent';
                            // } catch (Exception $e) {
                            //     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                            // }
                            
                            
                            
                            // $servername = "localhost";
                            // $username = "root";
                            // $pswrd = "";
                            // $db = "logindb";
                            // $conn = new mysqli($servername, $username, $pswrd, $db);

                            // if ($conn->connect_error) {
                            // die("Connection failed: " . $conn->connect_error);
                            // }
                            // $hash = password_hash($password, PASSWORD_DEFAULT);

                            // $registerDB = "INSERT INTO Users (email, login, passHash) VALUES ('$email', '$login', '$hash')";
                            // if (mysqli_query($conn, $registerDB)) {
                            //     echo "<h3 class='text-success'>Zarejestrowano!</h3>";
                            //     $conn->close();
                            // }
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