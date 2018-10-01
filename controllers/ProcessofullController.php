<?php

 class ProcessofullController extends Controlador{
    
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
        
        $processo = new Processo();
        $comarca = new Comarca();
        $cliente = new Cliente();
        $vara = new Vara();

        
        if (isset($_POST['numero']) && !empty($_POST['numero'])) {
                        
            $numero = preg_replace("/[^0-9]/", "", addslashes($_POST['numero']));
            $posicao = addslashes($_POST['posicao']);
            $clienteNome = utf8_decode(addslashes($_POST['cliente']));
            $pessoa2 = utf8_decode(addslashes($_POST['pessoa2']));
            $idAdvogado = addslashes($_POST['idAdv']);
            $advogado2 = utf8_decode(addslashes($_POST['advogado2']));
            $juiz = utf8_decode(addslashes($_POST['juiz']));
            $var = utf8_decode(addslashes($_POST['varaLista']));
            $fase = addslashes($_POST['fase']);
            if (isset($_POST['conclusao']) && !empty($_POST['conclusao'])) {
                $conclusao = addslashes($_POST['conclusao']);
            }else{
                $conclusao = 0;
            }
            
            $situacao = addslashes($_POST['situacao']);
            
            $va = $vara->getVaraByNome($var);
            $idVara = $va['idVara'];
            
            $cli = $processo->getClienteByNome($clienteNome);
            $idCliente = $cli['Contato_idContato'];
             
            if (isset($situacao) && !empty($situacao)) {
                if ($situacao == "add") {
                    $processo->addProcesso($numero, $juiz, $idAdvogado, $advogado2, $idCliente, $pessoa2, $fase, $idVara, $posicao);
                    header("Location: ".HOME."/processofull");
                }elseif ($situacao == "update") {
                    if (isset($_POST['idProc']) && !empty($_POST['idProc'])) {
                        $idProcesso = addslashes($_POST['idProc']);
                        
                        // DESPESAS
                        if (isset($_POST['tipo-despesa']) && !empty($_POST['tipo-despesa'])) {
                            $tipoDespesa = $processo->getTipoDespesaByNome(utf8_decode(addslashes($_POST['tipo-despesa'])));
                            $despesa = $tipoDespesa['idTipo_Despesas'];
                            $dataDespesa = addslashes($_POST['data-despesa']);
                            $valorDespesa = addslashes($_POST['valor-despesa']);
                            $notasDespesa = utf8_decode(addslashes($_POST['valor-notas']));
                            $processo->addDespesa($valorDespesa, $notasDespesa, $dataDespesa, $despesa, $idProcesso);
                        } elseif(isset ($_POST['idIncValor']) && !empty ($_POST['idIncValor'])) {
                            $idDespesa = addslashes($_POST['idIncValor']);
                            $tipoDespesaEdit = $processo->getTipoDespesaByNome(utf8_decode(addslashes($_POST['tipo-despesaEdit'])));
                            $despesaEdit = $tipoDespesaEdit['idTipo_Despesas'];
                            $dataDespesaEdit = addslashes($_POST['data-despesaEdit']);
                            $valorDespesaEdit = addslashes($_POST['valor-despesaEdit']);
                            $notasDespesaEdit = utf8_decode(addslashes($_POST['valor-notasEdit']));
                            $processo->editDespesa($valorDespesaEdit, $notasDespesaEdit, $dataDespesaEdit, $despesaEdit, $idProcesso, $idDespesa);
                        }
                        
                        // ANDAMENTO
                        if (isset($_POST['dataAndamento']) && !empty($_POST['dataAndamento'])) {
                            $dataAnd = explode('T',addslashes($_POST['dataAndamento']));
                            $dataAndamento = $dataAnd[0]." ".$dataAnd[1].":00";
                            $textoAndamento = utf8_decode(addslashes($_POST['textoDescricao']));
                            $processo->addAndamento($dataAndamento, $textoAndamento, $idProcesso);
                        } elseif(isset ($_POST['idAndamento']) && !empty ($_POST['idAndamento'])) {
                            $idAndamento = addslashes($_POST['idAndamento']);
                            $dataAndEdit = explode('T',addslashes($_POST['dataAndamentoEdit']));
                            $dataAndamentoEdit = $dataAndEdit[0]." ".$dataAndEdit[1].":00";
                            $textoAndamentoEdit = utf8_decode(addslashes($_POST['textoDescricaoEdit']));
                            $processo->editAndamento($dataAndamentoEdit, $textoAndamentoEdit, $idProcesso, $idAndamento);
                        }
                        
                        // ARQUIVO
                        if (isset($_POST['dataArquivo']) && !empty($_POST['dataArquivo'])) {
                            $dataArquivo = addslashes($_POST['dataArquivo']);
                            $descricaoArquivo = utf8_decode(addslashes($_POST['descricaoArquivo']));
                                             
                            if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {
            
                                $formatos = array('application/pdf');

                                if (in_array($_FILES['arquivo']['type'], $formatos)) {

                                    $nome = md5($_FILES['arquivo']['name'].time().rand(0,999)).'.pdf';

                                    move_uploaded_file($_FILES['arquivo']['tmp_name'], 'assets/arquivos/'.$nome);

                                }

                            }
                            
                            
                            $processo->addArquivo($dataArquivo, $descricaoArquivo, $nome, $idProcesso);
                        } elseif(isset ($_POST['idArquivo']) && !empty ($_POST['idArquivo'])) {
                            $idArquivo = addslashes($_POST['idArquivo']);
                            $dataArquivoEdit = addslashes($_POST['dataArquivoEdit']);
                            $descricaoArquivoEdit = utf8_decode(addslashes($_POST['descricaoArquivoEdit']));
                            
                            $arquivoAntetior = addslashes($_POST['arquivoAnteriorEdit']);
                            
                            if (isset($_FILES['arquivoEdit']) && !empty($_FILES['arquivoEdit']['tmp_name'])) {
            
                                $formatos = array('application/pdf');

                                if (in_array($_FILES['arquivoEdit']['type'], $formatos)) {

                                    $nome = md5($_FILES['arquivoEdit']['name'].time().rand(0,999)).'.pdf';

                                    move_uploaded_file($_FILES['arquivoEdit']['tmp_name'], 'assets/arquivos/'.$nome);
                                    
                                    unlink("assets/arquivos/".$arquivoAntetior);
                                    
                                    $processo->editArquivo($dataArquivoEdit, $descricaoArquivoEdit, $nome, $idProcesso, $idArquivo);

                                }

                            }else{
                                $processo->editSemArquivo($dataArquivoEdit, $descricaoArquivoEdit, $idProcesso, $idArquivo);
                            }
                            
                        }
                        
                        $processo->editProcesso($numero, $juiz, $idAdvogado, $advogado2, $idCliente, $pessoa2, $fase, $idVara, $posicao, $conclusao, $idProcesso);
                        header("Location: ".HOME."/processofull");
                    }
                }
            }
            
            
        }
        
        $dados['despesas'] = $processo->getDespesas();
        $dados['clientes'] = $cliente->getClientesFull();
        $dados['conclusoes'] = $processo->getConclusoes();
        $dados['advogados'] = $processo->getAdvogadosFull();
        $dados['instancias'] = $processo->getInstancias();
        $dados['comarcas'] = $comarca->getComarcas();
        $dados['fases'] = $processo->getFases();
        $dados['posicoes'] = $processo->getPosicoes();
        
        
        $this->loadTemplate("processos", $dados);
    }
    
    public function del($idProcesso) {
        $processo = new Processo();
        $processo->delProcesso($idProcesso);
        header("Location: ".HOME."/processofull");
    }
    public function deldespesa($idDepesa) {
        $processo = new Processo();
        $processo->delDespesa($idDepesa);
        header("Location: ".HOME."/processofull");
    }
    
    public function delandamento($idandamento) {
        $processo = new Processo();
        $processo->delAndamento($idandamento);
        header("Location: ".HOME."/processofull");
    }
    
    public function delarquivo($idarquivo) {
        $processo = new Processo();
        
        $arquivo = $processo->getArquivoById($idarquivo);
        unlink("assets/arquivos/".$arquivo['Arquivo']);
                
        $processo->delArquivo($idarquivo);
        header("Location: ".HOME."/processofull");
    }
    
 }
//teste 
