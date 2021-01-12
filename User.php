<?php
include("DBconn.php");

class User extends DBconn{

    public function selectAll(){
        $sql = 'SELECT * FROM clients';
        $result = $this->openConn()->query($sql);
        $this->closeConn();
        return $result;
    }
    public function selectFiltered($sentence){
        $sql = 'SELECT * FROM clients where '.$sentence;
        $result = $this->openConn()->query($sql);
        $this->closeConn();
        return $result;
    }

    public function insert($arr){
        $sql = 'INSERT INTO contactos VALUES (NULL,"'.$arr["nombre"].'","'.$arr["telefono"].'","'.$arr["direccion"].'","'.$arr["cp"].'","'.$arr["ciudad"].'","'.$arr["pais"].'")';
        $result = $this->openConn()->query($sql);
        $this->closeConn();
        return $result;
    }
}

?>