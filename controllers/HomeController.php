<?php

class HomeController extends Controlador{

    public function __construct() {
        parent::__construct();
        
        $usuario = new Usuario();
        
        if (!$usuario->isLogged()) {
            header("Location: ".HOME."/login");
        }
    }
    
    public function index(){
        $dados = array();
        $usuario = new Usuario();
        $dados['dados_user'] = $usuario->getDadosUser();
        //-----------------------------------------------------------------//
        
        $comp = new Compromisso();
        $cliente = new Cliente();
        $processo = new Processo();
        
        $testeAdvogado = $comp->isAdvogado($dados['dados_user']['idUsuario']);
        if ($dados['dados_user']['idPerfil'] != 3) {
            if (count($testeAdvogado) > 0) {
                $dados['advogadoTrue'] = 'sim';
            }
        }
        
        
        if (isset($_POST['title']) && !empty($_POST['title'])) {
            
            $compromisso = utf8_decode(addslashes($_POST['title']));
            $cor = utf8_decode(addslashes($_POST['color']));
            $start = utf8_decode(addslashes($_POST['start']));
            $end = utf8_decode(addslashes($_POST['end']));
            $clienteNome = utf8_decode(addslashes($_POST['cliente']));
            $texto = utf8_decode(addslashes($_POST['texto']));
            $idAdvogado = addslashes($_POST['idAdv']);
                       
            $cli = $processo->getClienteByNome($clienteNome);
            
            if (count($cli) > 0) {
                
            }else{
                $cli = $comp->getPessoaJuridicaByName($clienteNome);
            }
                        
            if (isset($dados['advogadoTrue']) && !empty($dados['advogadoTrue']) && $dados['advogadoTrue'] == 'sim') {
                $idAdvogado = $testeAdvogado['idAdvogado'];
            }
            
            if (isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 0) {
                if(!empty($compromisso) && !empty($cor) && !empty($start) && !empty($end) && !empty($texto) && !empty($idAdvogado)){
                    $idCompromisso = addslashes($_POST['id']);
                //Converter a data e hora do formato brasileiro para o formato do Banco de Dados
                $data = explode(" ", $start);
                list($date, $hora) = $data;
                $data_sem_barra = array_reverse(explode("/", $date));
                $data_sem_barra = implode("-", $data_sem_barra);
                $start_sem_barra = $data_sem_barra . " " . $hora;

                $data = explode(" ", $end);
                list($date, $hora) = $data;
                $data_sem_barra = array_reverse(explode("/", $date));
                $data_sem_barra = implode("-", $data_sem_barra);
                $end_sem_barra = $data_sem_barra . " " . $hora;
                
                $comp->updateComprimisso($compromisso, $cor, $start_sem_barra, $end_sem_barra, $texto, $cli['Contato_idContato'], $idAdvogado, $dados['dados_user']['idUsuario'], $idCompromisso);
                header("Location: ".HOME);
                
                }else{
                    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao editar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                }
                
            }else{
                if(!empty($compromisso) && !empty($cor) && !empty($start) && !empty($end) && !empty($texto) && !empty($idAdvogado)){

                    //Converter a data e hora do formato brasileiro para o formato do Banco de Dados
                    $data = explode(" ", $start);
                    list($date, $hora) = $data;
                    $data_sem_barra = array_reverse(explode("/", $date));
                    $data_sem_barra = implode("-", $data_sem_barra);
                    $start_sem_barra = $data_sem_barra . " " . $hora;

                    $data = explode(" ", $end);
                    list($date, $hora) = $data;
                    $data_sem_barra = array_reverse(explode("/", $date));
                    $data_sem_barra = implode("-", $data_sem_barra);
                    $end_sem_barra = $data_sem_barra . " " . $hora;
                    
                    $comp->addComprimisso($compromisso, $cor, $start_sem_barra, $end_sem_barra, $texto, $cli['Contato_idContato'], $idAdvogado, $dados['dados_user']['idUsuario']);        
                    header("Location: ".HOME);
                }else{
                    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                }
            }
            
        }
        
        if ($dados['dados_user']['idPerfil'] == 1 || $dados['dados_user']['idPerfil'] == 3) {
            $dados['eventos'] = $comp->getCompromissosFull();
        }else if($dados['dados_user']['idPerfil'] == 2){
            $dados['eventos'] = $comp->getCompromissos($testeAdvogado['idAdvogado']);
        }
        
        $dados['advogados'] = $processo->getAdvogadosFull();
        $dados['clientes'] = $cliente->getClientesFull();
        $this->loadTemplate("home", $dados);
    }
 
    public function del($idCompromisso) {
        $c = new Compromisso();
        $c->delCompromisso($idCompromisso);
        header("Location: ".HOME);
    }

}