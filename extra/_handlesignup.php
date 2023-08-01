<?php
// echo "jemis";
$showerror="false";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include '_dbconnect.php';

// echo "yes";


    $signupfname=$_POST['signupfname'];
    $signuplname=$_POST['signuplname'];
    $signupdateofbirth=$_POST['signupdateofbirth'];
    $signupdateofbirth1=date("d/m/Y", strtotime($signupdateofbirth));
    $signupgender=$_POST['signupgender'];
    $signupemail=$_POST['signupemail'];
    $signuppassword=$_POST['signuppassword'];
    $signupcpassword=$_POST['signupcpassword'];
    $signupquestion=$_POST['signupquestion'];
    $signupquesanswer=$_POST['signupquesanswer'];

//     echo $signupfname;
// echo $signuplname;
// echo $signupdateofbirth;
// echo $signupdateofbirth1;
// echo $signupgender;
// echo $signupemail;
// echo $signuppassword;
// echo $signupcpassword;

    $exitsql="SELECT * FROM `users` WHERE user_email='$signupemail'";
    $result = mysqli_query($conn, $exitsql);
    $row= mysqli_num_rows($result);
    // echo $row;
    if ($row>0){
        $showerror="This email is already in use";
        header("Location: /forrum/index1.php?useremail=false");
    }
    else {
        if ($signuppassword==$signupcpassword) {
            // $hash=password_hash($signuppassword, PASSWORD_DEFAULT);
            $signsql="INSERT INTO `users` (`user_fname`, `User_lname`, `user_date_of_birth`, `user_gender`, `user_email`, `user_password`, `user_forget_question`, `user_forget_answer`) VALUES ('$signupfname', '$signuplname', '$signupdateofbirth1', '$signupgender', '$signupemail', '$signuppassword', '$signupquestion', '$signupquesanswer')";
            $result = mysqli_query($conn, $signsql);
            if ($result) {
                
                $showalert="true";
                $showerror="success";
                header("Location: /forrum/index1.php?signupsuccess=true");
            }
            else {
                header("Location: /forrum/index1.php?signupsuccess1=false");
            }

        }
        else {
            $showerror="Password do not match";
            header("Location: /forrum/index1.php?signupsuccess=false");
        }
    }

    $showerror="false";
    // $signsql="INSERT INTO `users` (`user_name`, `user_email`, `password`, `cpassword`, `user_date`) VALUES ( 'jemis', 'lathiyajemis13@gmail.com', '1234', '1234', current_timestamp())";
    // $result = mysqli_query($conn, $signsql);

}


?>