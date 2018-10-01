<?php

class Processo extends Model{
    
    public function getInstancias() {
        $array = array();
        
        $sql = $this->db->query("SELECT * FROM instancia");
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getDespesas() {
        $array = array();
        
        $sql = $this->db->query("SELECT * FROM tipo_despesas");
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getProcessoByNum($num) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM processo WHERE NumeroProcesso = :num");
        $sql->bindValue(":num", $num);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getFases() {
        $array = array();
        
        $sql = $this->db->query("SELECT * FROM status_processo");
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getConclusoes() {
        $array = array();
        
        $sql = $this->db->query("SELECT * FROM conclusao");
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getClienteByNome($nome) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM pessoa_fisica WHERE Nome = :nome");
        $sql->bindValue(":nome", $nome);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }else{
            $sql = $this->db->prepare("SELECT * FROM pessoa_jurica WHERE Nome_Fantasia = :nome");
            $sql->bindValue(":nome", $nome);
            $sql->execute();
            
            if ($sql->rowCount() > 0) {
                $array = $sql->fetch();
            }
            
        }
        
        return $array;
    }
    
    public function getTipoDespesaByNome($nome) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM tipo_despesas WHERE Tipo = :nome");
        $sql->bindValue(":nome", $nome);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }else{
            
        }
        
        return $array;
    }
    
    public function getDespesaByProcesso($processo) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM astrajuri.despesas as desp left join tipo_despesas as t on t.idTipo_Despesas = desp.idTipo_Despesa WHERE idProcesso = :id");
        $sql->bindValue(":id", $processo);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }else{
            
        }
        
        return $array;
    }
    
    public function getClienteByContato($id) {
        $array = array();
        
        $sql = $this->db->prepare("select Contato_idContato, Nome,  CPF, (select contato.idContato from contato where contato.idContato = pessoa_fisica.Contato_idContato) as idContato  from pessoa_fisica where Contato_idContato = :id union select Contato_idContato, Nome_Fantasia, CNPJ, (select contato.idContato from contato where contato.idContato = pessoa_juridica.Contato_idContato) as idContato from pessoa_juridica where Contato_idContato = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getAdvogadoById($id) {
        $array = array();
        
        $sql = $this->db->prepare("select *, (select usuario.Pessoa_Fisica_idPessoa_Fisica from usuario where usuario.idUsuario = advogado.Usuario_idUsuario) as PF from advogado where idAdvogado = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getPosicoes() {
        $array = array();
        
        $sql = $this->db->query("SELECT * FROM posicao");
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getAdvogadosFull() {
        $array = array();
        
        $sql = $this->db->query("select *, (select (select pessoa_fisica.Nome from pessoa_fisica where usuario.Pessoa_Fisica_idPessoa_Fisica = pessoa_fisica.idPessoa_Fisica) as nome from usuario where usuario.idUsuario = advogado.Usuario_idUsuario) as nome from advogado");
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getAdvogadosFullById($id) {
        $array = array();
        
        $sql = $this->db->prepare("select *, (select (select pessoa_fisica.Nome from pessoa_fisica where usuario.Pessoa_Fisica_idPessoa_Fisica = pessoa_fisica.idPessoa_Fisica) as nome from usuario where usuario.idUsuario = advogado.Usuario_idUsuario) as nome from advogado WHERE idAdvogado = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function addProcesso($num, $juiz, $adv, $adv2, $cliente, $pessoa2, $fase, $vara, $posicao) {
        
        $sql = $this->db->prepare("INSERT INTO processo SET NumeroProcesso = :nome, Juiz = :juiz, advogado2 = :adv2, pessoa2 = :pessoa2, idPosicao = :posicao, idContato = :cliente, idStatus_Processo = :status_processo, idVara = :vara, idAdvogado = :adv");
        $sql->bindvalue(":nome", $num);
        $sql->bindvalue(":juiz", $juiz);
        $sql->bindvalue(":adv2", $adv2);
        $sql->bindvalue(":cliente", $cliente);
        $sql->bindvalue(":pessoa2", $pessoa2);
        $sql->bindvalue(":posicao", $posicao);
        $sql->bindvalue(":status_processo", $fase);
        $sql->bindvalue(":vara", $vara);
        $sql->bindvalue(":adv", $adv);
        $sql->execute();
        
    }
    
    public function addDespesa($valor, $descricao, $DataDespesa, $idTipo_Despesa, $idProcesso) {
        
        $sql = $this->db->prepare("INSERT INTO despesas SET Valor = :valor, Descricao = :descricao, DataDespesa = :dataDesp, idTipo_Despesa = :tipo, idProcesso = :processo");
        $sql->bindvalue(":valor", $valor);
        $sql->bindvalue(":descricao", $descricao);
        $sql->bindvalue(":dataDesp", $DataDespesa);
        $sql->bindvalue(":tipo", $idTipo_Despesa);
        $sql->bindvalue(":processo", $idProcesso);
        $sql->execute();
        
    }
    
    public function editDespesa($valor, $descricao, $DataDespesa, $idTipo_Despesa, $idProcesso, $idDespesa) {
        
        $sql = $this->db->prepare("UPDATE despesas SET Valor = :valor, Descricao = :descricao, DataDespesa = :dataDesp, idTipo_Despesa = :tipo WHERE idDespesas = :idDesp AND idProcesso = :processo");
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":dataDesp", $DataDespesa);
        $sql->bindValue(":tipo", $idTipo_Despesa);
        $sql->bindValue(":processo", $idProcesso);
        $sql->bindValue(":idDesp", $idDespesa);
        $sql->execute();
    }
    
    public function delDespesa($idDespesa) {
        
        $sql = $this->db->prepare("DELETE FROM despesas WHERE idDespesas = :idDesp");
        $sql->bindValue(":idDesp", $idDespesa);
        $sql->execute();
    }
    
    public function editProcesso($num, $juiz, $adv, $adv2, $cliente, $pessoa2, $fase, $vara, $posicao, $conclusao, $idProcesso) {
        
        
        if ($conclusao != 0) {
            $sql = $this->db->prepare("UPDATE processo SET NumeroProcesso = :nome, Juiz = :juiz, advogado2 = :adv2, pessoa2 = :pessoa2, idPosicao = :posicao, idContato = :cliente, idStatus_Processo = :status_processo, idVara = :vara, idAdvogado = :adv, Conclusao_idConclusao = :conclusao WHERE idProcesso = :id");
            $sql->bindValue(":conclusao", $conclusao);
        }else{
            $sql = $this->db->prepare("UPDATE processo SET NumeroProcesso = :nome, Juiz = :juiz, advogado2 = :adv2, pessoa2 = :pessoa2, idPosicao = :posicao, idContato = :cliente, idStatus_Processo = :status_processo, idVara = :vara, idAdvogado = :adv WHERE idProcesso = :id");
        }

        $sql->bindvalue(":nome", $num);
        $sql->bindvalue(":juiz", $juiz);
        $sql->bindvalue(":adv2", $adv2);
        $sql->bindvalue(":cliente", $cliente);
        $sql->bindvalue(":pessoa2", $pessoa2);
        $sql->bindvalue(":posicao", $posicao);
        $sql->bindvalue(":status_processo", $fase);
        $sql->bindvalue(":vara", $vara);
        $sql->bindvalue(":adv", $adv);
        $sql->bindvalue(":id", $idProcesso);
        $sql->execute();
        
    }
    
    public function delProcesso($idProcesso) {
        $sql = $this->db->prepare("DELETE FROM processo WHERE idProcesso = :id");
        $sql->bindValue(":id", $idProcesso);
        $sql->execute();
    }
    
    public function addAndamento($data, $texto, $idProcesso) {
        
        $sql = $this->db->prepare("INSERT INTO andamento SET DataAndamento = :dataAndamento, Texto = :texto, Processo_idProcesso = :processo");
        $sql->bindvalue(":dataAndamento", $data);
        $sql->bindvalue(":texto", $texto);
        $sql->bindvalue(":processo", $idProcesso);
        $sql->execute();
        
    }
    
    public function addArquivo($data, $texto, $arquivo, $idProcesso) {
        
        $sql = $this->db->prepare("INSERT INTO arquivo SET DataArquivo = :dataArq, Arquivo = :arq, Descricao = :descricao, idProcesso = :processo");
        $sql->bindvalue(":dataArq", $data);
        $sql->bindvalue(":arq", $arquivo);
        $sql->bindvalue(":descricao", $texto);
        $sql->bindvalue(":processo", $idProcesso);
        $sql->execute();
        
    }
    
    public function editArquivo($data, $texto, $arquivo, $idProcesso, $idArquivo) {
        
        $sql = $this->db->prepare("UPDATE arquivo SET DataArquivo = :dataArq, Arquivo = :arq, Descricao = :descricao WHERE idArquivo = :idArq AND idProcesso = :processo");
        $sql->bindvalue(":dataArq", $data);
        $sql->bindvalue(":arq", $arquivo);
        $sql->bindvalue(":idArq", $idArquivo);
        $sql->bindvalue(":descricao", $texto);
        $sql->bindvalue(":processo", $idProcesso);
        $sql->execute();
        
    }
    
    public function editSemArquivo($data, $texto, $idProcesso, $idArquivo) {
        
        $sql = $this->db->prepare("UPDATE arquivo SET DataArquivo = :dataArq, Descricao = :descricao WHERE idArquivo = :idArq AND idProcesso = :processo");
        $sql->bindvalue(":dataArq", $data);
        $sql->bindvalue(":idArq", $idArquivo);
        $sql->bindvalue(":descricao", $texto);
        $sql->bindvalue(":processo", $idProcesso);
        $sql->execute();
        
    }
    
    public function delArquivo($idArquivo) {
        
        $sql = $this->db->prepare("DELETE FROM arquivo WHERE idArquivo = :idArq");
        $sql->bindvalue(":idArq", $idArquivo);
        $sql->execute();
        
    }
    
    public function getArquivoById($idArquivo) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM arquivo WHERE idArquivo = :idArq");
        $sql->bindvalue(":idArq", $idArquivo);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function editAndamento($data, $texto, $idProcesso, $idAndamento) {
        
        $sql = $this->db->prepare("UPDATE andamento SET DataAndamento = :dataAndamento, Texto = :texto WHERE idAndamento = :idAnd AND Processo_idProcesso = :processo");
        $sql->bindvalue(":dataAndamento", $data);
        $sql->bindvalue(":texto", $texto);
        $sql->bindvalue(":processo", $idProcesso);
        $sql->bindvalue(":idAnd", $idAndamento);
        $sql->execute();
    }
    
    public function delAndamento($idAndamento) {
        
        $sql = $this->db->prepare("DELETE FROM andamento WHERE idAndamento = :idAnd");
        $sql->bindvalue(":idAnd", $idAndamento);
        $sql->execute();
    }
    
    public function getAndamentoByProcesso($processo) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM andamento WHERE Processo_idProcesso = :id");
        $sql->bindValue(":id", $processo);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getArquivoByProcesso($processo) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM arquivo WHERE idProcesso = :id");
        $sql->bindValue(":id", $processo);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }else{
            
        }
        
        return $array;
    }
    
}
