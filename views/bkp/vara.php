<div class="right_col" role="main">
    <div class="clearfix"></div>
            
    <div class="row">
	<div class="col-sm-3">
							
            <div class="input-group h2">
		<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Vara">
		<span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
			<span class="glyphicon glyphicon-search"></span>
                    </button>
		</span>
            </div>
							
	</div>
						
	<div class="col-sm-6">
            <a href="<?= HOME; ?>/vara/add" class="btn btn-primary btn-medium pull-right h2">Nova Vara</a>
	</div>
						
    </div> 
				
			<div class="row">
					  <div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
						  <div class="x_title">
							<h2>Lista Varas</h2>
							<div class="clearfix"></div>
						  </div>
						  <div class="x_content">
						
							<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Vara</th>
						
							<th class="actions">Ações</th>
						</tr>
					</thead>
					<tbody>
                                            <?php foreach ($varas as $vara): ?>
                                            <tr>
                                                <td><?= utf8_encode($vara['Nome']); ?></td>
                                              
                                                <td class="actions">
                                                    <a class="btn btn-success btn-xs" href="<?= HOME; ?>/vara/view/<?= $vara['idVara']; ?>">Visualizar</a>
                                                    <a class="btn btn-warning btn-xs" href="<?= HOME; ?>/vara/edit/<?= $vara['idVara']; ?>">Editar</a>
                                                    <a class="btn btn-danger btn-xs"  href="<?= HOME; ?>/vara/del/<?= $vara['idVara']; ?>" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
					</tbody>
					</table>
						  </div>
						</div>
					  </div>
			</div>

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
			
			
			

					<!-- Modal -->
					<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
						  </div>
						  <div class="modal-body">
							Deseja realmente excluir este andamento?
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
    <script src="<?= HOME; ?>/assets/bootstrap/js/custom.min.js"></script>
	 <!-- Dropzone.js -->
    <script src="<?= HOME; ?>/assets/bootstrap/dropzone/dist/min/dropzone.min.js"></script>
	
  </body>
</html>