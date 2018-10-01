<div class="right_col" role="main">
<div class="clearfix"></div>

    <div id="main" class="container-fluid">
        <form method="post" class="form-horizontal form-label-left" novalidate>
            <div class="row">
                
                <!-- COlUNA 1 -->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Comarca</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="comarca">Comarca: </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" id="comarca" name="comarca" list="comarcaExibe"  class="form-control col-md-7 col-xs-12">
                                    <datalist id="comarcaExibe">
                                        <?php foreach ($comarcas as $comarca): ?>
                                        <option value="<?= utf8_encode($comarca['Nome']); ?>"><?= utf8_encode($comarca['Nome']); ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="endereco">Endereço: </label>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="text" id="endereco" name="endereco"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            
                             <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    
                                    <button id="send" type="submit" class="btn btn-primary">Salvar</button>
                                    <button type="reset" class="btn btn-default">Cancelar</button>
                                    <span id="vemAqui"></span>
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>
                </div>
                
                <!-- COlUNA 2-->
                <div class="col-md-6 col-sm-12 col-xs-12">    
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Vara</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="comarcaLista">Comarca: </label>
                                <div class="col-md-4 col-sm-6 col-xs-12"> 
                                    <input type="text" id="comarcaLista" name="comarcaLista" list="listacomarca" class="form-control col-md-7 col-xs-12">
                                    <datalist id="listacomarca">
                                        <?php foreach ($comarcas as $comarca): ?>
                                        <option value="<?= utf8_encode($comarca['Nome']); ?>"><?= utf8_encode($comarca['Nome']); ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="vara">Vara: </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" id="vara" name="vara" list="varaLista"  class="form-control col-md-7 col-xs-12">
                                    <datalist id="varaLista">
                                        <?php foreach ($varas as $vara): ?>
                                        <option id="comarcasRelacionadas" value="<?= utf8_encode($vara['Nome']) ?>"><?= utf8_encode($vara['Nome']); ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <span id="comRel"></span>
                                </div>
                            </div>
                            
                            <input type="hidden" id="situacao" name="situacao" value="add">
                            <input type="hidden" id="varaUser" name="varaUser" value="0">
                            <input type="hidden" id="idUser" name="idUser" value="0">
                            
                            

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    
                                    <button id="send" type="submit" class="btn btn-primary">Salvar</button>
                                    <button type="reset" class="btn btn-default">Cancelar</button>
                                    <span id="vemAqui2" style="visibility: hidden;"><a href="#" class="btn btn-danger" id="botaoExcluir" name="excluir" data-confirm="Tem Certeza que Deseja Excluir o Item Selecionado?">Excluir</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>      
        </form>
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

   $("#comarca").on("change", function(){
        var com = $("#comarca").val();
                
        $.ajax({
            url:'<?= HOME; ?>/ajaxfull/comarca',
            type: 'POST',
            data:{com:com},
            dataType: 'json',
            success:function(json){
                
                if (json.erro === false) {
                        $('#endereco').val(json.endereco);
                        $('#idUser').val(json.idCom);
                        $('#comarca').val(json.nome);
                        
                        $('#situacao').val("update");
                        
                        $('#vemAqui').append('<a href="#" class="btn btn-danger" id="botaoExcluir" name="excluir" data-confirm="Tem Certeza que Deseja Excluir o Item Selecionado?">Excluir</a>');
                        
                        $('#botaoExcluir').attr("href", "<?= HOME; ?>/comarca/delComarca/" + json.idCom);
                        
                        $('a[data-confirm]').click(function(){
                            var href = $(this).attr('href');
                            
                            if (!$('#confirm-delete').length) {
                                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Comarca<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir esta Comarca?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Excluir</a></div></div></div></div>');
                            }
                            $('#dataConfirmOk').attr('href', href);
                            $('#confirm-delete').modal({show:true});
                            return false;
                        });
                    
                }else{
                    $(".erro").css('display', 'block');
                }
            }
        });
    });
    
    $("#vara").on("change", function(){
        var vara = $("#vara").val();
                
        $.ajax({
            url:'<?= HOME; ?>/ajaxfull/vara',
            type: 'POST',
            data:{vara:vara},
            dataType: 'json',
            success:function(json){
                
                if (json.erro === false) {
                        $('#varaUser').val(json.varaId);
                        $('#comarcaLista').val(json.varaComarca);
                        $('#vara').val(json.varaNome);
                        
                        $('#situacao').val("update");
                        
                        $('#vemAqui2').css('visibility', 'visible');
                        
                        $('#botaoExcluir').attr("href", "<?= HOME; ?>/comarca/delVara/" + json.varaId);
                        
                        $('a[data-confirm]').click(function(){
                            var href = $(this).attr('href');
                            
                            if (!$('#confirm-delete').length) {
                                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Vara<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir esta Vara?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Excluir</a></div></div></div></div>');
                            }
                            $('#dataConfirmOk').attr('href', href);
                            $('#confirm-delete').modal({show:true});
                            return false;
                        });
                    
                }else{
                    $(".erro").css('display', 'block');
                }
            }
        });
    });
    
    // varas relacionadas Comarcas
    
    $("#comarcaLista").on("change", function(){
        var comar = $("#comarcaLista").val();
                    
        $.ajax({
            url:'<?= HOME; ?>/ajaxfull/getVara',
            type: 'POST',
            data:{comar:comar},
            dataType: 'json',
            success:function(json){
  
                if (json.erro === false) {
               
                    $("#varaLista").remove();
                    $("#comRel").append('<datalist id="varaLista"></datalist>');
                    
                    for (var i = 0; i < json.vara.length; i++) {
                        $("#varaLista").append('<option id="comarcasRelacionadas" value="'+json.vara[i]+'"> ' + json.vara[i] + '</option>');
                    }
                    
                        $('#situacao').val("update");
                        
                        $('#vemAqui2').css('visibility', 'visible');
                        
                        $('#botaoExcluir').attr("href", "<?= HOME; ?>/comarca/delVara/" + json.varaId);
                        
                        $('a[data-confirm]').click(function(){
                            var href = $(this).attr('href');
                            
                            if (!$('#confirm-delete').length) {
                                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Vara<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir esta Vara?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Excluir</a></div></div></div></div>');
                            }
                            $('#dataConfirmOk').attr('href', href);
                            $('#confirm-delete').modal({show:true});
                            return false;
                        });
                    
                }else{
                    $(".erro").css('display', 'block');
                }
            }
        });
    });

</script>

