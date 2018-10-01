<?php

class ComarcaController extends Controlador{

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
        
        $com = new Comarca();
                
        if (isset($_POST['comarca']) && !empty($_POST['comarca'])) {
            $comarca = utf8_decode(addslashes($_POST['comarca']));
            $endereco = utf8_decode(addslashes($_POST['endereco']));
            $situacao = addslashes($_POST['situacao']);
            
            if (isset($situacao) && !empty($situacao)) {
                if ($situacao == "add") {
                    $com->addComarca($comarca, $endereco);
                    header("Location: ".HOME."/comarca");
                }else if ($situacao == "update"){
                    $id = addslashes($_POST['idUser']);
                    if ($id != 0) {
                        $com->updateComarca($comarca, $endereco, $id);
                        header("Location: ".HOME."/comarca");
                    }
                }
            }
            
            
        }
        
        $var = new Vara();
        
        if (isset($_POST['vara']) && !empty($_POST['vara'])) {
                        
            $vara = utf8_decode(addslashes($_POST['vara']));
            $comNome = addslashes($_POST['comarcaLista']);
            $situacao = addslashes($_POST['situacao']);
            
            $comar = $com->getComarcaByNome(utf8_decode($comNome));
            $comc = $comar['idComarca'];
                        
            if (isset($situacao) && !empty($situacao)) {
                if ($situacao == "add") {
                    $var->addVara($vara, $comc);
                    header("Location: ".HOME."/comarca");
                }elseif($situacao == "update"){
                    $idVara = addslashes($_POST['varaUser']);
                    if ($idVara != 0) {
                        $var->updateVara($vara, $idVara);
                        header("Location: ".HOME."/comarca");
                    }
                    
                }
            }
            
        }
                
        $dados['varas'] = $var->getVaras();
        $dados['comarcas'] = $com->getComarcas();
        
        $this->loadTemplate("comarcas", $dados);
    }
    
    public function delComarca($id) {
        $c = new Comarca();
        $c->deleteComarca($id);
        header("Location: ".HOME."/comarca");
    }
    
    public function delVara($id) {
        $c = new Vara();
        $c->deleteVara($id);
        header("Location: ".HOME."/comarca");
    }

}