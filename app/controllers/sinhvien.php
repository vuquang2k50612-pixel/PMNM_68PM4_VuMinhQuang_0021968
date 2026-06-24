<?php
require_once __DIR__ . '/../models/SinhVienModel.php';
class Sinhvien{
   public function index() {
        require_once __DIR__ . '/../models/LopHocModel.php';
        $lopModel = new LopHocModel();
        $dataLopHoc = $lopModel->getAll(); 
        $search = $_GET['search'] ?? '';
        $malop = $_GET['malop'] ?? '';
        
        $limit = 5; 
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * $limit;
        
        $model = new SinhVienModel();
        $totalRecords = $model->getTotal($search, $malop);
        $totalPages = ceil($totalRecords / $limit); 
        $dataSinhVien = $model->getPaging($limit, $offset, $search, $malop);

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
            $malop = $_POST['malop'] ?? '';

            $model = new SinhVienModel();
           $result = $model->create($name, $class, $mssv, $malop);

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
            $sv = $model->getById($mssv); 
            
            
            require_once __DIR__ . '/../views/sinhvien/edit.php';
        }
    }

    public function update_sv() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mssv = $_POST['mssv'] ?? ''; 
            $name = $_POST['name'] ?? '';
            $class = $_POST['class'] ?? '';
            $malop = $_POST['malop'] ?? '';

            $model = new SinhVienModel();
           $result = $model->update($mssv, $name, $class, $malop);

            if ($result) {
            
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
        header("Location: /PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien");
        exit();
    }
}
public function create(){
        require_once __DIR__ . '/../models/LopHocModel.php';
        $lopModel = new LopHocModel();
        $dataLopHoc = $lopModel->getAll();
        
        require_once __DIR__.'/../views/sinhvien/create.php';
    }
     
    public function store(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $class = $_POST['class'] ?? '';
            $mssv = $_POST['mssv'] ?? '';
            $malop = $_POST['malop'] ?? ''; 

            $model = new SinhVienModel();
            $result = $model->create($name, $class, $mssv, $malop); 

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
            $sv = $model->getById($mssv); 
            
            // Lấy danh sách lớp để chọn lại
            require_once __DIR__ . '/../models/LopHocModel.php';
            $lopModel = new LopHocModel();
            $dataLopHoc = $lopModel->getAll();

            require_once __DIR__ . '/../views/sinhvien/edit.php';
        }
    }

    public function update_sv() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mssv = $_POST['mssv'] ?? ''; 
            $name = $_POST['name'] ?? '';
            $class = $_POST['class'] ?? '';
            $malop = $_POST['malop'] ?? ''; // Hứng thêm malop

            $model = new SinhVienModel();
            $result = $model->update($mssv, $name, $class, $malop); // Truyền thêm malop

            if ($result) {
                header("Location: /PMNM_68PM4_VuMinhQuang_0021968/public/sinhvien");
                exit();
            } else {
                echo "<h3>Cập nhật thất bại!</h3>";
            }
        }
    }

?>         