<div class="right_col" role="main">
	
            <div class="clearfix"></div>
			
			<div id="main" class="container-fluid">
  
  
                            <form method="post" class="form-horizontal form-label-left" novalidate>
  
			<form action="index.html">
			
			
				<div id="top" class="row">
				<div class="col-sm-3">
					
					<div class="input-group h2">
						<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Processo">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
					
				</div>
				<div class="col-sm-3">
					<a href="#" class="btn btn-primary btn-xs pull-right h2">Novo Processo</a>
				</div>
			</div> <!-- /#top -->

			
			
			<div class="row">
			
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
					
						<div class="x_title">
							<h2>Editar Comarca</h2>
							<div class="clearfix"></div>
						 </div>
						  
						<div class="x_content">
						
						</br>
				  
                    <form method="post" class="form-horizontal form-label-left" novalidate>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="comarca">Comarca: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="<?= utf8_encode($comc['Nome']); ?>" id="data_nasc" name="comarca" required="required" data-validate-length-range="8" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endereco">Endereço: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" value="<?= utf8_encode($comc['Endereco']); ?>" id="data_nasc" name="endereco" required="required" data-validate-length-range="8" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
					  
       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
						  <button id="send" type="submit" class="btn btn-primary">Atualizar</button>
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
    <script src="<?= HOME; ?>/assets/bootstrap/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?= HOME; ?>/assets/bootstrap/iCheck/icheck.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?= HOME; ?>/assets/js/custom.min.js"></script>
	
  </body>
</html>