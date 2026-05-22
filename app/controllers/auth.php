<?php
session_start();
$user = [
    "quangvu"=>"123456",
    "admin"=>"123456"
];
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(isset($user[$username])&& $user[$username]===$password){
        $_SESSION['username']=$username;
        if($_POST['remember']==true){
            setcookie('username',$username,time()+3600);
        }
        header("Location: /");
        exit();
    }
    else{
        header("Location: /home/login?error=1");
        exit();
    }
}