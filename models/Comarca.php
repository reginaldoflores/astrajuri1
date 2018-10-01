<?php

class Comarca extends Model{
    
    public function addComarca($comarca, $endereco) {
        $sql = $this->db->prepare("INSERT INTO comarca SET Nome = :nome, Endereco = :endereco");
        $sql->bindValue(":nome", $comarca);
        $sql->bindValue(":endereco", $endereco);
        $sql->execute();
    }
    
    public function getComarcas() {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM comarca");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
        
    public function getComarcaById($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM comarca WHERE idComarca = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getComarcaByNome($nome) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM comarca WHERE Nome like '%$nome%'");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function updateComarca($comarca, $endereco, $id) {
        $sql = $this->db->prepare("UPDATE comarca SET Nome = :nome, Endereco = :endereco WHERE idComarca = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":nome", $comarca);
        $sql->bindValue(":endereco", $endereco);
        $sql->execute();
    }
    
    public function deleteComarca($id) {
        $sql = $this->db->prepare("DELETE FROM comarca WHERE idComarca = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
}
