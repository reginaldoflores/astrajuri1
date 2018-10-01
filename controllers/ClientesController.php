<?php

class ClientesController extends Controlador{

    public function __construct() {
        parent::__construct();
        
        $usuario = new Usuario();
        
        if (!$usuario->isLogged()) {
            header("Location: ".HOME."/login");
        }
        
        $dados = $usuario->getDadosUser();
        
        if ($dados['idPerfil'] == 1) {
            header("Location: ".HOME);
        }
        
    }
        
    public function index(){
        $dados = array();
        $usuario = new Usuario();
        $dados['dados_user'] = $usuario->getDadosUser();
        //-----------------------------------------------------------------//

        $cliente = new Cliente();
                
        if (isset($_POST['situacao']) && !empty($_POST['situacao'])) {
            $situacao = addslashes($_POST['situacao']);
            
            
                $cpf_cnpj = preg_replace("/[^0-9]/", "", addslashes($_POST['cpf_cnpf']));
                
                $nome = utf8_decode(addslashes($_POST['nome']));
                $email = addslashes($_POST['email']);
                                
                $telefone = preg_replace("/[^0-9]/", "", addslashes($_POST['tel']));
                $celular = preg_replace("/[^0-9]/", "", addslashes($_POST['celular']));
                
                $rg = preg_replace("/[^0-9]/", "", addslashes($_POST['rg']));
                $cnh = addslashes($_POST['cnh']);
                $titulo_de_eleitor = addslashes($_POST['titulo_de_eleitor']);
                $data_nasc = addslashes($_POST['data_nasc']);
                
                $insc_municipal = addslashes($_POST['insc_municipal']);
                $insc_estadual = preg_replace("/[^0-9]/", "", addslashes($_POST['insc_estadual']));
                
                $cep = preg_replace("/[^0-9]/", "", addslashes($_POST['cep']));
                $logradouro = utf8_decode(addslashes($_POST['logradouro']));
                $numero = addslashes($_POST['numero']);
                $bairro = utf8_decode(addslashes($_POST['bairro']));
                $complemento = utf8_decode(addslashes($_POST['complemento']));
                $cidade = utf8_decode(addslashes($_POST['cidade']));
                $estado = addslashes($_POST['estado']);
                
            if ($situacao == "add") {
                    
                if ((isset($cpf_cnpj) && !empty($cpf_cnpj)) && strlen($cpf_cnpj) == 11) {
                    $cliente->addPessoaFisica($cep, $logradouro, $numero, $bairro, $complemento, $cidade, $estado, $email, $telefone, $celular, $nome, $rg, $cnh, $titulo_de_eleitor, $data_nasc, $cpf_cnpj);
                }elseif ((isset($cpf_cnpj) && !empty($cpf_cnpj)) && strlen($cpf_cnpj) == 14) {
                    $cliente->addPessoaJuridica($cep, $logradouro, $numero, $bairro, $complemento, $cidade, $estado, $email, $telefone, $celular, $nome, $insc_municipal, $insc_estadual, $cpf_cnpj);
                }
                
            }elseif ($situacao == "update") {
                
                if ((isset($cpf_cnpj) && !empty($cpf_cnpj)) && strlen($cpf_cnpj) == 11) {
                    $cliente->updatePessoaFisica($cep, $logradouro, $numero, $bairro, $complemento, $cidade, $estado, $email, $telefone, $celular, $nome, $rg, $cnh, $titulo_de_eleitor, $data_nasc, $cpf_cnpj);
                }elseif ((isset($cpf_cnpj) && !empty($cpf_cnpj)) && strlen($cpf_cnpj) == 14){
                    $cliente->updatePessoaJuridica($cep, $logradouro, $numero, $bairro, $complemento, $cidade, $estado, $email, $telefone, $celular, $nome, $insc_municipal, $insc_estadual, $cpf_cnpj);
                }
                
            }else{
                $dados['error'] = "Não Existe!";
            }
        }

        $this->loadTemplate("clientes", $dados);
    }

    public function del($cpf_cnpj) {
        
        $cliente = new Cliente();
        
        $cpf_cnpj = preg_replace("/[^0-9]/", "", addslashes($cpf_cnpj));
        
        if (isset($cpf_cnpj) && !empty($cpf_cnpj)) {

            if (strlen($cpf_cnpj) == 11) {
                $cliente->deletePessoaFisica($cpf_cnpj);
            }elseif (strlen($cpf_cnpj) == 14) {
                $cliente->deletePessoaJuridica($cpf_cnpj);
            }
            header("Location: ".HOME."/clientes");
        }   
        
    }
    
}