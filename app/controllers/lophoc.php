<?php
require_once __DIR__ . '/../models/LopHocModel.php';
class Lophoc {
    public function index() {
        $model = new LopHocModel();
        $dataLophoc = $model->getAll();
        // Lát ông tự tạo file view index.php cho lophoc nhé
        require_once __DIR__ . '/../views/lophoc/index.php';
    }
}
?>