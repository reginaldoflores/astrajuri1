<?php

class Cliente extends Model{

    public function updatePessoaFisica($cep, $logradouro, $numero, $bairro, $complemento, $cidade, $estado, $email, $telefone, $celular, $nome, $rg, $cnh, $titulo_de_eleitor, $data_nasc, $cpf_cnpj) {
        $pessoaFisica = $this->getPessoaFisicaByCPF($cpf_cnpj);
        
        $sql = $this->db->prepare("UPDATE contato SET Email = :email WHERE idContato = :id");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":id", $pessoaFisica['Contato_idContato']);
        $sql->execute();
        
        $sql = $this->db->prepare("UPDATE telefone SET Residencial = :telefone, Celular = :celular WHERE Contato_idContato = :contato");
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":celular", $celular);
        $sql->bindValue(":contato", $pessoaFisica['Contato_idContato']);
        $sql->execute();
        
        $sql = $this->db->prepare("UPDATE endereco SET Numero = :numero, CEP = :cep, Bairro = :bairro, Cidade = :cidade, Complemento = :comp, Logradouro = :rua, UF = :uf WHERE idEndereco = :id");
        $sql->bindvalue(":numero", $numero);
        $sql->bindvalue(":cep", $cep);
        $sql->bindvalue(":bairro", $bairro);
        $sql->bindvalue(":cidade", $cidade);
        $sql->bindvalue(":comp", $complemento);
        $sql->bindvalue(":rua", $logradouro);
        $sql->bindvalue(":uf", $estado);
        $sql->bindvalue(":id", $pessoaFisica['idEndereco']);
        $sql->execute();
        
        $sql = $this->db->prepare("UPDATE pessoa_fisica SET Nome = :nome, Data_Nasc = :nascimento, RG = :rg, Titulo_de_Eleitor = :titulo, CNH = :cnh WHERE CPF = :cpf AND Contato_idContato = :contato");
            $sql->bindValue(":nascimento", $data_nasc);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":cpf", $cpf_cnpj);
            $sql->bindValue(":rg", $rg);
            $sql->bindValue(":titulo", $titulo_de_eleitor);
            $sql->bindValue(":cnh", $cnh);
            $sql->bindValue(":contato", $pessoaFisica['Contato_idContato']);
            $sql->execute();
    }
    
    public function updatePessoaJuridica($cep, $logradouro, $numero, $bairro, $complemento, $cidade, $estado, $email, $telefone, $celular, $nome, $insc_municipal, $insc_estadual, $cpf_cnpj) {
        $pessoaFisica = $this->getPessoaJuridicaByCNPJ($cpf_cnpj);
        
        $sql = $this->db->prepare("UPDATE contato SET Email = :email WHERE idContato = :id");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":id", $pessoaFisica['Contato_idContato']);
        $sql->execute();
        
        $sql = $this->db->prepare("UPDATE telefone SET Residencial = :telefone, Celular = :celular WHERE Contato_idContato = :contato");
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":celular", $celular);
        $sql->bindValue(":contato", $pessoaFisica['Contato_idContato']);
        $sql->execute();
        
        $sql = $this->db->prepare("UPDATE endereco SET Numero = :numero, CEP = :cep, Bairro = :bairro, Cidade = :cidade, Complemento = :comp, Logradouro = :rua, UF = :uf WHERE idEndereco = :id");
        $sql->bindvalue(":numero", $numero);
        $sql->bindvalue(":cep", $cep);
        $sql->bindvalue(":bairro", $bairro);
        $sql->bindvalue(":cidade", $cidade);
        $sql->bindvalue(":comp", $complemento);
        $sql->bindvalue(":rua", $logradouro);
        $sql->bindvalue(":uf", $estado);
        $sql->bindvalue(":id", $pessoaFisica['idEndereco']);
        $sql->execute();
        
        $sql = $this->db->prepare("UPDATE pessoa_juridica SET Nome_Fantasia = :nome, Insc_Estadual = :estadual, Insc_Municipal = :municipal WHERE CNPJ = :cnpj AND Contato_idContato = :contato");
            $sql->bindValue(":cnpj", $cpf_cnpj);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":estadual", $insc_estadual);
            $sql->bindValue(":municipal", $insc_municipal);
            $sql->bindValue(":contato", $pessoaFisica['Contato_idContato']);
            $sql->execute();
    }
    
    public function addPessoaFisica($cep, $logradouro, $numero, $bairro, $complemento, $cidade, $estado, $email, $telefone, $celular, $nome, $rg, $cnh, $titulo_de_eleitor, $data_nasc, $cpf_cnpj){
        $sql = $this->db->prepare("INSERT INTO endereco SET CEP = :cep, Numero = :numero, Bairro = :bairro, Cidade = :cidade, Complemento = :comp, Logradouro = :rua, UF = :uf");
        $sql->bindvalue(":cep", $cep);
        $sql->bindvalue(":numero", $numero);
        $sql->bindvalue(":bairro", $bairro);
        $sql->bindvalue(":cidade", $cidade);
        $sql->bindvalue(":comp", $complemento);
        $sql->bindvalue(":rua", $logradouro);
        $sql->bindvalue(":uf", $estado);
        $sql->execute();
        
        $idEndereco = $this->db->lastInsertId();
        
        $sql = $this->db->prepare("INSERT INTO contato SET Email = :email, idEndereco = :endereco");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":endereco", $idEndereco);
        $sql->execute();
        
        $idContato = $this->db->lastInsertId();
        
        $sql = $this->db->prepare("INSERT INTO telefone SET Residencial = :telefone, Celular = :celular, Contato_idContato = :contato");
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":celular", $celular);
        $sql->bindValue(":contato", $idContato);
        $sql->execute();
        
        $sql = $this->db->prepare("INSERT INTO pessoa_fisica SET Nome = :nome, Data_Nasc = :nascimento, CPF = :cpf, RG = :rg, Titulo_de_Eleitor = :titulo, CNH = :cnh, Contato_idContato = :contatoT");
            $sql->bindValue(":nascimento", $data_nasc);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":cpf", $cpf_cnpj);
            $sql->bindValue(":rg", $rg);
            $sql->bindValue(":titulo", $titulo_de_eleitor);
            $sql->bindValue(":cnh", $cnh);
            $sql->bindValue(":contatoT", $idContato);
            $sql->execute();
    }
    
    public function addPessoaJuridica($cep, $logradouro, $numero, $bairro, $complemento, $cidade, $estado, $email, $telefone, $celular, $nome, $insc_municipal, $insc_estadual, $cpf_cnpj){
        $sql = $this->db->prepare("INSERT INTO endereco SET CEP = :cep, Numero = :numero, Bairro = :bairro, Cidade = :cidade, Complemento = :comp, Logradouro = :rua, UF = :uf");
        $sql->bindvalue(":cep", $cep);
        $sql->bindvalue(":numero", $numero);
        $sql->bindvalue(":bairro", $bairro);
        $sql->bindvalue(":cidade", $cidade);
        $sql->bindvalue(":comp", $complemento);
        $sql->bindvalue(":rua", $logradouro);
        $sql->bindvalue(":uf", $estado);
        $sql->execute();
        
        $idEndereco = $this->db->lastInsertId();
        
        $sql = $this->db->prepare("INSERT INTO contato SET Email = :email, idEndereco = :endereco");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":endereco", $idEndereco);
        $sql->execute();
        
        $idContato = $this->db->lastInsertId();
        
        $sql = $this->db->prepare("INSERT INTO telefone SET Residencial = :telefone, Celular = :celular, Contato_idContato = :contato");
        $sql->bindValue(":telefone", $telefone);
        $sql->bindValue(":celular", $celular);
        $sql->bindValue(":contato", $idContato);
        $sql->execute();
        
        $sql = $this->db->prepare("INSERT INTO pessoa_juridica SET CNPJ = :cnpj, Nome_Fantasia = :nome, Insc_Estadual = :estadual, Insc_Municipal = :municipal, Contato_idContato = :contato");
            $sql->bindValue(":cnpj", $cpf_cnpj);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":estadual", $insc_estadual);
            $sql->bindValue(":municipal", $insc_municipal);
            $sql->bindValue(":contato", $idContato);
            $sql->execute();
    }
        
    public function getClientesFull() {
        $array = array();
        
        $sql = $this->db->prepare("select Contato_idContato, Nome,  CPF, (select contato.idContato from contato where contato.idContato = pessoa_fisica.Contato_idContato) as idContato  from pessoa_fisica union select Contato_idContato, Nome_Fantasia, CNPJ, (select contato.idContato from contato where contato.idContato = pessoa_juridica.Contato_idContato) as idContato from pessoa_juridica");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getClientes() {
        $array = array();
        
        $sql = $this->db->prepare("SELECT *, "
                . "(select pessoa_fisica.CPF from pessoa_fisica where pessoa_fisica.Contato_idContato = contato.idContato) as cpf, "
                . "(select pessoa_fisica.Nome from pessoa_fisica where pessoa_fisica.Contato_idContato = contato.idContato) as nome"
                . " FROM contato");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getEstados() {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM estado");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getClienteById($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT *, "
                . "(select pessoa_fisica.CPF from pessoa_fisica where pessoa_fisica.Contato_idContato = contato.idContato) as cpf, "
                . "(select pessoa_fisica.CPF from pessoa_fisica where pessoa_fisica.Contato_idContato = contato.idContato) as Nome, "
                . "(select pessoa_fisica.Data_Nasc from pessoa_fisica where pessoa_fisica.Contato_idContato = contato.idContato) as nascimento"
                . " FROM contato WHERE idContato = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getFullClienteById($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM contato WHERE idContato = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            
            $array['telefone'] = $this->getTelefoneByContato($array['idContato']);
            $array['endereco'] = $this->getEnderecoById($array['idEndereco']);
            $array['pessoa'] = $this->getPessoaFisicaByContato($array['idContato']);
            $array['tipo'] = "CPF";
            if (count($array['pessoa']) <= 0) {
                $array['pessoa'] = $this->getPessoaJuridicaByContato($array['idContato']);
                $array['tipo'] = "CNPJ";
            }
        }
        
        return $array;
    }
    
//    public function getClientePFByName($nome) {
//        $array = array();
//        
//        $sql = $this->db->prepare("SELECT * FROM pessoa_fisica WHERE Nome = :nome");
//        $sql->bindValue(":nome", $nome);
//        $sql->execute();
//        
//        if ($sql->rowCount() > 0) {
//            $array = $sql->fetch();
//        }
//        
//        return $array;
//    }
//    
//    public function getClientePJByName($nome) {
//        $array = array();
//        
//        $sql = $this->db->prepare("SELECT * FROM pessoa_juridica WHERE Nome = :nome");
//        $sql->bindValue(":nome", $nome);
//        $sql->execute();
//        
//        if ($sql->rowCount() > 0) {
//            $array = $sql->fetch();
//        }
//        
//        return $array;
//    }
//    
    public function getTelefoneByContato($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM telefone WHERE Contato_idContato = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getEnderecoById($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM endereco WHERE idEndereco = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getPessoaFisicaById($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM pessoa_fisica WHERE idPessoa_Fisica = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getPessoaFisicaByContato($contato) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM pessoa_fisica WHERE Contato_idContato = :id");
        $sql->bindValue(":id", $contato);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getPessoaJuridicaByContato($contato) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM pessoa_juridica WHERE Contato_idContato = :id");
        $sql->bindValue(":id", $contato);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function deletePessoaFisica($cpf) {
        $pessoaFisica = $this->getPessoaFisicaByCPF($cpf);
        
        // Ordem de Exclusão, inclusive do banco
//        PESSOA FISICA
//        TELEFONE
//        CONTATO
//        ENDEREÇO
        
        $sql = $this->db->prepare("DELETE FROM pessoa_fisica WHERE CPF = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();
        
        $sql = $this->db->prepare("DELETE FROM telefone WHERE Contato_idContato = :id");
        $sql->bindValue(":id", $pessoaFisica['Contato_idContato']);
        $sql->execute();
        
        $sql = $this->db->prepare("DELETE FROM contato WHERE idContato = :id");
        $sql->bindValue(":id", $pessoaFisica['Contato_idContato']);
        $sql->execute();
        
        $sql = $this->db->prepare("DELETE FROM endereco WHERE idEndereco = :id");
        $sql->bindValue(":id", $pessoaFisica['idEndereco']);
        $sql->execute();
     
    }
    
    public function deletePessoaJuridica($cnpj) {
        $pessoaFisica = $this->getPessoaJuridicaByCNPJ($cnpj);
        
        $sql = $this->db->prepare("DELETE FROM pessoa_juridica WHERE CNPJ = :cnpj");
        $sql->bindValue(":cnpj", $cnpj);
        $sql->execute();
        
         $sql = $this->db->prepare("DELETE FROM telefone WHERE Contato_idContato = :id");
        $sql->bindValue(":id", $pessoaFisica['Contato_idContato']);
        $sql->execute();
        
        $sql = $this->db->prepare("DELETE FROM contato WHERE idContato = :id");
        $sql->bindValue(":id", $pessoaFisica['Contato_idContato']);
        $sql->execute();
        
        $sql = $this->db->prepare("DELETE FROM endereco WHERE idEndereco = :id");
        $sql->bindValue(":id", $pessoaFisica['idEndereco']);
        $sql->execute();
        
    }
    
    public function getPessoaFisicaByCPF($cpf) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT *,"
                . " (select contato.Email from contato where contato.idContato = pessoa_fisica.Contato_idContato) as email,"
                . " (select contato.idEndereco from contato where contato.idContato = pessoa_fisica.Contato_idContato) as idEndereco"
                . " FROM pessoa_fisica WHERE CPF = :cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute(); 
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $array['telefone'] = $this->getTelefoneByContato($array['Contato_idContato']);
            $array['endereco'] = $this->getEnderecoById($array['idEndereco']);
        }
        
        return $array;
    }
    
    public function getPessoaJuridicaByCNPJ($cnpj) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT *,"
                . " (select contato.Email from contato where contato.idContato = pessoa_juridica.Contato_idContato) as email,"
                . " (select contato.idEndereco from contato where contato.idContato = pessoa_juridica.Contato_idContato) as idEndereco"
                . " FROM pessoa_juridica WHERE CNPJ = :cnpj");
        $sql->bindValue(":cnpj", $cnpj);
        $sql->execute(); 
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $array['telefone'] = $this->getTelefoneByContato($array['Contato_idContato']);
            $array['endereco'] = $this->getEnderecoById($array['idEndereco']);
        }
        
        return $array;
    }
    
    function validaCPF($cpf = null) {

	// Verifica se um número foi informado
	if(empty($cpf)) {
		return false;
	}

	// Elimina possivel mascara
	$cpf = preg_replace("/[^0-9]/", "", $cpf);
	$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($cpf) != 11) {
		return false;
	}
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else if ($cpf == '00000000000' || 
		$cpf == '11111111111' || 
		$cpf == '22222222222' || 
		$cpf == '33333333333' || 
		$cpf == '44444444444' || 
		$cpf == '55555555555' || 
		$cpf == '66666666666' || 
		$cpf == '77777777777' || 
		$cpf == '88888888888' || 
		$cpf == '99999999999') {
		return false;
	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return false;
			}
		}

		return true;
	}
    }
    
    function validar_cnpj($cnpj)    {
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }
    
}
