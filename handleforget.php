<?php 

include 'extra/_dbconnect.php';
$method=$_SERVER['REQUEST_METHOD'];                
    if ($method == 'POST'){
        $forgetquestion=$_POST['forgetquestion'];
        $forgetanswer=$_POST['forgetanswer'];
        $forgetemail=$_POST['forgetemail'];
        $sql3="SELECT * FROM `users` WHERE user_email='$forgetemail'";  
        $result3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $count = mysqli_num_rows($result3);
        session_start();
        $_SESSION['forgetemail']=$forgetemail;
        if ($count == 1) {
            $_SESSION['forgetemail']=$forgetemail;
            if (($row3['user_forget_question']==$forgetquestion) && ($row3['user_forget_answer']==$forgetanswer)) {
                // echo $_SESSION['forgetemail'];
                header("Location: /forrum/updatepassword.php");
            }
        }
                    
    }
?>