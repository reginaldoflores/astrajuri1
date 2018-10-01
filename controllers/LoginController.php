<?php

class LoginController extends Controlador{
    
    public function index() {
        $dados = array();
        
        
        $usuario = new Usuario();
        
        if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['senha']) && !empty($_POST['senha']))) {
            $login = addslashes($_POST['login']);
            $senha = addslashes($_POST['senha']);
            
            if ($usuario->logar($login, $senha)) {
                header("Location: ".HOME);
            }else{
                $dados['erro'] = "Login e/ou Senha Errados";
            }
            
        }
        
        $this->loadView("inicio", $dados);
    }
    
//    public function login() {
//        $dados = array();
//        
//        $usuario = new Usuario();
//        
//        if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['senha']) && !empty($_POST['senha']))) {
//            $login = addslashes($_POST['login']);
//            $senha = addslashes($_POST['senha']);
//            
//            if ($usuario->logar($login, $senha)) {
//                header("Location: ".HOME);
//            }else{
//                $dados['erro'] = "Login e/ou Senha Errados";
//            }
//            
//        }
//        
//        $this->loadView("login", $dados);
//    }
    
    public function logout() {
        unset($_SESSION['c_juri']);
        header("Location: ".HOME."/login");
    }
    
}
