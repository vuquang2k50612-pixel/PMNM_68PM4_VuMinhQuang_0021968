<?php
    session_start();
    session_destroy();
    if(isset($_COOKIE['username'])){
        setcookie($_COOKIE['username'],'',time()-3600);
    }
    header("Location: /home/login");
    exit();
    ?>