<div class="right_col" role="main">
<div class="clearfix"></div>

    <div id="main" class="container-fluid">
        
            <div class="row">
                
                <div class="col-md-12 col-sm-12 col-xs-12">    
                    <div class="x_panel">
                
                        <!-- COlUNA 1 -->
                        <div class="col-md-4 col-sm-12 col-xs-12">

                                <div class="x_title">
                                    <h2>Cadastrar Despesa</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="form-group">
                                    <label class="control-label col-md-6 col-sm-6 col-xs-12">Data: </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="date" id="data-despesa" name="data-despesa" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <br><br><br>

                                    <div class="item form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12" for="com">Valor: </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">R$</span>
                                                <input type="text"  id="valor-despesa" name="valor-despesa" class="form-control" aria-label="Amount (to the nearest dollar)">      
                                            </div>
                                        </div>
                                    </div>

                                    <br><br><br>

                                    <div class="form-group">
                                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Notas: </label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <textarea class="resizable_textarea form-control" name="valor-notas" id="valor-notas" placeholder="Digite notas..."></textarea>
                                        </div>
                                    </div>
                                </div>    
                        </div>  
                        
                         <!-- COlUNA 3 -->
                        <div class="col-md-8 col-sm-12 col-xs-12">

                                <div class="x_title">
                                    <h2>Lista de Despesas Fixas do Escritório</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Valor</th>
                                                <th>Descrição</th>
                                                <th class="actions">Ações</th>
                                            </tr>
					</thead>
					<tbody>
                                            <tr>
                                            <td> 30/08/2018</td>
                                            <td> 2000,00</td>
                                            <td> Despesa com Energia elétrica</td>
                                            <td class="actions">
                                                <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                            </td>
                                            </tr>
                                            
                                            <tr>
                                            <td>  30/08/2018</td>
                                            <td> 800,00</td>
                                            <td> Despesa com água</td>
                                            <td class="actions">
                                                <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                            </td>
                                            </tr>
                                            
                                            <tr>
                                            <td> 30/08/2018</td>
                                            <td> 2000,00</td>
                                            <td> Despesa com material de escritório</td>
                                            <td class="actions">
                                                <a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
                                                <a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                                            </td>
                                            </tr>
						
					</tbody>
                                    </table>
                                    
                                    
                                    
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

<script src="<?= HOME; ?>/assets/js/jquery.mask.min.js"></script>
<script>

