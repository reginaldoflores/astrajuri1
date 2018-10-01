<?php

class AjaxfullController extends Controlador{
    
     public function __construct() {
        parent::__construct();
        
        $usuario = new Usuario();
        
        if (!$usuario->isLogged()) {
            header("Location: ".HOME."/login");
        }
        
    }
    
    public function index(){
        $dados = array(
            'erro' => false
        );

        $c = new Cliente();
        
        if (isset($_POST['pessoa']) && !empty($_POST['pessoa'])) {
            $pessoa = preg_replace("/[^0-9]/", "", addslashes($_POST['pessoa']));
                        
            $brasil = array();
            
            if ($c->validar_cnpj($pessoa) && (strlen($pessoa) == 14)) {
                $brasil = $c->getPessoaJuridicaByCNPJ($pessoa);
                
                $dados['cnpj'] = $brasil['CNPJ'];
                $dados['nome_fantasia'] = $brasil['Nome_Fantasia'];
                $dados['insc_estadual'] = $brasil['Insc_Estadual'];
                $dados['insc_municipal'] = $brasil['Insc_Municipal'];
                
            }elseif(($c->validaCPF($pessoa)) && (strlen($pessoa) == 11)){
                $brasil = $c->getPessoaFisicaByCPF($pessoa);
                
                $dados['cpf'] = $brasil['CPF'];
                $dados['nome'] = utf8_encode($brasil['Nome']);
                $dados['data_nasc'] = $brasil['Data_Nasc'];
                $dados['cnh'] = $brasil['CNH'];
                $dados['titulo_de_eleitor'] = $brasil['Titulo_de_Eleitor'];
                $dados['rg'] = $brasil['RG'];
            }else{
                $dados['erro'] = true;
                echo json_encode($dados);exit;
            }
                $dados['celular'] = $brasil['telefone']['Celular'];
                $dados['residencial'] = $brasil['telefone']['Residencial'];
                $dados['comercial'] = $brasil['telefone']['Comercial'];
                $dados['uf'] = $brasil['endereco']['UF'];
                $dados['cep'] = $brasil['endereco']['CEP'];
                $dados['logradouro'] = utf8_encode($brasil['endereco']['Logradouro']);
                $dados['numero'] = $brasil['endereco']['Numero'];
                $dados['cidade'] = utf8_encode($brasil['endereco']['Cidade']);
                $dados['bairro'] = utf8_encode($brasil['endereco']['Bairro']);
                $dados['complemento'] = utf8_encode($brasil['endereco']['Complemento']);
                $dados['email'] = utf8_encode($brasil['email']);
        }
        
        echo json_encode($dados);
        exit;
    }
    
    public function usuarios() {
        $dados = array(
            'erro' => true
        );
        
        $c = new Cliente();
        
        if (isset($_POST['pessoa']) && !empty($_POST['pessoa'])) {
            $cpf = preg_replace("/[^0-9]/", "", addslashes($_POST['pessoa']));
                        
            $usuario = new Usuario();
            
            $users = array();
            
            if ($c->validaCPF($cpf)) {
                $users['pessoa_fisica']     = $usuario->getPessoaByCPF($cpf);
                $users['usuario']           = $usuario->getUsuarioByIdPF($users['pessoa_fisica']['idPessoa_Fisica']);
                $users['telefone'] = $usuario->getTelefoneByContato($users['pessoa_fisica']['Contato_idContato']);
                $users['contato'] = $usuario->getContatoById($users['pessoa_fisica']['Contato_idContato']);
                $users['endereco'] = $usuario->getEnderecoById($users['contato']['idEndereco']);
                
                $users['advogado'] = $usuario->getAdvogadoByIdUsuario($users['usuario']['idUsuario']);
                
                if (count($users['advogado']) > 0) {
                    $dados['oab'] = $users['advogado']['OAB'];
                }
                                
                $dados['login'] = utf8_encode($users['usuario']['Login']);
                $dados['nomePerfil'] = $users['usuario']['idPerfil'];
                $dados['cpf'] = $users['pessoa_fisica']['CPF'];
                $dados['idPF'] = $users['pessoa_fisica']['idPessoa_Fisica'];
                $dados['nome'] = utf8_encode($users['pessoa_fisica']['Nome']);
                $dados['rg'] = $users['pessoa_fisica']['RG'];
                $dados['cnh'] = $users['pessoa_fisica']['CNH'];
                $dados['titulo'] = $users['pessoa_fisica']['Titulo_de_Eleitor'];
                $dados['nascimento'] = $users['pessoa_fisica']['Data_Nasc'];
                $dados['residencial'] = $users['telefone']['Residencial'];
                $dados['celular'] = $users['telefone']['Celular'];
                $dados['email'] = utf8_encode($users['contato']['Email']);
                $dados['uf'] = $users['endereco']['UF'];
                $dados['cep'] = $users['endereco']['CEP'];
                $dados['rua'] = utf8_encode($users['endereco']['Logradouro']);
                $dados['numero'] = $users['endereco']['Numero'];
                $dados['bairro'] = utf8_encode($users['endereco']['Bairro']);
                $dados['complemento'] = utf8_encode($users['endereco']['Complemento']);
                $dados['cidade'] = utf8_encode($users['endereco']['Cidade']);
                $dados['erro'] = false;
                
                

            } else {
                $dados['erro'] = true;
                echo json_encode($dados);exit;
            }
            
        }
        
        echo json_encode($dados);
        exit;
        
    }
    
    public function usuariosOAB() {
        $dados = array(
            'erro' => true
        );
        
        $c = new Cliente();
        
        if (isset($_POST['pessoa']) && !empty($_POST['pessoa'])) {
            $oab = addslashes($_POST['pessoa']);
                        
            $usuario = new Usuario();
            
            $users = array();
            
            
                $users['advogado'] = $usuario->getAdvogadoByOAB($oab);
                $users['usuario']           = $usuario->getUsuarioById($users['advogado']['Usuario_idUsuario']);
                $users['pessoa_fisica']     = $usuario->getPessoaById($users['usuario']['Pessoa_Fisica_idPessoa_Fisica']);
                
                $users['telefone'] = $usuario->getTelefoneByContato($users['pessoa_fisica']['Contato_idContato']);
                $users['contato'] = $usuario->getContatoById($users['pessoa_fisica']['Contato_idContato']);
                $users['endereco'] = $usuario->getEnderecoById($users['contato']['idEndereco']);
                
                // Exibição dos Dados
                $dados['oab'] = $users['advogado']['OAB'];            
                $dados['login'] = utf8_encode($users['usuario']['Login']);
                $dados['nomePerfil'] = $users['usuario']['idPerfil'];
                $dados['cpf'] = $users['pessoa_fisica']['CPF'];
                $dados['idPF'] = $users['pessoa_fisica']['idPessoa_Fisica'];
                $dados['nome'] = utf8_encode($users['pessoa_fisica']['Nome']);
                $dados['rg'] = $users['pessoa_fisica']['RG'];
                $dados['cnh'] = $users['pessoa_fisica']['CNH'];
                $dados['titulo'] = $users['pessoa_fisica']['Titulo_de_Eleitor'];
                $dados['nascimento'] = $users['pessoa_fisica']['Data_Nasc'];
                $dados['residencial'] = $users['telefone']['Residencial'];
                $dados['celular'] = $users['telefone']['Celular'];
                $dados['email'] = utf8_encode($users['contato']['Email']);
                $dados['uf'] = $users['endereco']['UF'];
                $dados['cep'] = $users['endereco']['CEP'];
                $dados['rua'] = utf8_encode($users['endereco']['Logradouro']);
                $dados['numero'] = $users['endereco']['Numero'];
                $dados['bairro'] = utf8_encode($users['endereco']['Bairro']);
                $dados['complemento'] = utf8_encode($users['endereco']['Complemento']);
                $dados['cidade'] = utf8_encode($users['endereco']['Cidade']);
                $dados['erro'] = false;
            
        }
        
        echo json_encode($dados);
        exit;
        
    }
    
    public function comarca() {
        $dados = array(
            'erro' => true
        );
        
        $c = new Comarca();
        
        if (isset($_POST['com']) && !empty($_POST['com'])) {
            $comarca = addslashes(utf8_decode($_POST['com']));
            
            $comc = $c->getComarcaByNome($comarca);
            
            if (count($comc) > 0) {
                $dados['idCom'] = $comc['idComarca'];
                $dados['nome'] = utf8_encode($comc['Nome']);
                $dados['endereco'] = utf8_encode($comc['Endereco']);
                $dados['erro'] = false;
            }else{
                $dados['erro'] = true;
            }
            
        }
        
        echo json_encode($dados);
        exit;
        
    }
    
    public function vara() {
        $dados = array(
            'erro' => true
        );
        
        $v = new Vara();
        $c = new Comarca();
        
        if (isset($_POST['vara']) && !empty($_POST['vara'])) {
            $var = addslashes(utf8_decode($_POST['vara']));
            
            $vars = $v->getVaraByNome($var);
            
            if (count($vars) > 0) {
                $dados['varaId'] = $vars['idVara'];
                $dados['varaNome'] = utf8_encode($vars['Nome']);
                $comarca = $c->getComarcaById($vars['Comarca_idComarca']);
                $dados['varaComarca'] = utf8_encode($comarca['Nome']);
                $dados['erro'] = false;
            }else{
                $dados['erro'] = true;
            }
            
        }
        
        echo json_encode($dados);
        exit;
        
    }
    
    public function getVara() {
        $dados = array(
            'erro' => true
        );
        
        $v = new Vara();
        
        if (isset($_POST['comar']) && !empty($_POST['comar'])) {
            $comNome = addslashes(utf8_decode($_POST['comar']));
            
            $com = new Comarca();
            
            $comar = $com->getComarcaByNome($comNome);
            $idComarca = $comar['idComarca'];
            $dados['endereco'] = utf8_encode($comar['Endereco']);
            
            $vars = $v->getVaraByComarca($idComarca);
                        
            if (count($vars) > 0) {
                                    
                    foreach ($vars as $vara):
                        $dados['vara'][] = utf8_encode($vara['Nome']);
                    endforeach;
                $dados['erro'] = false;
            }else{
                $dados['erro'] = true;
            }
            
        }
        
        echo json_encode($dados);
        exit;
        
    }
    
    public function processo() {
        $dados = array(
            'erro' => TRUE
        );
        
        if (isset($_POST['numero']) && !empty($_POST['numero'])) {
            $numero = preg_replace("/[^0-9]/", "", addslashes($_POST['numero']));

            $processo = new Processo();
            $c = new Cliente();
            $vara = new Vara();
            $comarca = new Comarca();
            
            $proc = $processo->getProcessoByNum($numero);
            
            $cliente = $processo->getClienteByContato($proc['idContato']);
            $advogado = $processo->getAdvogadoById($proc['idAdvogado']);
            $dadosAdvogado = $c->getPessoaFisicaById($advogado['PF']);
            $var = $vara->getVaraById($proc['idVara']);
            $comc = $comarca->getComarcaById($var['Comarca_idComarca']);
            
            //------------------------//
            
            $dados['numero'] = utf8_encode($proc['NumeroProcesso']);
            
            $dados['posicao'] = $proc['idPosicao'];
            
            if ($dados['posicao'] == 1 || $dados['posicao'] == 2) {
                $dados['instancia'] = 1;
            }else{
                $dados['instancia'] = 2;
            }
            
            $dados['cliente'] = utf8_encode($cliente['Nome']);
            $dados['comarca'] = utf8_encode($comc['Nome']);
            $dados['endereco'] = utf8_encode($comc['Endereco']);
            $dados['vara'] = utf8_encode($var['Nome']);
            $dados['advogado'] = utf8_encode($dadosAdvogado['Nome']);
            $dados['pessoa2'] = utf8_encode($proc['pessoa2']);
            $dados['advogado2'] = utf8_encode($proc['advogado2']);
            $dados['juiz'] = utf8_encode($proc['Juiz']);
            $dados['fase'] = $proc['idStatus_Processo'];
            $dados['conclusao'] = $proc['Conclusao_idConclusao'];
            $dados['idProcesso'] = $proc['idProcesso'];
            $dados['idVara'] = $proc['idVara'];
            
            $despesas = $processo->getDespesaByProcesso($proc['idProcesso']);
            
            $dados['qtdDespesas'] = count($despesas);
                        
            foreach ($despesas as $desp):
                $dados['tipodesp'][] = $desp['Tipo'];
                $dados['valordesp'][] = $desp['Valor'];
                $dados['datadesp'][] = $desp['DataDespesa'];
                $dados['datadespView'][] = date('d/m/Y', strtotime($desp['DataDespesa']));
                $dados['notasdesp'][] = $desp['Descricao'];
                $dados['iddesp'][] = $desp['idDespesas'];
            endforeach;
            
            $andamento = $processo->getAndamentoByProcesso($proc['idProcesso']);
            
            
            
            $dados['qtdAndamento'] = count($andamento);
                        
            foreach ($andamento as $and):
                $dados['dataAndamentoView'][] = date('d/m/Y', strtotime($and['DataAndamento']))." ".date('H:i', strtotime($and['DataAndamento']));
                $dados['dataAndamento'][] = date('Y-m-d', strtotime($and['DataAndamento']))."T".date('H:i:s', strtotime($and['DataAndamento']));
                $dados['textoAndamento'][] = $and['Texto'];
                $dados['idAndamento'][] = $and['idAndamento'];
            endforeach;
            
            $arquivo = $processo->getArquivoByProcesso($proc['idProcesso']);
            
            
            
            $dados['qtdArquivo'] = count($arquivo);
                        
            foreach ($arquivo as $arq):
                $dados['dataArquivo'][] = $arq['DataArquivo'];
                $dados['dataArquivoView'][] = date('d/m/Y', strtotime($arq['DataArquivo']));
                $dados['nomeArquivo'][] = $arq['Arquivo'];
                $dados['textoDescricao'][] = $arq['Descricao'];
                $dados['idArquivo'][] = $arq['idArquivo'];
            endforeach;
            
            $dados['erro'] = false;
        }
        
        echo json_encode($dados);
        exit;
    }
    
}
