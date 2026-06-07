<?php

require_once __DIR__ . '/../core/Database.php';

class SinhVienModel {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function getAll() {
        $sql = 'SELECT * FROM sinh_vien';
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Loi lay du lieu: " . $e->getMessage();
            return [];
        }
    }

    // Hàm thêm sinh viên mới
    public function create($name, $class, $mssv) {
        $sql = "INSERT INTO sinh_vien (mssv, name, class) VALUES (:mssv, :name, :class)";
        
        try {
            $stmt = $this->db->prepare($sql);
            // Gán giá trị an toàn
            $stmt->bindParam(':mssv', $mssv);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':class', $class);
            
            return $stmt->execute(); 
        } catch (PDOException $e) {
            echo "Lỗi thêm dữ liệu: " . $e->getMessage();
            return false;
        }
    }
}
?>