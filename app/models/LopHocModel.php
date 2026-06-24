<?php
require_once __DIR__ . '/../core/Database.php';

class LopHocModel {
    private $db;
    public function __construct() {
        $this->db = (new Database())->getConnection();
    }
    public function getAll() {
        $stmt = $this->db->prepare('SELECT * FROM lop_hoc');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($malop, $tenlop) {
        $stmt = $this->db->prepare("INSERT INTO lop_hoc (malop, tenlop) VALUES (:malop, :tenlop)");
        return $stmt->execute(['malop' => $malop, 'tenlop' => $tenlop]);
    }
    public function update($malop, $tenlop) {
        $stmt = $this->db->prepare("UPDATE lop_hoc SET tenlop = :tenlop WHERE malop = :malop");
        return $stmt->execute(['malop' => $malop, 'tenlop' => $tenlop]);
    }
    public function delete($malop) {
        $stmt = $this->db->prepare("DELETE FROM lop_hoc WHERE malop = :malop");
        return $stmt->execute(['malop' => $malop]);
    }
}
?>