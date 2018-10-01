<?php

class UsuariosController extends Controlador{

    public function __construct() {
        parent::__construct();
        
        $usuario = new Usuario();
        
        if (!$usuario->isLogged()) {
            header("Location: ".HOME."/login");
        }   
        
        $dados = $usuario->getDadosUser();
        
        if ($dados['idPerfil'] != 3) {
            header("Location: ".HOME);
        }
    }
    
    public function index(){
        $dados = array();
        $usuario = new Usuario();
        $dados['dados_user'] = $usuario->getDadosUser();
        //-----------------------------------------------------------------//
        
        $c = new Cliente();
        
        
        
        if (isset($_POST['cpf']) && !empty($_POST['cpf'])) {
            
            $cpf = preg_replace("/[^0-9]/", "", addslashes($_POST['cpf']));
            $nome = utf8_decode(addslashes($_POST['nome']));
            $email = addslashes($_POST['email']);
            $rg = preg_replace("/[^0-9]/", "", addslashes($_POST['rg']));
            $cnh = preg_replace("/[^0-9]/", "", addslashes($_POST['cnh']));
            $titulo_de_eleitor = preg_replace("/[^0-9]/", "", addslashes($_POST['titulo_de_eleitor']));
            $data_nasc = addslashes($_POST['data_nasc']);
            $tel = preg_replace("/[^0-9]/", "", addslashes($_POST['tel']));
            $celular = preg_replace("/[^0-9]/", "", addslashes($_POST['celular']));
            $cep = preg_replace("/[^0-9]/", "", addslashes($_POST['cep']));
            $logradouro = utf8_decode(addslashes($_POST['logradouro']));
            $numero = addslashes($_POST['numero']);
            $bairro = utf8_decode(addslashes($_POST['bairro']));
            $complemento = utf8_decode(addslashes($_POST['complemento']));
            $cidade = utf8_decode(addslashes($_POST['cidade']));
            $estado = utf8_decode(addslashes($_POST['estado']));
            $perfil = utf8_decode(addslashes($_POST['perfilTipo']));
            $login = utf8_decode(addslashes($_POST['login']));
            $senha = addslashes($_POST['senha']);
            $oab = addslashes($_POST['oab']);
            $situacao = addslashes($_POST['situacao']);
            $idPF = addslashes($_POST['idUser']);
                        
            if ((isset($situacao) && !empty($situacao)) && $situacao == "add") {
                                
                if ($c->validaCPF($cpf) == true) {
                    
                    $usuario->addUsuario($estado, $cep, $logradouro, $numero, $bairro, $complemento, $cidade, $email, $tel, $celular, $cpf, $nome, $rg, $cnh, $titulo_de_eleitor, $data_nasc, $perfil, $oab, $login, $senha);
                    header("Location: ".HOME."/usuarios");
                    
                }else{
                    $dados['erro'] = "CPF inválido";
                }
                
            
                
            }elseif((isset($situacao) && !empty($situacao)) && $situacao == "update"){
                
                if ($c->validaCPF($cpf) == true){
                    
                    if (isset($senha) && !empty($senha) && isset($idPF) && !empty($idPF)) {
                        
                        $usuario->updateSenha($senha, $idPF);
                        header("Location: ".HOME."/usuarios");
                        
                    }
                    
                    if (isset($idPF) && !empty($idPF)) {
                        
                        
                        $usuario->editUsuario($estado, $cep, $logradouro, $numero, $bairro, $complemento, $cidade, $email, $tel, $celular, $cpf, $nome, $rg, $cnh, $titulo_de_eleitor, $data_nasc, $perfil, $oab, $login, $senha, $idPF);
                        header("Location: ".HOME."/usuarios");
                    }
                    
                }else{
                    $dados['erro'] = "CPF inválido";
                }
            }
        }
        
            $dados['perfis'] = $usuario->getPerfis();
        
        $this->loadTemplate("usuarios", $dados);
    }
    
    public function del($idPF) {
        
        $usuario = new Usuario();
        $usuario->delUsuario($idPF);
        header("Location: ".HOME."/usuarios");
    }

}