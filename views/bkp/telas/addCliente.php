<?php session_start(); require_once '../classes/Usuario.php';?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
        $u = new Usuario();
        if ($u->isLogged() == false): ?>
        <script language="javascript">
            window.location.href = "login.php";
        </script>
        <?php endif; ?>
        
        <title>Astrajuri </title>

        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">

    </head>

    <body class="nav-md">
        
        <?php require_once 'pages/menu.php'; 
        
        require_once '../classes/Cliente.php';
        $c = new Cliente();
        
        
        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
                        
            $nome = utf8_decode(addslashes($_POST['nome']));
            $tipo = addslashes($_POST['tipo']);
            $email = addslashes($_POST['email']);
            $confirm_email = addslashes($_POST['confirm_email']);
            $phone = addslashes($_POST['phone']);
            $cp = addslashes($_POST['cp']);
            $rg = addslashes($_POST['rg']);
            $dataNascimento = addslashes($_POST['dataNascimento']);
            $nameRua = addslashes($_POST['nameRua']);
            $cep = addslashes($_POST['cep']);
            $number = addslashes($_POST['number']);
            $bairro = utf8_decode(addslashes($_POST['bairro']));
            $cidade = utf8_decode(addslashes($_POST['cidade']));
            $uf = addslashes($_POST['uf']);
            $comp = utf8_decode(addslashes($_POST['complement']));
            
            if ($tipo == 'cpf') {
                
                if ($email == $confirm_email) {
                    $c->addClienteFisico($nome, $email, $phone, $cp, $rg, $dataNascimento, $nameRua, $cep, $number, $bairro, $cidade, $uf, $comp);
                    ?>
                    <script language="javascript">
                        window.location.href = "http://localhost/astrajuri/producao/listaCliente.php";
                    </script>
                    <?php   
                }
        
            }elseif ($tipo == 'cnpj') {
                $c->addClienteJuridico();
            }
            
            
        }
        
        ?>

        <div class="right_col" role="main">

            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Novo Cliente </h3>
                    </div>
                </div>
            </div>


            <div class="clearfix"></div>

            <div id="main" class="container-fluid">


                <form method="post" class="form-horizontal form-label-left" novalidate>

                    <form  method="post">
                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content">

                                        </br>

                                        <form method="post" class="form-horizontal form-label-left" novalidate>


                                            <div class="item form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <label class="radio-inline control-label col-md-3 col-sm-3 col-xs-12"><input type="radio" name="tipo" id="inlineRadio1" checked value="cpf"> Pessoa Física
                                                    </label>

                                                    <label class="radio-inline control-label col-md-3 col-sm-3 col-xs-12"><input type="radio" name="tipo" id="inlineRadio2" value="cnpj"> Pessoa Jurídica
                                                    </label>
                                                </div>
                                            </div>			


                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nome" placeholder="Ex: Reginaldo Silva" required="required" type="text">
                                                </div>
                                            </div>


                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>


                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirmar Email <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="email" id="email2" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>


                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel">Telefone <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="tel" id="tel" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>


                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">CPF <span class="required">*</span>
                                                </label>
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <input type="number" id="cpf" name="cp" size="11" required="required" data-validate-length-range="11" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">RG <span class="required">*</span>
                                                </label>
                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                    <input type="number" id="rg" name="rg" size="9" required="required" data-validate-length-range="11" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_nasc">Data Nascimento <span class="required">*</span>
                                                </label>
                                                <div class="col-md-2 col-sm-6 col-xs-12">
                                                    <input type="date" id="data_nasc" name="dataNascimento" required="required" data-validate-length-range="8" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <!-- ENDEREÇO --> </br></br>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cep">CEP <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="cep" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="cep" placeholder="Ex: 26465-569" required="required" type="text">
                                                </div>
                                            </div>
                                            
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Logradouro <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nameRua" placeholder="Ex: Rua, Avenida" required="required" type="text">
                                                </div>
                                            </div>


                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-10"  for="">Número 
                                                </label>
                                                <div class="col-md-2 col-sm-6 col-xs-12">
                                                    <input type="number" id="number" name="number"  >
                                                </div>
                                            </div>


                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Bairro <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="bairro" name="bairro" data-validate-linked="bairro" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="complemento">Complemento 
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="complemento" name="complement" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">Cidade <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="cpf" name="cidade" size="11" required="required" data-validate-length-range="11" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_nasc">UF <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select id="data_nasc" name="uf" required="required" data-validate-length-range="8" class="form-control col-md-7 col-xs-12">
                                                        <option value="0" disabled selected>Selecione um Estado</option>
                                                        <?php // foreach ($c->getEstados() as $estado): ?>
                                                            <!--<option value="<?= $estado['idEstado']; ?>"><?= $estado['Nome']; ?></option>-->
                                                        <?php // endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <button id="send" type="submit" class="btn btn-primary">Cadastrar</button>
                                                    <button type="reset" class="btn btn-default">Cancelar</button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
                        </div>
                        </div>
                        </div>


                        <!-- jQuery -->
                        <script src="<?= HOME; ?>/assets/bootstrap/jquery/dist/jquery.min.js"></script>
                        <!-- Bootstrap -->
                        <script src="<?= HOME; ?>/assets/bootstrap/bootstrap/dist/js/bootstrap.min.js"></script>
                        <!-- FastClick -->
                        <script src="<?= HOME; ?>/assets/bootstrap/fastclick/lib/fastclick.js"></script>
                        <!-- NProgress -->
                        <script src="<?= HOME; ?>/assets/bootstrap/nprogress/nprogress.js"></script>
                        <!-- iCheck -->
                        <script src="<?= HOME; ?>/assets/bootstrap/iCheck/icheck.min.js"></script>
                        <!-- Custom Theme Scripts -->
                        <script src="<?= HOME; ?>/assets/js/custom.min.js"></script>

                        </body>
                        </html>