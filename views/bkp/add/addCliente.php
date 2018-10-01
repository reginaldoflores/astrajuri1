<div class="right_col" role="main">
    <div class="clearfix"></div>

    <div id="main" class="container-fluid">
        <form method="post" class="form-horizontal form-label-left" novalidate>
            <form  method="post">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            
                            <div class="x_title">
                                <h2>Novo Cliente</h2>
                                <div class="clearfix"></div>
                             </div>

                                <div class="x_content">

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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">CPF <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input type="text" id="cpf" name="cp" size="11" required="required" data-validate-length-range="11" class="form-control col-md-7 col-xs-12">
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
                                            <input type="tel" id="tel" name="phone" pattern="\(\d{2}\)\d{4}-\d{4}" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">RG <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input type="text" id="rg" name="rg" size="9" required="required" data-validate-length-range="11" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_nasc">Data Nascimento <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input type="date" id="data_nasc" name="dataNascimento" required="required" data-validate-length-range="8" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                        
                                        
                                    <!-- ENDEREÇO --> </br>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cep">CEP <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="cep" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="cep" placeholder="Ex: 26465-569" required="required" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Logradouro <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nameRua" placeholder="Ex: Rua, Avenida" required="required" type="text">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-10"  for="">Número 
                                        </label>
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <input type="text" id="number" name="number"  >
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Bairro <span class="required"></span>
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
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">Cidade <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="cpf" name="cidade" size="11" required="required" data-validate-length-range="11" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                   <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">Estado <span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="cpf" name="estado" size="11" required="required" data-validate-length-range="11" class="form-control col-md-7 col-xs-12">
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


                            <!--</div>-->
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