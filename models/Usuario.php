<?php

class Usuario extends Model{
    
    public function getPerfis() {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM perfil");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function isLogged() {
        if (isset($_SESSION['c_juri']) && !empty($_SESSION['c_juri'])) {
            return true;
        }else{
            return false;
        }
    }
    
    public function logar($login, $senha) {
        $sql = $this->db->prepare("SELECT * FROM usuario WHERE Login = :login AND Senha = :senha");
        $sql->bindValue(":login", $login);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $_SESSION['c_juri'] = $array['idUsuario'];
            return true;
        } else {
            return false;
        }
    }
    
    public function addUsuario($uf, $cep, $logradouro, $numero, $bairro, $complemento, $cidade, $email, $tel, $celular, $cpf, $nome, $rg, $cnh, $titulo_de_eleitor, $data_nasc, $nomePerfil, $oab, $login, $senha) {
        
//        TABELA ENDERECO
        $sql = $this->db->prepare("INSERT INTO endereco SET UF = :estado, CEP = :cep, Logradouro = :rua, Numero = :numero, Bairro = :bairro, complemento = :comp, cidade = :cidade");
        $sql->bindValue(":estado", $uf);        
        $sql->bindValue(":cep", $cep);        
        $sql->bindValue(":rua", $logradouro);        
        $sql->bindValue(":numero", $numero);        
        $sql->bindValue(":bairro", $bairro);        
        $sql->bindValue(":cidade", $cidade);        
        $sql->bindValue(":comp", $complemento);
        $sql->execute();
        
        $idEndereco = $this->db->lastInsertId();
        
//        TABELA CONTATO
        $sql = $this->db->prepare("INSERT INTO contato SET Email = :email, idEndereco = :id");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":id", $idEndereco);
        $sql->execute();
        
        $idContato = $this->db->lastInsertId();
        
//        TABELA TELEFONE
        $sql = $this->db->prepare("INSERT INTO telefone SET Residencial = :telefone, Celular = :celular, Contato_idContato = :idContato");
        $sql->bindValue(":telefone", $tel);
        $sql->bindValue(":celular", $celular);
        $sql->bindValue(":idContato", $idContato);
        $sql->execute();
        
//        TABELA PESSOA FISICA
        $sql = $this->db->prepare("INSERT INTO pessoa_fisica SET CPF = :cpf, Nome = :nome, RG =:rg, CNH = :cnh, Titulo_de_Eleitor = :titulo, Data_Nasc = :nascimento, Contato_idContato = :idContato");
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":rg", $rg);
        $sql->bindValue(":cnh", $cnh);
        $sql->bindValue(":titulo", $titulo_de_eleitor);
        $sql->bindValue(":nascimento", $data_nasc);
        $sql->bindValue(":idContato", $idContato);
        $sql->execute();
        
        $idPessoa = $this->db->lastInsertId();
                
//        TABELA USUARIO
        $sql = $this->db->prepare("INSERT INTO usuario SET Login = :login, Senha = :senha, idPerfil = :idPerfil, Pessoa_Fisica_idPessoa_Fisica = :pf");
        $sql->bindValue(":login", $login);
        $sql->bindValue(":senha", md5($senha));
        $sql->bindValue(":idPerfil", $nomePerfil);
        $sql->bindValue(":pf", $idPessoa);
        $sql->execute();
        
        $idUsuario = $this->db->lastInsertId();
        
        if (isset($oab) && !empty($oab) && $nomePerfil != 1) {
            $sql = $this->db->prepare("INSERT INTO advogado SET OAB = :oab, Usuario_idUsuario = :usuario");
        $sql->bindValue(":oab", $oab);
        $sql->bindValue(":usuario", $idUsuario);
        $sql->execute();
        }
        
    }
    
    public function updateSenha($senha, $idPF) {
        $sql = $this->db->prepare("UPDATE usuario SET Senha = :senha WHERE Pessoa_Fisica_idPessoa_Fisica = :id");
        $sql->bindValue(":senha", md5($senha));
        $sql->bindValue(":id", $idPF);
        $sql->execute();
    }
    
    public function editUsuario($uf, $cep, $logradouro, $numero, $bairro, $complemento, $cidade, $email, $tel, $celular, $cpf, $nome, $rg, $cnh, $titulo_de_eleitor, $data_nasc, $nomePerfil, $oab, $login, $senha, $idPF) {
        
//        TABELA PESSOA FISICA
        $sql = $this->db->prepare("UPDATE pessoa_fisica SET CPF = :cpf, Nome = :nome, RG =:rg, CNH = :cnh, Titulo_de_Eleitor = :titulo, Data_Nasc = :nascimento WHERE idPessoa_Fisica = :id");
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":rg", $rg);
        $sql->bindValue(":cnh", $cnh);
        $sql->bindValue(":titulo", $titulo_de_eleitor);
        $sql->bindValue(":nascimento", $data_nasc);
        $sql->bindValue(":id", $idPF);
        $sql->execute();
        
        //        TABELA USUARIO
        $sql = $this->db->prepare("UPDATE usuario SET Login = :login, idPerfil = :idPerfil WHERE Pessoa_Fisica_idPessoa_Fisica = :pf");
        $sql->bindValue(":login", $login);
        $sql->bindValue(":idPerfil", $nomePerfil);
        $sql->bindValue(":pf", $idPF);
        $sql->execute();
        
        $usuario = $this->getUsuarioByIdPF($idPF);
        
        if (isset($oab) && !empty($oab) && $nomePerfil != 1) {
            $sql = $this->db->prepare("UPDATE advogado SET OAB = :oab WHERE Usuario_idUsuario = :usuario");
            $sql->bindValue(":oab", $oab);
            $sql->bindValue(":usuario", $usuario['idUsuario']);
            $sql->execute();
        }
        
        $pf = $this->getPessoaByCPF($cpf);
        
        //        TABELA CONTATO
        $sql = $this->db->prepare("UPDATE contato SET Email = :email WHERE idContato = :id");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":id", $pf['Contato_idContato']);
        $sql->execute();
        
        //        TABELA TELEFONE
        $sql = $this->db->prepare("UPDATE telefone SET Residencial = :telefone, Celular = :celular WHERE Contato_idContato = :idContato");
        $sql->bindValue(":telefone", $tel);
        $sql->bindValue(":celular", $celular);
        $sql->bindValue(":idContato", $pf['Contato_idContato']);
        $sql->execute();
        
        $contato = $this->getContatoById($pf['Contato_idContato']);
        
        //        TABELA ENDERECO
        $sql = $this->db->prepare("UPDATE endereco SET UF = :estado, CEP = :cep, Logradouro = :rua, Numero = :numero, Bairro = :bairro, complemento = :comp, cidade = :cidade WHERE idEndereco = :id");
        $sql->bindValue(":estado", $uf);        
        $sql->bindValue(":cep", $cep);        
        $sql->bindValue(":rua", $logradouro);        
        $sql->bindValue(":numero", $numero);        
        $sql->bindValue(":bairro", $bairro);        
        $sql->bindValue(":cidade", $cidade);        
        $sql->bindValue(":comp", $complemento);
        $sql->bindValue(":id", $contato['idEndereco']);
        $sql->execute();
        
    }
    
    public function delUsuario($idPF) {
        
        $pessoa = $this->getPessoaById($idPF);
        $usuario = $this->getUsuarioByIdPF($idPF);
        $advogado = $this->getAdvogadoByIdUsuario($usuario['idUsuario']);
        $contato = $this->getContatoById($pessoa['Contato_idContato']);
        $telefone = $this->getTelefoneByContato($contato['idContato']);
        $endereco = $this->getEnderecoById($contato['idEndereco']);
        
        
//        ADVOGADO
        $sql = $this->db->prepare("DELETE FROM advogado WHERE idAdvogado = :id");
        $sql->bindValue(":id", $advogado['idAdvogado']);
        $sql->execute();

//        USUARIO
        $sql = $this->db->prepare("DELETE FROM usuario WHERE idUsuario = :id");
        $sql->bindValue(":id", $usuario['idUsuario']);
        $sql->execute();
        
//        PESSOA FISICA
        $sql = $this->db->prepare("DELETE FROM pessoa_fisica WHERE idPessoa_Fisica = :id");
        $sql->bindValue(":id", $pessoa['idPessoa_Fisica']);
        $sql->execute();

//        TELEFONE
        $sql = $this->db->prepare("DELETE FROM telefone WHERE idTelefone = :id");
        $sql->bindValue(":id", $telefone['idTelefone']);
        $sql->execute();

//        CONTATO
        $sql = $this->db->prepare("DELETE FROM contato WHERE idContato = :id");
        $sql->bindValue(":id", $contato['idContato']);
        $sql->execute();

//        ENDERECO
        $sql = $this->db->prepare("DELETE FROM endereco WHERE idEndereco = :id");
        $sql->bindValue(":id", $endereco['idEndereco']);
        $sql->execute();
        
        
    }
    
    public function getAdvogadoByIdUsuario($idUsuario) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM advogado WHERE Usuario_idUsuario = :id");
        $sql->bindValue(":id", $idUsuario);
        $sql->execute();
        
        if ($sql->rowCount() > 0 ) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getAdvogadoByOAB($oab) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM advogado WHERE OAB = :id");
        $sql->bindValue(":id", $oab);
        $sql->execute();
        
        if ($sql->rowCount() > 0 ) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getPessoaByCPF($cpf) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM pessoa_fisica WHERE CPF = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();
        
        if ($sql->rowCount() > 0 ) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getUsuarioByIdPF($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT *, (select perfil.Nome_Perfil from perfil where perfil.idPerfil = usuario.idPerfil) as perfilNome FROM usuario WHERE Pessoa_Fisica_idPessoa_Fisica = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0 ) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getUsuarioById($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM usuario WHERE idUsuario = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0 ) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
//    public function getPerfilById($id) {
//        $array = array();
//        
//        $sql = $this->db->prepare("SELECT * FROM perfil WHERE idPerfil = :id");
//        $sql->bindValue(":id", $id);
//        $sql->execute();
//        
//        if ($sql->rowCount() > 0 ) {
//            $array = $sql->fetch();
//        }
//        
//        return $array;
//    }
    
    public function getTelefoneByContato($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM telefone WHERE Contato_idContato = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0 ) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getEnderecoById($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM endereco WHERE idEndereco = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0 ) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getDadosUser() {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM usuario WHERE idUsuario = :id");
        $sql->bindValue(":id", $_SESSION['c_juri']);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $array['pessoa'] = $this->getPessoaById($array['Pessoa_Fisica_idPessoa_Fisica'], "fisica");
            $array['contato'] = $this->getContatoById($array['pessoa']['Contato_idContato']);
        }
        
        return $array;
    }
    
    public function getPessoaById($idPessoa, $tipo = "fisica") {
        $array = array();
        
        if ($tipo == "fisica") {
            $sql = $this->db->prepare("SELECT * FROM pessoa_fisica WHERE idPessoa_Fisica = :id");
        }elseif($tipo == "juridica"){
            $sql = $this->db->prepare("SELECT * FROM pessoa_juridica WHERE idPessoa_Juridica = :id");
        }
        $sql->bindValue(":id", $idPessoa);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getContatoById($idContato) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM contato WHERE idContato = :id");
        $sql->bindValue(":id", $idContato);
        $sql->execute();
        
       if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
}
