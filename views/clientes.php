<div class="right_col" role="main">
<div class="clearfix"></div>

    <div id="main" class="container-fluid">
        <form method="post" class="form-horizontal form-label-left" novalidate>
            <div class="row">
                
                <div class="col-md-12 col-sm-12 col-xs-12">    
                    <div class="x_panel">
                
                        <!-- COlUNA 1 -->
                        <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="x_title">
                                    <h2>Cliente</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <div class="erro">CPF / CNPJ Inválido</div>
                            <!--<div class="alert alert-danger" role="alert">CPF ou CNPJ Inválido</div>
                                <div class="alert alert-success" role="alert">Cadastrado com Sucesso</div>-->
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">CPF  /  CNPJ: * </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input id="cpf_cnpf" type="text" name="cpf_cnpf" size="20"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Cliente: </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="nome" class="form-control col-md-7 col-xs-12"  name="nome" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email: </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div id="pessoaJuridica">

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="insc_municipal">Inscrição Municipal: </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="text" id="insc_municipal" name="insc_municipal" size="15" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="insc_estadual">Inscrição Estadual: </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="text" id="insc_estadual" name="insc_estadual" size="15"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    </div>

                                    <div id="pessoaFisica">

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rg">RG: </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="text" id="rg" name="rg" size="12" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cnh">CNH: </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="text" id="cnh" name="cnh" size="11" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="titulo_de_eleitor">Titulo Eleitoral: </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="text" id="titulo_de_eleitor" name="titulo_de_eleitor" size="12" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="data_nasc">Data Nascimento: </label>
                                        <div class="col-md-5 col-sm-7 col-xs-6">
                                            <input type="date" id="data_nasc" name="data_nasc"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tel">Telefone: </label>
                                        <div class="col-md-4 col-sm-3 col-xs-12">
                                            <input type="tel" id="tel" name="tel" pattern="\(\d{2}\)\d{4}-\d{4}"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">Celular: </label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <input type="tel" id="celular" name="celular" pattern="\(\d{2}\)\d{4}-\d{4}" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                </div>

                        </div>

                        <!-- COlUNA 2-->
                        <div class="col-md-6 col-sm-12 col-xs-12">    

                                <div class="x_title">
                                    <h2>Endereço</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cep">CEP: *</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="cep" class="form-control col-md-7 col-xs-12"  name="cep" placeholder="Ex: 26465-569" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logradouro">Logradouro: </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="logradouro" class="form-control col-md-7 col-xs-12"  name="logradouro" placeholder="Ex: Rua, Avenida" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-10"  for="numero">Número: </label>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <input type="text" id="numero" name="numero" class="form-control col-md-7 col-xs-12" >
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Bairro: </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="bairro" name="bairro"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="complemento">Complemento: </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="complemento" name="complemento" placeholder="Opcional..." class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cidade">Cidade: </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="cidade" name="cidade"  class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estado">Estado: </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                                            <input type="text" id="estado" name="estado" list="listaestado" class="form-control col-md-7 col-xs-12">
                                            <datalist id="listaestado">
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapá</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceará</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espírito Santo</option>
                                                <option value="GO">Goiás</option>
                                                <option value="MA">Maranhão</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Pará</option>
                                                <option value="PB">Paraíba</option>
                                                <option value="PR">Paraná</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piauí</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondônia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">São Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                            </datalist>
                                        </div>
                                    </div>

                                    <input type="hidden" id="situacao" name="situacao" value="add">
                                    
                                    
                                </div>

                        </div>
                        
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12">

                                            <button id="send" type="submit" class="btn btn-primary">Salvar</button>
                                            <button type="reset" class="btn btn-default">Cancelar</button>

                                            <span id="vemAqui" style="visibility: hidden;"><a href="#" class="btn btn-danger" id="botaoExcluir" name="excluir" data-confirm="Tem Certeza que Deseja Excluir o Item Selecionado?">Excluir</a></span>
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


    $(document).ready(function(){                        
        $('#tel').mask('(00) 0000-0000');
        $('#celular').mask('(00) 00000-0000');
        $('#cep').mask('00000-000');
        $('#rg').mask('00.000.000-0');
        $('#insc_estadual').mask('00.000.00-0');

    });

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

<script>

$(function (){
    
     $("#cpf_cnpf").focus(function () {
        $(this).unmask();
        $(this).val($(this).val().replace(/\D/g, ""));
        }).click(function () {
            $(this).val($(this).val().replace(/\D/g, "")).unmask();
        }).blur(function () {
        if ($(this).val().length == 11) {
            $(this).mask("999.999.999-99");
        } else if ($(this).val().length == 14) {
            $(this).mask("99.999.999/9999-99");
        }
    });
    
    $("#cpf_cnpf").on("change", function(){
        var pessoa = $("#cpf_cnpf").val();
        
        if (pessoa.length == 14) {
            $('#pessoaJuridica').css('display', 'block');
        }else if(pessoa.length == 11){
            $('#pessoaFisica').css('display', 'block');
        }
        
        $.ajax({
            url:'<?= HOME; ?>/ajaxfull',
            type: 'POST',
            data:{pessoa:pessoa},
            dataType: 'json',
            success:function(json){
                
                if (json.erro === false) {
                    if (pessoa.length == 14) {
                        $('#pessoaJuridica').css('display', 'block');
                        $('#cpf_cnpf').val(json.cnpj);
                        $('#nome').val(json.nome_fantasia);
                        $('#insc_estadual').val(json.insc_estadual);
                        
                        var inscMunicipal = json.insc_municipal;
                        
                        if (inscMunicipal.length > 0) {
                            $('#insc_municipal').val(json.insc_municipal);
                        }
                        
                        var compleme = json.complemento;
                        
                        if (compleme.length > 0) {
                            $('#complemento').val(json.complemento);
                        }
                        
                        $('#email').val(json.email);
                        $('#tel').val(json.residencial);
                        $('#celular').val(json.celular);
                        $('#cep').val(json.cep);
                        $('#logradouro').val(json.logradouro);
                        $('#numero').val(json.numero);
                        $('#bairro').val(json.bairro);
                        
                        $('#cidade').val(json.cidade);
                        $('#estado').val(json.uf);
                        $('#situacao').val("update");
                        
                        $('#vemAqui').css('visibility', 'visible');
                        
                        $('#botaoExcluir').attr("href", "<?= HOME; ?>/clientes/del/" + json.cnpj);
                        
                        $('a[data-confirm]').click(function(){
                            var href = $(this).attr('href');
                            
                            if (!$('#confirm-delete').length) {
                                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Cliente<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir este cliente?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Deletar</a></div></div></div></div>');
                            }
                            $('#dataConfirmOk').attr('href', href);
                            $('#confirm-delete').modal({show:true});
                            return false;
                        });
                        
                    }else if(pessoa.length == 11){
                        $('#pessoaFisica').css('display', 'block');
                        $('#rg').val(json.rg);
                        $('#cnh').val(json.cnh);
                        $('#titulo_de_eleitor').val(json.titulo_de_eleitor);
                        $('#cpf_cnpf').val(json.cpf);
                        $('#nome').val(json.nome);
                        $('#email').val(json.email);
                        $('#tel').val(json.residencial);
                        $('#celular').val(json.celular);
                        $('#rg').val(json.rg);
                        $('#data_nasc').val(json.data_nasc);
                        $('#cep').val(json.cep);
                        $('#logradouro').val(json.logradouro);
                        $('#numero').val(json.numero);
                        $('#bairro').val(json.bairro);
                        
                        var compleme = json.complemento;
                        
                        if (compleme.length > 0) {
                            $('#complemento').val(json.complemento);
                        }
                        
                        $('#cidade').val(json.cidade);
                        $('#estado').val(json.uf);
                        $('#situacao').val("update");
                        
                        $('#vemAqui').css('visibility', 'visible');
                        
                        $('#botaoExcluir').attr("href", "<?= HOME; ?>/clientes/del/" + json.cpf);
                        
                        $('a[data-confirm]').click(function(){
                            var href = $(this).attr('href');
                            
                            if (!$('#confirm-delete').length) {
                                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Cliente<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir este cliente?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Deletar</a></div></div></div></div>');
                            }
                            $('#dataConfirmOk').attr('href', href);
                            $('#confirm-delete').modal({show:true});
                            return false;
                        });
                        
                    }else{
                        $(".erro").css('display', 'block');
                    }
                }else{
                    $(".erro").css('display', 'block');
                }
                $("#cpf_cnpf").focus();;
                $("#nome").focus();
            }
        });
    });
});

</script>


</body>
</html>
