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
    <?php
    require_once '../classes/Cliente.php';
    $c = new Cliente();
    
    if (isset($_GET['s']) && !empty($_GET['s'])) {
        $idCliente = addslashes($_GET['s']);
        
        $client = $c->getClienteFisico($idCliente);
        
    }else{ ?>
    <script language="javascript">
        window.location.href = "listaCliente.php";
    </script>
    <?php } ?>
    
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
    <?php require_once 'pages/menu.php'; ?>
    
        <div class="right_col" role="main">
		
			<div class="">
				<div class="page-title">
				  <div class="title_left">
					<h3>Dados do Cliente </h3>
				  </div>
				</div>
			</div>
		
			
            <div class="clearfix"></div>
			
			<div id="main" class="container-fluid" style="margin-top: 50px">
 
				<hr/>        

				<div class="row">
					<div class="col-md-12">
					  <p><strong>Nome</strong></p>
                                          <p><?= utf8_encode($client['nome']); ?></p>

					  <p><strong>CPF</strong></p>
					  <p><?= $client['CPF']; ?></p>
					
					  <p><strong>Data de Nascimento</strong></p>
                                          <p><?= date('d/m/Y', strtotime($client['Data_Nasc'])); ?></p>
					</div>
					
				 </div>
				 
				 <hr />
				 <div id="actions" class="row">
				   <div class="col-md-12">
					 <a href="http://localhost/astrajuri/producao/listaCliente.php" class="btn btn-primary">Fechar</a>
					 <a href="http://localhost/astrajuri/producao/editarCliente.php?s=<?= $client['idPessoa_Fisica']; ?>" class="btn btn-default">Editar</a>
					 <a href="http://localhost/astrajuri/producao/deletarCliente.php?s=<?= $client['Contato_idContato']; ?>" class="btn btn-default" data-toggle="modal" data-target="#delete-modal">Excluir</a>
				   </div>
				 </div>
			</div>
		</div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>