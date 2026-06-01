<?php
require_once __DIR__ . '/../models/SinhVienModel.php';
class Sinhvien{
    public function index(){
        $model = new SinhVienModel();
        $dataSinhVien = $model->getAll();
        require_once __DIR__ . '/../views/sinhvien/index.php';
    }
}
$test = new Sinhvien();
$test->index();
?>         