<?php
session_start();
$_SESSION['adminlogin']=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbconnect.php';
    // Process the form data
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    $exitsql="SELECT * FROM `admin` WHERE admin_email='$email'";
    $result = mysqli_query($conn, $exitsql);
    $numrow =mysqli_num_rows($result);
    // echo $numrow;
    if ($numrow==1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['admin_password']==$password){
            echo "yes";
            $_SESSION['adminlogin']=true;
            $_SESSION['adminloginemail']=$email;
            header("Location: /forrum/admin/first.php");
        }
        else {
            header("Location: /forrum/admin/index.php");
        }
    }

  }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            .login-bg{
                background-image: url(../img/back3.jpg);
                background-position: top;
                /* background-repeat: no-repeat; */
                background-size: cover;
            }

            .popupheader{
                background-color: #35363a;
                color: white;
            }

            .small a{
                color: white;
            }
        </style>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="login-bg">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header popupheader"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="inputEmail" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="inputPassword" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                                
                                                <button type="submit" class="btn btn-primary" >Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3 popupheader">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer" class="popupheader">
                <footer class="py-4 mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center small">
                            Copyright &copy; Your Website 2023
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
