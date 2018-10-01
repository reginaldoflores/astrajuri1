<?php

class Compromisso extends Model{
    
    public function getCompromissos($idUsuario) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT *, (select pessoa_fisica.Nome from pessoa_fisica where pessoa_fisica.Contato_idContato = compromisso.idContato union select pessoa_juridica.Nome_Fantasia from pessoa_juridica where pessoa_juridica.Contato_idContato = compromisso.idContato) as nomeCliente, (select (select (select pessoa_fisica.Nome from pessoa_fisica where pessoa_fisica.idPessoa_Fisica = usuario.Pessoa_Fisica_idPessoa_Fisica) from usuario where usuario.idUsuario = advogado.Usuario_idUsuario) from advogado where advogado.idAdvogado = compromisso.idAdv) as nomeAdvogado FROM compromisso WHERE idAdv = :id");
        $sql->bindValue(":id", $idUsuario);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getPessoaJuridicaByName($name) {
        $array = array();
        $sql = $this->db->prepare("SELECT * FROM pessoa_juridica WHERE Nome_Fantasia = :nome");
        $sql->bindValue(":nome", $name);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
    
    public function getCompromissosFull() {
        $cliente = new Cliente();
        $array = array();
        
        $sql = $this->db->query("SELECT *, (select pessoa_fisica.Nome from pessoa_fisica where pessoa_fisica.Contato_idContato = compromisso.idContato union select pessoa_juridica.Nome_Fantasia from pessoa_juridica where pessoa_juridica.Contato_idContato = compromisso.idContato) as nomeCliente, (select (select (select pessoa_fisica.Nome from pessoa_fisica where pessoa_fisica.idPessoa_Fisica = usuario.Pessoa_Fisica_idPessoa_Fisica) from usuario where usuario.idUsuario = advogado.Usuario_idUsuario) from advogado where advogado.idAdvogado = compromisso.idAdv) as nomeAdvogado FROM compromisso");
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function isAdvogado($idUsuario) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM advogado WHERE Usuario_idUsuario = :id");
        $sql->bindValue(":id", $idUsuario);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function addComprimisso($title, $color, $start_sem_barra, $end_sem_barra, $texto, $cliente, $adv, $usuario) {
        
        $sql = $this->db->prepare("INSERT INTO compromisso SET Compromisso = :comp, Cor = :cor, DataInicio = :inicio, DataFinal = :final, idUsuario_usu = :usuario, idAdv = :adv, idContato = :contato, Texto = :texto");
        $sql->bindValue(":comp", $title);
        $sql->bindValue(":cor", $color);
        $sql->bindValue(":inicio", $start_sem_barra);
        $sql->bindValue(":final", $end_sem_barra);
        $sql->bindValue(":usuario", $usuario);
        $sql->bindValue(":adv", $adv);
        $sql->bindValue(":contato", $cliente);
        $sql->bindValue(":texto", $texto);
        $sql->execute();
        
    }
    
    public function updateComprimisso($title, $color, $start_sem_barra, $end_sem_barra, $texto, $cliente, $adv, $usuario, $idCompromisso) {
        
        $sql = $this->db->prepare("UPDATE compromisso SET Compromisso = :comp, Cor = :cor, DataInicio = :inicio, DataFinal = :final, idUsuario_usu = :usuario, idAdv = :adv, idContato = :contato, Texto = :texto WHERE idCompromisso = :id");
        $sql->bindValue(":comp", $title);
        $sql->bindValue(":cor", $color);
        $sql->bindValue(":inicio", $start_sem_barra);
        $sql->bindValue(":final", $end_sem_barra);
        $sql->bindValue(":usuario", $usuario);
        $sql->bindValue(":adv", $adv);
        $sql->bindValue(":contato", $cliente);
        $sql->bindValue(":texto", $texto);
        $sql->bindValue(":id", $idCompromisso);
        $sql->execute();
        
    }
    
    public function delCompromisso($idCompromisso) {
        $sql = $this->db->prepare("DELETE FROM compromisso WHERE idCompromisso = :id");
        $sql->bindValue(":id", $idCompromisso);
        $sql->execute();
    }
    
}
