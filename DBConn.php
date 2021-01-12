<?php

class DBConn{
    private $serverName = 'localhost';
    private $dbName = 'icb0006_uf4_pr01';
    private $userName = 'root';
    private $password = '';
    public $conn;


    public function openConn(){
        try{
            $this->conn = new PDO('mysql:host='.$this->serverName.';dbname='.$this->dbName,$this->userName,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "La conexión ha fallado. Motivo: " . $e->getMessage();
        }
        return $this->conn;
    }

    public function closeConn(){
        $this->conn = NULL;
    }


}