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
    public function getTotal() {
        $sql = 'SELECT COUNT(*) as total FROM sinh_vien';
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (PDOException $e) {
            return 0;
        }
    }

    public function getPaging($limit, $offset) {
        $sql = 'SELECT * FROM sinh_vien LIMIT :limit OFFSET :offset';
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Loi lay du lieu: " . $e->getMessage();
            return [];
        }
    }

    // Hàm thêm sinh viên mới
    public function create($name, $class, $mssv, $malop) {
        $sql = "INSERT INTO sinh_vien (mssv, name, class, malop) VALUES (:mssv, :name, :class, :malop)";
        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute(['mssv'=>$mssv, 'name'=>$name, 'class'=>$class, 'malop'=>$malop]); 
        } catch (PDOException $e) { return false; }
    }

    // Sửa hàm update
    public function update($mssv, $name, $class, $malop) {
        $sql = 'UPDATE sinh_vien SET name = :name, class = :class, malop = :malop WHERE mssv = :mssv';
        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute(['mssv'=>$mssv, 'name'=>$name, 'class'=>$class, 'malop'=>$malop]);
        } catch (PDOException $e) { return false; }
    }
    
    public function getById($mssv) {
        $sql = 'SELECT * FROM sinh_vien WHERE mssv = :mssv';
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':mssv', $mssv);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update($mssv, $name, $class) {
        $sql = 'UPDATE sinh_vien SET name = :name, class = :class WHERE mssv = :mssv';
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':mssv', $mssv);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':class', $class);
            $stmt->bindParam(':malop', $malop);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi cập nhật: " . $e->getMessage();
            return false;
        }
    }
    public function delete($mssv) {
        $sql = 'DELETE FROM sinh_vien WHERE mssv = :mssv';
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':mssv', $mssv);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Lỗi xóa dữ liệu: " . $e->getMessage();
            return false;
        }
    }
}
?>