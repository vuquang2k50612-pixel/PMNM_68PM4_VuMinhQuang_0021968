<?php
class App {
    public function __construct() {
        $url = $_SERVER['REQUEST_URI'] ?? '';

        // Luồng 1: Mở Form đăng nhập
        if (strpos($url, '/home/login') !== false) {
            require_once '../app/views/home/login.php';
        } 
        
        // Luồng 2: Xử lý dữ liệu đăng nhập
        elseif (strpos($url, '/auth/login') !== false) {
            require_once '../app/controllers/auth.php';
            $authController = new auth();
            $authController->login();
        } 
        
        // Luồng 3: THÊM MỚI - Xử lý chức năng Đăng xuất
        elseif (strpos($url, '/auth/logout') !== false) {
            // Lôi cái file chứa code hủy session của sếp ra chạy
            require_once '../app/views/home/logout.php'; 
        }

        // Luồng 4: Trang chủ
        else {
            require_once '../app/controllers/home.php';
        }
    }
}
?>