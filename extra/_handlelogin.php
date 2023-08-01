<?php
session_start();
$_SESSION['login']=false;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include '_dbconnect.php';
    $loginemail=$_POST['loginemail'];
    $loginpassword=$_POST['loginpassword'];

    $exitsql="SELECT * FROM `users` WHERE user_email='$loginemail'";
    $result = mysqli_query($conn, $exitsql);
    $numrow =mysqli_num_rows($result);
    // echo $numrow;
    if ($numrow==1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['user_password']==$loginpassword){
            echo "yes";
            $_SESSION['login']=true;
            $_SESSION['loginemail']=$loginemail;
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['user_fname']=$row['user_fname'];
            $_SESSION['user_lname']=$row['user_lname'];
            // $_SESSION['user_sno']=$row['user_sno'];
            // echo $_SESSION['loginemail'];
            $_SESSION['user_date']=$row['user_date'];
            header("Location: /forrum/index1.php?loginsuccess=true");
        }
        else {
            header("Location: /forrum/index1.php?loginsuccess=false");
        }
    }


}
?>