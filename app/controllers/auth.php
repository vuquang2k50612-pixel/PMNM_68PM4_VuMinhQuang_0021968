<?php
class auth {
    public function login() {
        $user = [
            "quangvu" => "123456",
            "admin" => "123456"
        ];  
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $username = $_POST["username"] ?? '';
            $password = $_POST["password"] ?? '';

            if (isset($user[$username]) && $user[$username] == $password) {
                $_SESSION['username'] = $username;
                if (isset($_POST['remember']) && $_POST['remember'] == true) {
                    setcookie('username', $username, time() + 3600, "/");
                }
                header("Location: /PMNM_68PM4_VuMinhQuang_0021968/public/");
                exit();
            } else { 
                header("Location: /PMNM_68PM4_VuMinhQuang_0021968/public/auth/login?error=1");
                exit();
            }
        }

        
        require_once __DIR__ . '/../views/home/login.php';
    }
}
?>