<?php
session_start();

class middleware {
    function checklogin() {
        // Lấy đường dẫn URL hiện tại người dùng đang truy cập
        $current_url = $_SERVER['REQUEST_URI'] ?? '';

        // Nếu chưa có Session VÀ đường dẫn KHÔNG chứa chữ 'login' thì mới đá về trang login
        if (!isset($_SESSION['username']) && strpos($current_url, 'login') === false) {
           header('Location: /PMNM_68PM4_VUMINHQUANG_0021968/public/home/login');
            exit();
        }
    }
}
?>