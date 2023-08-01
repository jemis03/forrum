<?php
    session_start();
    // echo "Your logout is done successfully please login for best exprience"; 
    session_destroy();
    header("Location: /forrum/admin");
    session_start();
    $_SESSION['adminlogin']=false;
    
?>