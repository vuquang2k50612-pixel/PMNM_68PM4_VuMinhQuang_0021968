<?php
class App {
    public function __construct() {
        $url = $_SERVER['REQUEST_URI'] ?? '';

        // Mở Form đăng nhập
        if (strpos($url, '/home/login') !== false) {
            require_once '../app/views/home/login.php';
        } 
        
        // Xử lý dữ liệu đăng nhập
        elseif (strpos($url, '/auth/login') !== false) {
            require_once '../app/controllers/auth.php';
            $authController = new auth();
            $authController->login();
        } 
        
        // THÊM MỚI - Xử lý chức năng Đăng xuất
        elseif (strpos($url, '/auth/logout') !== false) {
            require_once '../app/views/home/logout.php'; 
        }

        // Quản lý sinh viên
        elseif (strpos($url, '/sinhvien') !== false) {
            require_once '../app/controllers/sinhvien.php';
            $svController = new Sinhvien();
            
            if (strpos($url, '/sinhvien/create') !== false) {
                 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                     $svController->store();
                 } else {
                     $svController->create();
                 }
            } 
            elseif (strpos($url, '/sinhvien/edit') !== false) {
                 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                     $svController->update_sv();
                 } else {
                     $svController->edit();
                 }
            } 
            elseif (strpos($url, '/sinhvien/delete') !== false) {
                 $svController->delete_sv();
            }
            
            else {
                 $svController->index();
            }
        }

        // Trang chủ 
        else {
            require_once '../app/controllers/home.php';
        }
    }
}
?>