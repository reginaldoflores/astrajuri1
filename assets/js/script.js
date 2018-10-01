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
            url:'http://localhost/astrajuri/ajax',
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
                        
                        $('#botaoExcluir').attr("href", "http://localhost/astrajuri/clientes/del/" + json.cnpj);
                        
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
                        
                        $('#botaoExcluir').attr("href", "http://localhost/astrajuri/clientes/del/" + json.cpf);
                        
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
                $("#cpf_cnpf").focus();
                $("#nome").focus();
            }
        });
    });
});
