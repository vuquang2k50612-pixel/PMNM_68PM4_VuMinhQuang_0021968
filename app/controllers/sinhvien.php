<?php
require_once __DIR__ . '/../models/SinhVienModel.php';
class Sinhvien{
    public function index() {
        $model = new SinhVienModel();
        $limit = 5; 
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        
        $offset = ($page - 1) * $limit;
        
        $dataSinhVien = $model->getPaging($limit, $offset);
        $totalRecords = $model->getTotal();
        $totalPages = ceil($totalRecords / $limit); 

        require_once __DIR__ . '/../views/sinhvien/index.php';
    }

    public function create(){
    require_once __DIR__.'/../views/sinhvien/create.php';
    }
     
    public function store(){
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $class = $_POST['class'] ?? '';
            $mssv = $_POST['mssv'] ?? '';

            $model = new SinhVienModel();
            $result = $model->create($name,$class,$mssv);

            if ($result) {
                header("Location: /PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien");
                exit();
            } else {
                echo "<h3>Thêm mới sinh viên thất bại!</h3>";
            }
    }
}

public function edit() {
        if (isset($_GET['id'])) {
            $mssv = $_GET['id'];
            $model = new SinhVienModel();
            $sv = $model->getById($mssv); // Lấy data cũ
            
            // Gọi View form sửa
            require_once __DIR__ . '/../views/sinhvien/edit.php';
        }
    }

    public function update_sv() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mssv = $_POST['mssv'] ?? ''; // MSSV thường không cho sửa, dùng làm khóa
            $name = $_POST['name'] ?? '';
            $class = $_POST['class'] ?? '';

            $model = new SinhVienModel();
            $result = $model->update($mssv, $name, $class);

            if ($result) {
                // Thành công thì đá về trang danh sách
                header("Location: /PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien");
                exit();
            } else {
                echo "<h3>Cập nhật thất bại!</h3>";
            }
        }
    }
    public function delete_sv() {
        if (isset($_GET['id'])) {
            $mssv = $_GET['id'];
            $model = new SinhVienModel();
            $model->delete($mssv);
        }
        // Xóa xong thì tự động tải lại trang danh sách
        header("Location: /PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien");
        exit();
    }
}

?>         