<?php
require_once __DIR__ . '/../core/Database.php';

class LopHocModel {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function getAll() {
        $sql = 'SELECT * FROM lop_hoc';
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Loi lay du lieu lop hoc: " . $e->getMessage();
            return [];
        }
    }
}
?>