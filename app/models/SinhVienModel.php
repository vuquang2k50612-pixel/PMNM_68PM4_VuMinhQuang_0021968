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
            return [];
        }
    }

    public function getTotal($search = '', $malop = '') {
        $sql = 'SELECT COUNT(*) as total FROM sinh_vien WHERE (mssv LIKE :search OR name LIKE :search)';
        if ($malop != '') $sql .= ' AND malop = :malop';
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':search', "%$search%");
        if ($malop != '') $stmt->bindValue(':malop', $malop);
        
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getPaging($limit, $offset, $search = '', $malop = '', $sort = 'mssv', $dir = 'ASC') {
        $allowedSort = ['mssv', 'name'];
        if (!in_array($sort, $allowedSort)) $sort = 'mssv';
        $dir = (strtoupper($dir) === 'DESC') ? 'DESC' : 'ASC';

        $sql = "SELECT * FROM sinh_vien WHERE (mssv LIKE :search OR name LIKE :search)";
        if ($malop != '') $sql .= " AND malop = :malop";
        $sql .= " ORDER BY $sort $dir LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':search', "%$search%");
        if ($malop != '') $stmt->bindValue(':malop', $malop);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $class, $mssv, $malop) {
        $sql = "INSERT INTO sinh_vien (mssv, name, class, malop) VALUES (:mssv, :name, :class, :malop)";
        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute(['mssv'=>$mssv, 'name'=>$name, 'class'=>$class, 'malop'=>$malop]); 
        } catch (PDOException $e) { return false; }
    }

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

    public function delete($mssv) {
        $sql = 'DELETE FROM sinh_vien WHERE mssv = :mssv';
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':mssv', $mssv);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>