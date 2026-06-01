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
}
?>