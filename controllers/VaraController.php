<?php

class VaraController extends Controlador{
    
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
        
        $c = new Vara();
        
        $dados['varas'] = $c->getVaras();
        
        $this->loadTemplate("vara", $dados);
    }
    
    public function add(){
        $dados = array();
        $usuario = new Usuario();
        $dados['dados_user'] = $usuario->getDadosUser();
        //-----------------------------------------------------------------//
        
        $c = new Vara();
        
        if (isset($_POST['vara']) && !empty($_POST['vara'])) {
            $vara = utf8_decode(addslashes($_POST['vara']));
           
            
            $c->addVara($vara);
            header("Location: ".HOME."/vara");
        }
        
        $this->loadTemplate("addVara", $dados);
    }
    
    public function view($id){
        $dados = array();
        $usuario = new Usuario();
        $dados['dados_user'] = $usuario->getDadosUser();
        //-----------------------------------------------------------------//
        
        $c = new Vara();
        
        $dados['vara'] = $c->getVaraById($id);
        
        $this->loadTemplate("viewVara", $dados);
    }
    
    public function edit($id){
        $dados = array();
        $usuario = new Usuario();
        $dados['dados_user'] = $usuario->getDadosUser();
        //-----------------------------------------------------------------//
        
        $c = new Vara();
        
        if (isset($_POST['vara']) && !empty($_POST['vara'])) {
            $vara = utf8_decode(addslashes($_POST['vara']));
            
            $c->updateVara($vara, $id);
            header("Location: ".HOME."/vara");
        }
        $dados['vara'] = $c->getVaraById($id);
        
        $this->loadTemplate("editVara", $dados);
    }
    
    public function del($id) {
        $c = new Vara();
        $c->deleteVara($id);
        header("Location: ".HOME."/vara");
    }
    
}
