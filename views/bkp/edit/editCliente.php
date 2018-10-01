<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Editar Dados do Cliente </h3>
            </div>
        </div>
    </div>


    <div class="clearfix"></div>

    <div id="main" class="container-fluid">


        <form method="post" class="form-horizontal form-label-left" novalidate>

            <form method="post">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">

                                </br>

                                <form method="post" class="form-horizontal form-label-left" novalidate>


                                    <div class="item form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <label class="radio-inline control-label col-md-3 col-sm-3 col-xs-12"><input type="radio" <?= ($cliente['tipo'] == "CPF")?'Checked':''; ?> name="tipo" id="inlineRadio1" checked value="cpf"> Pessoa Física
                                            </label>

                                            <label class="radio-inline control-label col-md-3 col-sm-3 col-xs-12"><input type="radio" <?= ($cliente['tipo'] == "CNPJ")?'Checked':''; ?> name="tipo" id="inlineRadio2" value="cnpj"> Pessoa Jurídica
                                            </label>
                                        </div>
                                    </div>			


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" value="<?= utf8_encode($cliente['pessoa']['Nome']); ?>" data-validate-words="2" name="nome" placeholder="Ex: Reginaldo Silva" required="required" type="text">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email" name="email" value="<?= $cliente['Email']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirmar Email <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email2" name="confirm_email" data-validate-linked="email" value="<?= $cliente['Email']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel">Telefone <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="tel" name="phone" value="<?= (isset($cliente['telefone']['Residencial']) || !empty($cliente['telefone']['Residencial'])) ? $cliente['telefone']['Residencial'] : ''; ?>" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">CPF <span class="required">*</span>
                                        </label>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input type="text" id="cpf" name="cp" size="11" required="required" value="<?= $cliente['pessoa']['CPF']; ?>" data-validate-length-range="11" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_nasc">Data Nascimento <span class="required">*</span>
                                        </label>
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <input type="date" id="data_nasc" name="dataNascimento" value="<?= $cliente['pessoa']['Data_Nasc']; ?>" required="required" data-validate-length-range="8" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <!-- ENDEREÇO --> </br></br>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Logradouro <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" value="<?= utf8_encode($cliente['endereco']['Logradouro']); ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nameRua" placeholder="Ex: Rua, Avenida" required="required" type="text">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-"  for="">Número 
                                        </label>
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <input type="number" id="number" value="<?= $cliente['endereco']['Numero']; ?>" name="number"  >
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Bairro <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" value="<?= utf8_encode($cliente['endereco']['Bairro']); ?>" id="bairro" name="bairro" data-validate-linked="bairro" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="complemento">Complemento 
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="complemento" value="<?= utf8_encode($cliente['endereco']['Complemento']); ?>" name="complement" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">Cidade <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="cpf" name="cidade" size="11" value="<?= utf8_encode($cliente['endereco']['Cidade']); ?>" required="required" data-validate-length-range="11" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_nasc">UF <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="data_nasc" name="uf" required="required" data-validate-length-range="8" class="form-control col-md-7 col-xs-12">
                                                <option value="0" disabled selected>Selecione um Estado</option>
                                                
                                                    <option <?= ($cliente['endereco']['UF'] == 'AC') ? 'selected="selected"' : ''; ?> value="AC">Acre</option>
                                                    <option <?= ($cliente['endereco']['UF'] == 'AL') ? 'selected="selected"' : ''; ?> value="AL">Alagoas</option>
                                                    <option <?= ($cliente['endereco']['UF'] == 'AP') ? 'selected="selected"' : ''; ?> value="AP">Amapá</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'AM') ? 'selected="selected"' : ''; ?> value="AM">Amazonas</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'BA') ? 'selected="selected"' : ''; ?> value="BA">Bahia</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'CE') ? 'selected="selected"' : ''; ?> value="CE">Ceará</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'DF') ? 'selected="selected"' : ''; ?> value="DF">Distrito Federal</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'ES') ? 'selected="selected"' : ''; ?> value="ES">Espírito Santo</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'GO') ? 'selected="selected"' : ''; ?> value="GO">Goiás</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'MA') ? 'selected="selected"' : ''; ?> value="MA">Maranhão</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'MT') ? 'selected="selected"' : ''; ?> value="MT">Mato Grosso</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'MS') ? 'selected="selected"' : ''; ?> value="MS">Mato Grosso do Sul</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'MG') ? 'selected="selected"' : ''; ?> value="MG">Minas Gerais</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'PA') ? 'selected="selected"' : ''; ?> value="PA">Pará</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'PB') ? 'selected="selected"' : ''; ?> value="PB">Paraíba</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'PR') ? 'selected="selected"' : ''; ?> value="PR">Paraná</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'PE') ? 'selected="selected"' : ''; ?> value="PE">Pernambuco</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'PI') ? 'selected="selected"' : ''; ?> value="PI">Piauí</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'RJ') ? 'selected="selected"' : ''; ?> value="RJ">Rio de Janeiro</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'RN') ? 'selected="selected"' : ''; ?> value="RN">Rio Grande do Norte</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'RS') ? 'selected="selected"' : ''; ?> value="RS">Rio Grande do Sul</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'RO') ? 'selected="selected"' : ''; ?> value="RO">Rondônia</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'RR') ? 'selected="selected"' : ''; ?> value="RR">Roraima</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'SC') ? 'selected="selected"' : ''; ?> value="SC">Santa Catarina</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'SP') ? 'selected="selected"' : ''; ?> value="SP">São Paulo</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'SE') ? 'selected="selected"' : ''; ?> value="SE">Sergipe</option>

                                                    <option <?= ($cliente['endereco']['UF'] == 'TO') ? 'selected="selected"' : ''; ?> value="TO">Tocantins</option>
                                                
                                            </select>
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
                <script src="<?= HOME; ?>/assets/bootstrap/nprogress/nprogress.js"></script>
                <!-- iCheck -->
                <script src="<?= HOME; ?>/assets/bootstrap/iCheck/icheck.min.js"></script>
                <!-- Custom Theme Scripts -->
                <script src="<?= HOME; ?>assets/js/custom.min.js"></script>

                </body>
                </html>