<?php
    session_start();
    // echo "Your logout is done successfully please login for best exprience"; 
    session_destroy();
    header("Location: /forrum/index1.php?logoutsuccess=true");
    session_start();
    $_SESSION['login']=false;
    
?>