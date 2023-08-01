<?php
$category_success=null;

include '_dbconnect.php';

// $error=$_GET['error'];
if (isset($cadid)) {
    $cadid=$_GET['$cadid'];
    $sql="DELETE FROM `categary` WHERE `categary_id`=$cadid";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $category_success=true;
    }else {
        $category_success=false;
    }
}
?>

<?php
session_start();
if ($_SESSION['adminlogin']==true) {
echo'
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .navbar a img {
            height: 42px;
            width: 88px;
            border-radius: 9px;
            margin: 2px 8px;
        }

        .edit{
            display: flex;
                flex-direction: row-reverse;
        }
    </style>
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand" href="/forrum/first.php">
            <img src="../img/logo3.png" alt=""> Codechat
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="_logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="first.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Others</div>
                        <a class="nav-link" href="users.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Users
                        </a>
                        <a class="nav-link" href="category.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Category
                        </a>
                        <a class="nav-link" href="feedback.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Feedback
                        </a>
                        <a class="nav-link" href="contact.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Contact
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin of codechat
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>';

                    
                       
                        $sql="SELECT * FROM `categary`";
                        $result = mysqli_query($conn, $sql);
                        $numhr= mysqli_num_rows($result);

                    echo'
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            User Table
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table">
                                <thead>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Category_title</th>
                                        <th>Category_description</th>
                                        <th>Category_image</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sr no.</th>
                                        <th>Category_title</th>
                                        <th>Category_description</th>
                                        <th>Category_image</th>
                                        <th>Delete</th>
                                    </tr>
                                </tfoot>

                                <tbody>';
                                  

                                    $categorycount=1;
                                    while ($row= mysqli_fetch_assoc($result)) {
                                        $category_id= $row['categary_id'];
                                        $category_title= $row['categary_title'];
                                        $category_description= $row['categary_desc'];
                                        $category_image= $row['categary_image'];

                                        

                                        echo'
                                        <tr>
                                        <td>'.$categorycount.'</td>
                                        <td>'.$category_title.'</td>
                                        <td>'.$category_description.'</td>
                                        <td><img src="../img/'.$category_image.'" alt="" width="60px" height="60px"></td>
                                        <td><div class="addcatbutton">
                                            <a type="button" href="category.php?$cadid='.$category_id.'" class="btn btn-primary my-2 my-sm-0 mr-sm-2 edit">
                                            Delete
                                            </a>
                                          </div></td>';
                                    

                                        $categorycount++;
                                    }
                
                                
                                echo'
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer edit">
                            <a class="btn btn-primary my-2 my-sm-0 mr-sm-2" href="add_category.php">Add categary</a>
                            
                        </div>

                    </div>
                </div>
            </main>
            <footer class="py-4 bg-dark mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div style="color: white;">Copyright &copy; Your Website 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>';

 
        if (isset($_GET['error']) && $_GET['error']=="noerror") {
            echo '
            <script>
            Swal.fire({
                title: "Success",
                text: "Your category added successfully",
                icon: "success",
                confirmButtonText: "OK"
            })
            </script>
            ';
        }
        elseif (isset($_GET['error']) && $_GET['error']=="unknown") {
            echo '
            <script>
            Swal.fire({
                title: "Oop!",
                text: "Some unkown error occured please try again.",
                icon: "error",
                confirmButtonText: "OK"
            })
            </script>
            ';
        }

        if ($category_success=="true") {
            echo '
                    <script>
                    Swal.fire({
                        title: "Success",
                        text: "Your category is deleted successfully",
                        icon: "success",
                        confirmButtonText: "OK"
                    })
                    </script>
                    ';
        }
        elseif ($category_success=="false") {
            echo '
            <script>
            Swal.fire({
                title: "Oop!",
                text: "Some unkown error occured please try again.",
                icon: "error",
                confirmButtonText: "OK"
            })
            </script>
            ';
        }

    echo'
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>';
}
else {
    header("Location: /forrum/admin/index.php");
}


?>