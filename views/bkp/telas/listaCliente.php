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
    
        <?php require_once 'pages/menu.php'; require_once '../classes/Cliente.php'; 
        $c = new Cliente(); ?>
    
        <div class="right_col" role="main">
		
			<div class="">
				<div class="page-title">
				  <div class="title_left">
					<h3>Lista de Clientes </h3>
				  </div>
				</div>
			</div>
		
			
            <div class="clearfix"></div>
			
			<div id="main" class="container-fluid" style="margin-top: 50px">
 
			<div id="top" class="row">
				<div class="col-sm-3">
					
					<div class="input-group h2">
						<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Cliente">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
					
				</div>
				<div class="col-sm-6">
					<a href="http://localhost/astrajuri/producao/addCliente.php" class="btn btn-primary pull-right h2">Novo Cliente</a>
				</div>
			</div> <!-- /#top -->
 
			<hr/>        
 	
			<div id="list" class="row">
			
				<div class="x_panel">
					<div class="x_title">
						<h2>Lista de Varas</h2>
						<div class="clearfix"></div>
					</div>
					
					<div class="x_content">
				
						<div class="table-responsive col-md-12">
								<table class="table table-striped" cellspacing="0" cellpadding="0">
									
									<thead>
										<tr>
											<th>CPF / CNPJ</th>
											<th>Cliente</th>
											<th>Advogado</th>
											<th>Data</th>
											<th class="actions">Ações</th>
										</tr>
									</thead>
									
									<tbody>
									<?php foreach($c->getClientesFisico() as $cliente): ?>
										<tr>
											<td><?= $cliente['CPF']; ?></td>
											<td><?= $cliente['nome']; ?></td>
											<td>Jes</td>
											<td>01/01/2015</td>
											<td class="actions">
											<a class="btn btn-success btn-xs" href="http://localhost/astrajuri/producao/visualizarCliente.php?s=<?= $cliente['idPessoa_Fisica']; ?>">Visualizar</a>
											<a class="btn btn-warning btn-xs" href="http://localhost/astrajuri/producao/editarCliente.php?s=<?= $cliente['idPessoa_Fisica']; ?>">Editar</a>
											<a class="btn btn-danger btn-xs"  href="http://localhost/astrajuri/producao/deletarCliente.php?s=<?= $cliente['Contato_idContato']; ?>" data-toggle="modal" data-target="#delete-modal">Excluir</a>
										    </td>
										</tr>
									<?php endforeach; ?>
									</tbody>
									
								</table>
						</div>
					</div>

				</div>
			</div> <!-- /#list -->
	
			<div id="bottom" class="row">
				<div class="col-md-12">
					<ul class="pagination">
						<li class="disabled"><a>&lt; Anterior</a></li>
						<li class="disabled"><a>1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
					</ul><!-- /.pagination -->
				</div>
			</div> <!-- /#bottom -->
		 </div> <!-- /#main -->

		 <!--Modal -->
		<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
			  </div>
			  <div class="modal-body">
				Deseja realmente excluir este cliente?
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary">Sim</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
			  </div>
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