<?php
session_start();
$servername = "kp120977-001.eu.clouddb.ovh.net";
$username = "pwapoc";
$pswrd = "AAQWpFyDN85gL4d";
$db = "pwapoc";
// $conn = new mysqli($servername, $username, $pswrd, $db, '35467');
try {
    $dsn = "mysql:host=$servername;port=35467;dbname=$db";    
    $pdo = new PDO($dsn, $username, $pswrd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    if(isset($_POST['w'])){
    
    $rowlogin = $_POST['lgn']; 
    $logincheck = "SELECT * from users where login = '$rowlogin'";
    $resultlog = $pdo->query($logincheck);
    $fetchinfo = $resultlog->fetch(PDO::FETCH_ASSOC);
    $status = $fetchinfo['status'];

    // Toggle the value of is_active
    $new_value = $status == 1 ? 0 : 1;
    
    $update_sql = "UPDATE users SET status = :new_value WHERE login = :rowlogin";
    $stmt = $pdo->prepare($update_sql);
    $stmt->bindParam(':new_value', $new_value);
    $stmt->bindParam(':rowlogin', $rowlogin);
    $stmt->execute();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>

    <link href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" rel="stylesheet">
    
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <style>
        .paginate_button {
            margin-right: 5px; /* Adjust the spacing as needed */
        }
    </style>

</head>
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

<div class='sidebar-heading'>
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



<!-- End of Sidebar -->


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
                        <a class="dropdown-item" href="logout.php">
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
            <div class="col-md-10">
                <div class="card px-5 py-5">
                 <div class="mb-3"> 
                 <?php
                 $servername = "kp120977-001.eu.clouddb.ovh.net";
                 $username = "pwapoc";
                 $pswrd = "AAQWpFyDN85gL4d";
                 $db = "pwapoc";
                 // $conn = new mysqli($servername, $username, $pswrd, $db, '35467');
                 try {
                     $dsn = "mysql:host=$servername;port=35467;dbname=$db";    
                     $pdo = new PDO($dsn, $username, $pswrd);
                     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 } catch(PDOException $e) {
                     echo "Connection failed: " . $e->getMessage();
                 }
                    $current_page = @$_GET['page'];
                    if ($current_page > 1) {
                        $offset = ($current_page - 1) * 3;
                    } else {
                        $offset = 0;
                    }
                    $searchValue = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

                    // Construct the WHERE clause for searching
                    $whereClause = "";
                    if (!empty($searchValue)) {
                        $whereClause = "WHERE login LIKE '%$searchValue%' OR email LIKE '%$searchValue%' OR roleID LIKE '%$searchValue%' OR status LIKE '%$searchValue%'";
}
                    $sql = "SELECT * FROM users join user_roles on users.userID=user_roles.userID $whereClause limit 3 OFFSET $offset";
                    $result = $pdo->query($sql);
                    if (!$result) {
                        die('Error in SQL query: ' . mysqli_error($conn));
                    }
                    $data = array();
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $data[] = $row;
                        }
                    }
                    $totalRecordsQuery = "SELECT COUNT(*) AS count FROM users";
$totalRecordsStmt = $pdo->query($totalRecordsQuery);
$totalRecords = $totalRecordsStmt->fetch(PDO::FETCH_ASSOC)['count'];

// Calculate total pages
$_SESSION['totalPages'] = ceil($totalRecords / 3);

                    ?>
                    
<table id="tabledata" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Login</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Change</th>
        </tr>
    </thead>
    <tbody>
        
        <?php foreach($data as $row): ?>
            <tr>
                <td><?php echo $row['login']; ?></td> 
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['roleID']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                <button type="button" name="wh" class="btn btn-primary change-button" data-toggle="modal" data-target="<?php echo "#modal".$row['userID']?>">Change</button>
                </td>
            </tr>
            
            <div class="modal fade" id="<?php echo "modal".$row['userID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                    <div class="mb-3 align-items-center">
                    <form method="post" id="<?php echo "myForm".$row['userID']?>" class="row g-3">
                    <?php
               

                    echo"
                        <div class='mb-3'>
                        <label for='email' class='form-label'>E-mail</label>
                        <input type='email' class='form-control' id='email' name='email".$row['userID']."' maxlength='30'  value='".$row['email']."' required></input>";
                        
                        if(isset($_POST['ws'])){
                            $email = $_POST['email'.$row['userID']];
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo"<small><p class='text-danger'> Invalid e-mail format.</p></small>";
                            }
                        }
                       echo"
                     </div>

                    <div class='mb-3'>
                        <label for='login' class='form-label'>Login</label>
                        <input type='text' class='form-control' id='login' name='login".$row['userID']."' maxlength='30' value='".$row['login']."' required></input>
                     </div>

                    <div class='mb-3'>
                        <label for='role' class='form-label'>Role</label>
                        <input type='number' min='0' class='form-control' id='role' name='role".$row['userID']."' maxlength='1' value='".$row['roleID']."' required></input>
                     </div>

                     <div class='mb-3'>
                     <label for='status' class='form-label'>Status</label>
                     <input type='number' max='1' min='0' class='form-control' id='status' name='status".$row['userID']."' maxlength='1' value='".$row['status']."' required></input>
                  </div>
                    </div>";
                        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <input type="hidden" name="lgn" value="<?php echo $row['userID']; ?>">
        <button type="submit" form="<?php echo "myForm".$row['userID']?>" class="btn btn-primary" value="Save Changes" name="ws">Save Changes</button>
        
      </div>
    </div>
  </div>
</div>
</form>         

        <?php endforeach; ?>
    </tbody>
</table>
<?php
echo "Pages: ";
for ($i = 1; $i <= $_SESSION['totalPages']; $i++) {
    echo "<a href='?page=$i'>$i</a> ";
}

?>

                 </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
        <!-- /.container-fluid -->


<?php
$servername = "kp120977-001.eu.clouddb.ovh.net";
$username = "pwapoc";
$pswrd = "AAQWpFyDN85gL4d";
$db = "pwapoc";
// $conn = new mysqli($servername, $username, $pswrd, $db, '35467');
try {
    $dsn = "mysql:host=$servername;port=35467;dbname=$db";    
    $pdo = new PDO($dsn, $username, $pswrd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    if(isset($_POST['ws'])){
    $ID = $_POST['lgn']; 
    $newlogin = $_POST['login'.$ID];
    $newemail = $_POST['email'.$ID];
    $newrole = $_POST['role'.$ID];
    $newstatus = $_POST['status'.$ID];
    $update_sql = "UPDATE users JOIN user_roles ON users.userID = user_roles.userID SET users.login = :newlogin, users.email = :newemail, users.status = :newstatus, user_roles.roleID = :newrole WHERE users.userID = :ID";
    $stmt = $pdo->prepare($update_sql);
    $stmt->bindParam(':newlogin', $newlogin);
    $stmt->bindParam(':newemail', $newemail);
    $stmt->bindParam(':newstatus', $newstatus);
    $stmt->bindParam(':newrole', $newrole);
    $stmt->bindParam(':ID', $ID);
    $stmt->execute();
    echo"<script>window.location.href = '".$_SERVER['PHP_SELF']."'</script>";
    }
?>



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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#tabledata').DataTable({
        paging: true, // Enable paging
        pageLength: 3,
        lengthChange: false,
        "language": {
            "paginate": {
                "previous": "<i class='fas fa-angle-double-left' id='previous'></i>",
                "next": "<i class='fas fa-angle-double-right' id='next'></i>"
            }
        }
    });

    // Function to update URL with current page
    function updateURLWithPage() {
        var currentPage = table.page();
        var currentURL = window.location.href;

        // Check if the URL already contains ?page=
        if (currentURL.indexOf('?page=') === -1) {
            // Append the current page as a query parameter
            currentURL += (currentURL.indexOf('?') !== -1 ? '&' : '?') + 'page=' + currentPage;
        } else {
            // Update the value of page parameter
            currentURL = currentURL.replace(/(page=)[^\&]+/, '$1' + currentPage);
        }

        // Redirect to the updated URL
        window.history.replaceState({}, document.title, currentURL);
    }

    // Initial update
    updateURLWithPage();

    // Listen for the draw event on the DataTable
    table.on('draw.dt', function() {
        updateURLWithPage();
    });
        // Update URL when next button is clicked
        $('#next').on('click', function () {
        table.page('next').draw(false);
    });

    // Update URL when previous button is clicked
    $('#previous').on('click', function () {
        table.page('previous').draw(false);
    });
});
</script>
</body>