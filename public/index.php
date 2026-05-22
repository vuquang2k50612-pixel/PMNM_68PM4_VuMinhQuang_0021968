<?php
// Nhúng lớp bảo vệ và hệ thống lõi vào
require_once '../app/middleware.php';
require_once '../app/core/App.php';

// Khởi tạo bảo vệ và kiểm tra quyền
$middleware = new middleware();
$middleware->checklogin();

// Kích hoạt hệ thống
$app = new App();
?>