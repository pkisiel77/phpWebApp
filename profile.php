<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require 'jwt.php';
require 'vendor/autoload.php';
session_start();
    $jwt = $_SESSION['jwt'];
    $servername = "localhost";
    $username = "root";
    $pswrd = "";
    $db = "logindb";
    $conn = new mysqli($servername, $username, $pswrd, $db);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $tokencheck = "SELECT * from users where jwtToken = '$jwt'";
    $result = mysqli_query($conn, $tokencheck);
    $matchFound = mysqli_num_rows($result);
    if(!$matchFound)
    {
        header("Location: MainPage.php");
        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<body>

<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="test.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <?php
$jwt = $_SESSION['jwt'];
$decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
if($decoded->admin){
    echo "<div class='sidebar-heading'>
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class='nav-item'>
        <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseTwo'
            aria-expanded='true' aria-controls='collapseTwo'>
            <i class='fas fa-fw fa-cog'></i>
            <span>Components</span>
        </a>
        <div id='collapseTwo' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
            <div class='bg-white py-2 collapse-inner rounded'>
                <h6 class='collapse-header'>Custom Components:</h6>
                <a class='collapse-item' href='buttons.html'>Buttons</a>
                <a class='collapse-item' href='cards.html'>Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class='nav-item'>
        <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities'
            aria-expanded='true' aria-controls='collapseUtilities'>
            <i class='fas fa-fw fa-wrench'></i>
            <span>Utilities</span>
        </a>
        <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities'
            data-parent='#accordionSidebar'>
            <div class='bg-white py-2 collapse-inner rounded'>
                <h6 class='collapse-header'>Custom Utilities:</h6>
                <a class='collapse-item' href='utilities-color.html'>Colors</a>
                <a class='collapse-item' href='utilities-border.html'>Borders</a>
                <a class='collapse-item' href='utilities-animation.html'>Animations</a>
                <a class='collapse-item' href='utilities-other.html'>Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class='sidebar-divider'>

    <!-- Heading -->
    <div class='sidebar-heading'>
        Addons
    </div>


    <!-- Nav Item - Charts -->
    <li class='nav-item'>
        <a class='nav-link' href='charts.html'>
            <i class='fas fa-fw fa-chart-area'></i>
            <span>Charts</span></a>
    </li>
    <li class='nav-item'>
    <a class='nav-link' href='tables.php'>
        <i class='fas fa-fw fa-table'></i>
        <span>Tables</span></a>
    </li>


<!-- End of Sidebar -->";
}
?>
    <!-- Nav Item - logout -->
    <li class='nav-item'>
        <a class='nav-link' href='logout.php'>
            <i class='bi bi-box-arrow-left'></i>
            <span>Logout</span></a>
    </li>
        <!-- Divider -->
        <hr class='sidebar-divider d-none d-md-block'>

<!-- Sidebar Toggler (Sidebar) -->
    <div class='text-center d-none d-md-inline'>
        <button class='rounded-circle border-0' id='sidebarToggle'></button>
    </div>
</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">3+</span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-primary">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 12, 2019</div>
                                <span class="font-weight-bold">A new monthly report is ready to download!</span>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-success">
                                    <i class="fas fa-donate text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 7, 2019</div>
                                $290.29 has been deposited into your account!
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">December 2, 2019</div>
                                Spending Alert: We've noticed unusually high spending for your account.
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                </li>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-envelope fa-fw"></i>
                        <!-- Counter - Messages -->
                        <span class="badge badge-danger badge-counter">7</span>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">
                            Message Center
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                    alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="font-weight-bold">
                                <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                    problem I've been having.</div>
                                <div class="small text-gray-500">Emily Fowler · 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                    alt="...">
                                <div class="status-indicator"></div>
                            </div>
                            <div>
                                <div class="text-truncate">I have the photos that you ordered last month, how
                                    would you like them sent to you?</div>
                                <div class="small text-gray-500">Jae Chun · 1d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                    alt="...">
                                <div class="status-indicator bg-warning"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Last month's report looks great, I am very happy with
                                    the progress so far, keep up the good work!</div>
                                <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="dropdown-list-image mr-3">
                                <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                    alt="...">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div>
                                <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                    told me that people say this to all dogs, even if they aren't good...</div>
                                <div class="small text-gray-500">Chicken the Dog · 2w</div>
                            </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                        <img class="img-profile rounded-circle"
                            src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="profile.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

            </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="container-md">
    <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5">
                <div class="mb-3">
                <?php
                $servername = "localhost";
                $username = "root";
                $pswrd = "";
                $db = "logindb";
                $conn = new mysqli($servername, $username, $pswrd, $db);
            
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                $jwt = $_SESSION['jwt'];
                $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
                $login = $decoded->username;
                    if(isset($_POST['w'])){
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["uploaded_file"])) {
                            // Check if file upload was successful
                            if ($_FILES["uploaded_file"]["error"] == UPLOAD_ERR_OK) {
                                // Get the temporary file path
                                $tempFilePath = $_FILES["uploaded_file"]["tmp_name"];
                                $maxFileSize = 10 * 1024 * 1024; //10mb size
                                // Check if the file is not empty
                                if (filesize($tempFilePath) > 0 && filesize($tempFilePath) < $maxFileSize) {
                                    // Read file contents
                                    $fileContents = file_get_contents($tempFilePath);
                        
                                    // Process the file contents as needed
                                    // For example, insert into database or perform other operations
                        
                                    
                                    try {
                                        $pdo = new PDO("mysql:host=localhost;dbname=logindb;charset=utf8", "root", "");
                                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    } catch (PDOException $e) {
                                        if ($e->getCode() == 2006) { // MySQL server has gone away
                                            // Reconnect to the MySQL server
                                            // Replace the following lines with your database connection code
                                            $pdo = new PDO($dsn, $username, $password);
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute($params);
                                        } else {
                                            throw $e; // Re-throw other PDO exceptions
                                        }
                                    }
                

                                    $addavatar = "UPDATE users SET avatar = :avatar WHERE login = :login";
                                    $stmt = $pdo->prepare($addavatar);
                                    $stmt->bindParam(':login', $login);
                                    $stmt->bindParam(':avatar', $fileContents);
                                    if ($stmt->execute()) {
                                    }
                                }
                                } else {
                                    echo "Error: Uploaded file is empty or too big.";
                                }
                            } else {
                                echo "Error uploading file: " . $_FILES["uploaded_file"]["error"];
                            }
                        }
                
                $avatarcheck = "SELECT avatar from users where login = '$login'";
                $avatarresult = mysqli_query($conn, $avatarcheck);
                $avatar = @mysqli_fetch_assoc($avatarresult);
                if ($avatar && $avatar['avatar'] !== null) {
                    // 'avatar' column is not null, handle the result
                    // For example, display the avatar
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($avatar['avatar']) . '" alt="Avatar">';
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <input type="file" name="uploaded_file" accept="image/*">
                    <input class="btn btn-dark w-10" type="submit" name="w">   
                </form>    
                </div>
                 <div class="mb-3"> 
                    <?php
                    $jwt = $_SESSION['jwt'];
                    $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));
                    echo "<h5>Username - ".$decoded->username."</h5>
                    <h5>E-mail - ".$decoded->email."</h5>";
                    ?>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <!-- End of Footer -->

    
</div>
<!-- End of Content Wrapper -->

</div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
