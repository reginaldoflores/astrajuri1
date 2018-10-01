<div class="right_col" role="main">
    <div class="clearfix"></div>

    <div id="main" class="container-fluid">
        <form method="post" class="form-horizontal form-label-left" novalidate>
            <form  method="post">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            
                            <div class="x_title">
                                <h2>Cliente</h2>
                                <div class="clearfix"></div>
                             </div>

                                <div class="x_content">

                                    <form method="post" class="form-horizontal form-label-left" novalidate>
                                    <div class="erro">CPF e/ou CNPJ Inválido</div>
                                    
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">CPF  /  CNPJ: <span class="required">*</span>
                                        </label>
                                        <input type="submit" value="Exibir" class="btn btn-default">
                                        
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input id="pessoa" type="text" name="cpf_cnpf" size="14" required="required" data-validate-length-range="14" class="form-control col-md-7 col-xs-12">
                                        
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
                
                <script src="<?= HOME; ?>/assets/js/jquery.mask.min.js"></script>
                <script src="<?= HOME; ?>/assets/js/script.js"></script>
                
                <script> 
                    $(document).ready(function(){                        
                        $('#tel').mask('(00) 0000-0000');
                        $('#celular').mask('(00) 00000-0000');
                        $('#cep').mask('00000-000');
                        $('#rg').mask('00.000.000-0');
                        $('#insc_estadual').mask('00.000.00-0');
                        $('#pessoa').mask('000.000.000-00');
                        
                    });                                    
                </script>
                
                <script>
                    $('#cep').blur(function(e) {
                        var cep=$('#cep').val();
                        var url="http://viacep.com.br/ws/" + cep + "/json/";
                        var retorno = pesquisarCEP(url);
                    });
                    
                    function pesquisarCEP(endereco){
                        $.ajax({
                            type:"GET",
                            url:endereco,
                            async:false
                            
                        }).done(function(data){
                            $('#bairro').val(data.bairro);
                            $('#logradouro').val(data.logradouro);
                            $('#cidade').val(data.localidade);
                            $('#estado').val(data.uf);
                            
                        }).fail(function(){
                            console.log("erro");
                        });
                    }   
                </script>
                
                </body>
                </html>
