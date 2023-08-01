<?php
echo "yes";
session_start();
echo $_SESSION['comment_id'];
$comment_id=$_SESSION['comment_id'];
include 'extra/_dbconnect.php';
                
                $method=$_SERVER['REQUEST_METHOD'];                
                if ($method == 'POST'){
                    $comment_opinion=$_POST['opinion'];
                    date_default_timezone_set("Asia/Kolkata");
                    $comment_update_time= date("h:i:s A");
                    $comment_update_date = date("jS \of F Y");
                    $comment_user_id=$_SESSION['user_id'];
                    $sql1="SELECT * FROM `comments` WHERE `comment_id`=$comment_id";
                    $result1 = mysqli_query($conn, $sql1); 
                    $row1 = mysqli_fetch_assoc($result1); 
                    $comment_update_repetation=$row1['comment_update_repetation'];
                    $comment_update_repetation=$comment_update_repetation+1;             
                    $sql="UPDATE `comments` SET `comment_opinion`='$comment_opinion', `comment_update_date`='$comment_update_date',`comment_update_time`='$comment_update_time',`comment_update_repetation`='$comment_update_repetation' WHERE `comment_id`=$comment_id";
                    $result = mysqli_query($conn, $sql);
                    $showalrt=true;
                    if ($showalrt) {
                        header("Location: /forrum/index1.php?commentsuccess=true");
                    }
                }


?>