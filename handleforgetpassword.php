<?php 

        include 'extra/_dbconnect.php';
        session_start();
        // echo $_SESSION['forgetemail'];
        $method=$_SERVER['REQUEST_METHOD'];                
            if (($method == 'POST') && isset($_POST['submit'])){
                echo $_POST['forgetpassword'];
                $forgetpassword=$_POST['forgetpassword'];
                $forgetcpassword=$_POST['forgetcpassword'];
                $forgetemail=$_SESSION['forgetemail'];
                if ($forgetpassword == $forgetcpassword) {
                    $sql3="UPDATE `users` SET `user_password`='$forgetpassword' WHERE `user_email`='$forgetemail'";  
                    $result3 = mysqli_query($conn, $sql3);
                    if ($result3) {
                        echo "yes";
                        header("Location: /forrum/index1.php?forgetpassword=true");
                    }  
                }
                else {
                    header("Location: /forrum/updatepassword.php?forgetpassword=false");
                }
                // $row3 = mysqli_fetch_assoc($result3);
                // $count = mysqli_num_rows($result3);

                // if ($count == 1) {
                //     if (($row3['user_forget_question']==$forgetquestion) && ($row3['user_forget_answer']==$forgetanswer)) {
                //         header("Location: /forrum/updatepassword.php");
                //     }
                // }
                            
            }
    ?>