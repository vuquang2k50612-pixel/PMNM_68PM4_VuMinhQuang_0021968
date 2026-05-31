<?php 
 class Database {
    private $host = "localhost";
    private $dbname ="qlsv";
    private $user ="root";
    private $pass ="";
    protected $conn;
 
  
 public function __construct(){
   try {
    $dsn ="mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
    $this->conn = new PDO($dsn,$this->user,$this->pass);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   }catch(PDOException $e){
    echo "Loi ket noi CSDL:" . $e->getMessage();
   }
 }
    public function getConnection() {
        return $this->conn;
    }
 }
   
 ?>