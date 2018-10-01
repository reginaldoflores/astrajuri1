<?php

class Vara extends Model{
    
    public function addVara($vara, $id) {
        $sql = $this->db->prepare("INSERT INTO vara SET Nome = :nome, Comarca_idComarca = :id");
        $sql->bindValue(":nome", $vara);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
    public function getVaras() {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM vara");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getVaraByNome($nome) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM vara WHERE Nome like '%$nome%'");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getVaraById($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM vara WHERE idVara = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getVaraByComarca($comar) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM vara WHERE Comarca_idComarca = :id");
        $sql->bindValue(":id", $comar);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function updateVara($vara, $id) {
        $sql = $this->db->prepare("UPDATE vara SET Nome = :nome WHERE idVara = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":nome", $vara);
        $sql->execute();
    }
    
    public function deleteVara($id) {
        $sql = $this->db->prepare("DELETE FROM vara WHERE idVara = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
}
