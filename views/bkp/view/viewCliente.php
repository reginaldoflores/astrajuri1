<div class="right_col" role="main">	
    <div class="clearfix"></div>			      

	<div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                                            
                    <div class="x_title">
			<h2> Dados de Clientes</h2>
			<div class="clearfix"></div>
                    </div>
                    
                    <div class="x_content">
                        
			<p><strong>Nome: </strong> <?= utf8_encode($cliente['Nome']); ?></p>

			<p><strong>CPF: </strong> <?= $cliente['cpf']; ?></p>
					
                        <p><strong>Data de Nascimento: </strong> <?= date('d/m/Y', strtotime($cliente['nascimento'])); ?></p>
                        
                        <p><strong>Email: </strong> <?= $cliente['Email']; ?></p>
                        
                        <p><strong>Telefone Residencial: </strong> <?= $telefone['Residencial']; ?></p>
                        
                        <p><strong>Logradouro: </strong> <?= $cliente['Logradouro']; ?></p>
                        
                        <p><strong>CEP: </strong> <?= $cliente['CEP']; ?></p>
                        
                    </div>
					
		</div>
            </div>
        </div>
	
        <div id="actions" class="row">
            <div class="col-md-12">
                <a href="<?= HOME; ?>/clientes" class="btn btn-primary">Fechar</a>
                <a href="<?= HOME; ?>/clientes/edit/<?= $cliente['idContato']; ?>" class="btn btn-default">Editar</a>
                <a href="<?= HOME; ?>/clientes/del/<?= $cliente['idContato']; ?>" class="btn btn-default" data-toggle="modal" data-target="#delete-modal">Excluir</a>
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