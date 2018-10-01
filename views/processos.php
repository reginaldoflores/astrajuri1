<div class="right_col" role="main">
<div class="clearfix"></div>

    <div id="main" class="container-fluid">
        <form method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
            <div class="row">
                
                <!-- Processo -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        
                        <div class="x_title">
                            <h2>Processo</h2>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="x_content">
                        <div class="erro">Número Inválido</div>
                        
                        <!--<div class="alert alert-danger" role="alert">CPF ou CNPJ Inválido</div>
                        <div class="alert alert-success" role="alert">Cadastrado com Sucesso</div>-->

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="x_content">

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero">Número: * </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="numero" type="text" name="numero" size="20"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="instancia">Origem: </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                                            <select id="instancia" name="instancia" class="form-control col-md-7 col-xs-12">
                                                <option value="0" disabled selected=""></option>
                                                <?php foreach($instancias as $instancia): ?>
                                                <option value="<?= $instancia['idInstancia']; ?>"><?= utf8_encode($instancia['Nome']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="posicao">Posição: </label>
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select id="posicao" name="posicao" class="form-control col-md-7 col-xs-12">
                                                    <option value="0" disabled selected=""></option>
                                                    <?php foreach($posicoes as $posicao): ?>
                                                        <option value="<?= $posicao['idPosicao']; ?>"><?= utf8_encode($posicao['Posicao']); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cliente">Cliente:  </label>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                <input type="text" id="cliente" list="listaCliente" name="cliente" class="form-control col-md-7 col-xs-12">
                                                <datalist id="listaCliente">
                                                    <?php foreach($clientes as $cliente): ?>
                                                        <option value="<?= utf8_encode($cliente['Nome']); ?>"><?= $cliente['CPF']; ?></option>
                                                    <?php endforeach; ?>
                                                </datalist>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pessoa2"><span id="tela1">Autor:</span><span style="display: none;" id="tela2">Réu:</span><span style="display: none;" id="tela3">Requerido:</span><span style="display: none;" id="tela4">Requerente:</span></label>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                <input type="text" id="pessoa2" name="pessoa2"   class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="advogado">Advogado(s): </label>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                <input type="text" id="advogado" list="listaAdvogado" name="advogado" class="form-control col-md-7 col-xs-12">
                                                <datalist id="listaAdvogado">
                                                    <?php foreach($advogados as $advogado): ?>
                                                        <option value="<?= utf8_encode($advogado['nome']); ?>"><?= $advogado['OAB']; ?></option>
                                                        <input type="hidden" name="idAdv" id="idAdv" value="<?= $advogado['idAdvogado']; ?>" />
                                                    <?php endforeach; ?>
                                                </datalist>
                                            </div>
                                        </div>
                                        
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="advogado2"> </label>
                                            <div class="col-md-9 col-sm-6 col-xs-12">
                                                    <input type="text" id="advogado2" name="advogado2" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                    </div>
                            </div>
                           
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="x_content">

                                    <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="juiz">Juiz: </label>
                                            <div class="col-md-7 col-sm-6 col-xs-12">
                                                    <input type="text" id="juiz" name="juiz" class="form-control col-md-7 col-xs-12">
                                            </div>
                                    </div>

                                    

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="comarca">Comarca: </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                                            <input type="text" id="comarca" name="comarca" list="listacomarca" class="form-control col-md-7 col-xs-12">
                                            <datalist id="listacomarca">
                                                <?php foreach($comarcas as $comarca): ?>
                                                <option value="<?= utf8_encode($comarca['Nome']) ?>"><?= utf8_encode($comarca['Nome']); ?></option>
                                                <?php endforeach; ?>
                                            </datalist>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end">Endereço:  </label>
                                            <div class="col-md-9 col-sm-7 col-xs-6">
                                                    <input type="text" id="end" name="end"  class="form-control col-md-7 col-xs-12">
                                            </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varaLista">Vara: </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                                            <input type="text" id="varaLista" name="varaLista" list="listavara" class="form-control col-md-7 col-xs-12">
                                            <datalist id="listavara">
                                            </datalist>
                                            <span id="comRel"></span>
                                            <input type="hidden" value="0" name="idVara" id="idVara"/>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fase">Fase: </label>
                                        <div class="col-md-5 col-sm-3 col-xs-12">
                                            <select id="fase" name="fase" class="form-control col-md-7 col-xs-12">
                                                <option value="0" disabled selected=""></option>
                                                <?php foreach($fases as $fase): ?>
                                                <option id="optFase" value="<?= $fase['idStatus']; ?>"><?= utf8_encode($fase['Status']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" value="0" name="idProc" id="idProc"/>
                                    
                                    <div class="item form-group" id="exibeConclusao" style="display: none;">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="conclusao">Conclusão: </label>
                                        <div class="col-md-5 col-sm-3 col-xs-12">
                                            <select name="conclusao" id="conclusao" class="form-control col-md-7 col-xs-12">
                                                <option value="0" disabled selected=""></option>
                                                <?php foreach($conclusoes as $conclusao): ?>
                                                <option value="<?= $conclusao['idConclusao']; ?>"><?= utf8_encode($conclusao['Nome']); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- / Processo -->

                
                <!-- Valor-->
                <div class="col-md-12 col-sm-12 col-xs-12"> 
                    <div class="x_panel">
                        
                        <div class="nav">
                             <button id="btnIncValor" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#valor" data-whatever="">Incluir Valor</button>
                             <!--<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="' + json.entradaId[i] + '" data-whatevervalor="' + json.valueEntrada[i] + '" data-whateverqtd="' + json.qtdEntrada[i] + '" data-whateverdata="' + json.dataEntrada[i] + '" data-whateverhora="' + json.horaEntrada[i] + '">Editar</button>-->
                        </div>   
                        <hr>
                        <div id="msgValor">
                            <h4>Não Valores no Processo!</h4>
                        </div>
                        <div class="x_content" id="valorEditLista" style="display: none;">
                            <table class="table table-striped" cellspacing="0" cellpadding="0">
                                <thead id="">
                                <tr>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Tipo</th>
                                    <th>Notas</th>
                                    <th class="actions">Ações</th>                        
                                </tr>
                            </thead>
                            <tbody id="linha-valor">
                                
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- / Valor-->
               
                <!-- Andamento -->
                <div class="col-md-12 col-sm-12 col-xs-12">    
                    <div class="x_panel">
                        
                        <div class="nav">
                             <button id="btnAndamento" type="button" class="btn btn-primary btn-xs" data-toggle="modal"  data-target="#andamento" data-whatever="">Incluir Andamento</button>
                        </div>   
                        <hr>
                        <div id="msgAndamento">
                            <h4>Não Andamento no Processo!</h4>
                        </div>
                        <div class="x_content" id="andamentoEditLista" style="display: none;">

                            <table class="table table-striped" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Texto</th>
                                    <th class="actions">Ações</th>                     
                                </tr>
                            </thead>
                            <tbody id="linhaAndamento">
                                
                            </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- / Andamento -->
                
                <!-- Arquivo-->
                <div class="col-md-12 col-sm-12 col-xs-12">    
                    <div class="x_panel">
                        
                        <div class="nav">
                             <button id="btnArquivo" type="button" class="btn btn-primary btn-xs" data-toggle="modal"  data-target="#arquivos" data-whatever="">Incluir Arquivo</button>
                        </div>   
                        <hr>
                        <div id="msgArquivo">
                            <h4>Não Arquivos no Processo!</h4>
                        </div>
                        <div class="x_content" id="arquivoEditLista"  style="display: none;">

                            <table class="table table-striped" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Arquivo</th>
                                    <th>Descrição</th>
                                    <th class="actions">Ações</th>
                                </tr>
                            </thead>
                            <tbody id="linhaArquivo">
                                
                            </tbody>
                            </table>
                            
                        </div>
                        <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    
                                    <button id="btnPrint" id="send" type="submit" class="btn btn-primary">Salvar</button>
                                    
                                    <button id="btnPrint" type="reset" class="btn btn-default">Cancelar</button>
                                    
                                    <span id="vemAqui2" style="visibility: hidden;"><a href="#" class="btn btn-danger" id="botaoExcluir" name="excluir" data-confirm="Tem Certeza que Deseja Excluir o Item Selecionado?">Excluir</a></span>
                                    
                                    <button id="btnPrint" name="print" type="button" class="btn btn-default" value="Imprimir" ONCLICK="varitext()">Imprimir</button>

                                   
                                </div>
                            </div>
                    </div>
                </div>
                 <!-- / Arquivo-->
            
            </div>
            <input type="hidden" id="situacao" name="situacao" value="add">
        
    </div>
      
</div>  

    <!--modal Andamento-->
    <div class="modal fade bs-example-modal-sm" id="andamento" tabindex="-1" id="and" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">Incluir Andamento</h4>
            </div>
            <div class="modal-body">
          
                <div class="row">
            
                    <div class="col-md-12">
            
                        <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Data: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="datetime-local" id="dataAndamento" name="dataAndamento"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                
                        <br><br><br>
                        
                        <div class="form-group">
                            <label class="control-label col-md-6 col-sm-6 col-xs-12">Texto: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="resizable_textarea form-control" name="textoDescricao" id="textoDescricao" placeholder="Digite o andamento..."></textarea>
                            </div>
                        </div>
                
                    </div>
                </div>
                          
                <br><br>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            
            </div>
        </div>
    </div>

</div>

    <!--modal Andamento EDIT-->
    <div class="modal fade bs-example-modal-sm" id="andamentoEdit" tabindex="-1" id="and" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">Editar Andamento</h4>
            </div>
            <div class="modal-body">
          
                <div class="row">
            
                    <div class="col-md-12">
            
                        <div class="form-group">
                        <label class="control-label col-md-6 col-sm-6 col-xs-12">Data: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="datetime-local" id="dataAndamentoEdit" name="dataAndamentoEdit"  class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                
                        <br><br><br>
                        
                        <div class="form-group">
                            <label class="control-label col-md-6 col-sm-6 col-xs-12">Texto: </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea class="resizable_textarea form-control" name="textoDescricaoEdit" id="textoDescricaoEdit" placeholder="Digite o andamento..."></textarea>
                            </div>
                        </div>
                
                    </div>
                </div>
          
                <input type="hidden" name="idAndamento" id="idAndamento">
                
                <br><br>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            
            </div>
        </div>
    </div>

</div>
    
    <!--modal valor-->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" id="valor" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Incluir Valor</h4>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12">Tipo: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="tipo-despesa" name="tipo-despesa"  class="form-control col-md-7 col-xs-12" list="listDespesas">
                                    <datalist id="listDespesas">
                                        <?php foreach($despesas as $desp): ?>
                                        <option value="<?= utf8_encode($desp['Tipo']); ?>"><?= utf8_encode($desp['Tipo']); ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>

                            <br><br><br>

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

                    <input type="hidden" name="idIncValor" id="idIncValor">

                    <br><br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>

                </div>

            </div>
        </div>
    </div>
    
    <!--modal valorEdit-->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" id="valorEdit" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Incluir Valor</h4>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12">Tipo: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" id="tipo-despesaEdit" name="tipo-despesaEdit"  class="form-control col-md-7 col-xs-12" list="listDespesas">
                                    <datalist id="listDespesas">
                                        <?php foreach($despesas as $desp): ?>
                                        <option value="<?= utf8_encode($desp['Tipo']); ?>"><?= utf8_encode($desp['Tipo']); ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>

                            <br><br><br>

                            <div class="form-group">
                            <label class="control-label col-md-6 col-sm-6 col-xs-12">Data: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="date" id="data-despesaEdit" name="data-despesaEdit" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <br><br><br>

                            <div class="item form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="com">Valor: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input type="text"  id="valor-despesaEdit" name="valor-despesaEdit" class="form-control" aria-label="Amount (to the nearest dollar)">      
                                    </div>
                                </div>
                            </div>

                            <br><br><br>

                            <div class="form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12">Notas: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="resizable_textarea form-control" name="valor-notasEdit" id="valor-notasEdit" placeholder="Digite notas..."></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <input type="hidden" name="idIncValor" id="idIncValor">

                    <br><br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>

                </div>

            </div>
        </div>
    </div>
  
    
    <!--modal arquivo-->
    <div class="modal fade bs-example-modal-sm" id="arquivos" tabindex="-1" role="dialog" id="arq" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
            
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Incluir Arquivo</h4>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">
                            <label class="control-label col-md-6 col-sm-6 col-xs-12">Data: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="date" id="dataArquivo" name="dataArquivo"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                            <label class="control-label col-md-6 col-sm-6 col-xs-12">Arquivo: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" id="arquivo" name="arquivo">
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12">Descrição: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="resizable_textarea form-control" id="descricaoArquivo" name="descricaoArquivo" placeholder="Digite a descrição..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <!--modal arquivoEDIT-->
    <div class="modal fade bs-example-modal-sm" id="arquivosEdit" tabindex="-1" role="dialog" id="arq" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
            
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Editar Arquivo</h4>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">
                            <label class="control-label col-md-6 col-sm-6 col-xs-12">Data: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="date" id="dataArquivoEdit" name="dataArquivoEdit"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                            <label class="control-label col-md-6 col-sm-6 col-xs-12">Arquivo: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" id="arquivoEdit" name="arquivoEdit">
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                                <label class="control-label col-md-6 col-sm-6 col-xs-12">Descrição: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="resizable_textarea form-control" id="descricaoArquivoEdit" name="descricaoArquivoEdit" placeholder="Digite a descrição..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="idArquivo" id="idArquivo">
                    <input type="hidden" name="arquivoAnteriorEdit" id="arquivoAnteriorEdit">
                    
                    <br><br>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
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
        $('#numero').mask('0000000-00.0000.0.00.0000');
        $("#valor-despesa").mask('#.##0,00', {reverse: true});
        $("#valor-despesaEdit").mask('#.##0,00', {reverse: true});
                
    });
    
    $("#comarca").on("change", function(){
        var comar = $("#comarca").val();
                    
        $.ajax({
            url:'<?= HOME; ?>/ajaxfull/getVara',
            type: 'POST',
            data:{comar:comar},
            dataType: 'json',
            success:function(json){
  
                if (json.erro === false) {
               
                    $("#end").val(json.endereco);
                    $("#listavara").remove();
                    $("#comRel").append('<datalist id="listavara"></datalist>');
                    
                    for (var i = 0; i < json.vara.length; i++) {
                        $("#listavara").append('<option id="comarcasRelacionadas" value="'+json.vara[i]+'"> ' + json.vara[i] + '</option>');
                    }
                                        
                }
            }
        });
    });
    
    $("#numero").on("change", function(){
        var numero = $("#numero").val();
                    
        $.ajax({
            url:'<?= HOME; ?>/ajaxfull/processo',
            type: 'POST',
            data:{numero:numero},
            dataType: 'json',
            success:function(json){
  
                if (json.erro === false) {
               
                    $("#numero").val(json.numero);
                    $("#instancia").val(json.instancia);
                    $("#posicao").val(json.posicao);
                    $("#cliente").val(json.cliente);
                    $("#pessoa2").val(json.pessoa2);
                    $("#advogado").val(json.advogado);
                    $("#juiz").val(json.juiz);
                    $("#fase").val(json.fase);
                    $("#advogado2").val(json.advogado2);
                    $("#varaLista").val(json.vara);
                    $("#comarca").val(json.comarca);
                    $("#end").val(json.endereco);
                    $("#idProc").val(json.idProcesso);
                    $("#idVara").val(json.idVara);
                    $("#btnIncValor").attr('data-whatever', json.idProcesso);
                    $("#btnAndamento").attr('data-whatever', json.idProcesso);
                    $("#btnArquivo").attr('data-whatever', json.idProcesso);
                    $("#situacao").val("update");
                    
                    if (json.fase == 7) {
                        $("#conclusao").val(json.conclusao);
                        $("#exibeConclusao").css('display', 'block');
                    }
                    
                    if (json.qtdDespesas > 0) {
                        $("#msgValor").css('display', 'none');
                        $("#valorEditLista").css('display', 'block');
                        for(i=0; i<json.qtdDespesas; i++){
                            $('#linha-valor').append('<tr><td>'+json.datadespView[i]+'</td><td>'+json.valordesp[i]+'</td><td>'+json.tipodesp[i]+'</td><td>'+json.notasdesp[i]+'</td><td class="actions"><button type="button" id="editDespVal" class="btn btn btn-warning btn-xs" data-toggle="modal" data-target="#valorEdit" data-whatever="' + json.iddesp[i] + '" data-whatevervalor="' + json.valordesp[i] + '" data-whatevertipo="' + json.tipodesp[i] + '" data-whateverdescricao="' + json.notasdesp[i] + '" data-whateverdata="' + json.datadesp[i] + '">Editar</button><a id="valorDel" class="btn btn-danger btn-xs"  href="<?= HOME; ?>/processofull/deldespesa/' + json.iddesp[i] + '" id="valorExcluir" data-confirm="Tem Certeza que Deseja Excluir a Despesa Selecionada?">Excluir</a></td></tr>');
                            
                            $('a[data-confirm]').click(function(){
                                var href = $(this).attr('href');
                                if (!$('#confirm-delete').length) {
                                    $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Entrada de Material<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir esta Entrada de Material?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Deletar</a></div></div></div></div>');
                                }
                                $('#dataConfirmOk').attr('href', href);
                                $('#confirm-delete').modal({show:true});
                                return false;
                            });
                        }
                    }
               
                    if (json.qtdAndamento > 0) {
                        $("#msgAndamento").css('display', 'none');
                        $("#andamentoEditLista").css('display', 'block');
                        for(i=0; i<json.qtdAndamento; i++){
                        $('#linhaAndamento').append('<tr><td>'+json.dataAndamentoView[i]+'</td><td>'+json.textoAndamento[i]+'</td><td class="actions"><button type="button" id="editAndamento" class="btn btn btn-warning btn-xs" data-toggle="modal" data-target="#andamentoEdit" data-whatever="' + json.idAndamento[i] + '" data-whateverdata="' + json.dataAndamento[i] + '" data-whatevertexto="' + json.textoAndamento[i] + '">Editar</button><a id="valorDel" class="btn btn-danger btn-xs"  href="<?= HOME; ?>/processofull/delandamento/' + json.idAndamento[i] + '" id="andamentoExcluir" data-confirm="Tem Certeza que Deseja Excluir o Andamento Selecionado?">Excluir</a></td></tr>');

                            $('a[data-confirm]').click(function(){
                                var href = $(this).attr('href');
                                if (!$('#confirm-delete').length) {
                                    $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Entrada de Material<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir esta Entrada de Material?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Deletar</a></div></div></div></div>');
                                }
                                $('#dataConfirmOk').attr('href', href);
                                $('#confirm-delete').modal({show:true});
                                return false;
                            });
                        }
                    }
               
                    if (json.qtdArquivo > 0) {
                        $("#msgArquivo").css('display', 'none');
                        $("#arquivoEditLista").css('display', 'block');
                        for(i=0; i<json.qtdArquivo; i++){
                            $('#linhaArquivo').append('<tr><td>'+json.dataArquivoView[i]+'</td><td><a href="<?= HOME; ?>/assets/arquivos/'+json.nomeArquivo[i]+'">Arquivo</a></td><td>'+json.textoDescricao[i]+'</td><td class="actions"><button type="button" id="editArquivo" class="btn btn btn-warning btn-xs" data-toggle="modal" data-target="#arquivosEdit" data-whatever="' + json.idArquivo[i] + '" data-whateverdata="' + json.dataArquivo[i] + '" data-whateverdescricao="' + json.textoDescricao[i] + '" data-whateverarq="' + json.nomeArquivo[i] + '">Editar</button><a id="valorDel" class="btn btn-danger btn-xs"  href="<?= HOME; ?>/processofull/delarquivo/' + json.idArquivo[i] + '" id="andamentoExcluir" data-confirm="Tem Certeza que Deseja Excluir o Arquivo Selecionado?">Excluir</a></td></tr>');

                            $('a[data-confirm]').click(function(){
                                var href = $(this).attr('href');
                                if (!$('#confirm-delete').length) {
                                    $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Entrada de Material<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir esta Entrada de Material?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Deletar</a></div></div></div></div>');
                                }
                                $('#dataConfirmOk').attr('href', href);
                                $('#confirm-delete').modal({show:true});
                                return false;
                            });
                        }
                    }
               
                    $('#vemAqui2').css('visibility', 'visible');
                        
                        $('#botaoExcluir').attr("href", "<?= HOME; ?>/processofull/del/" + json.idProcesso);
                        
                        $('a[data-confirm]').click(function(){
                            var href = $(this).attr('href');
                            
                            if (!$('#confirm-delete').length) {
                                $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Processo<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir este Processo?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Excluir</a></div></div></div></div>');
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
        
    $('#valorEdit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes
        var recipientvalor = button.data('whatevervalor');
        var recipientdescricao = button.data('whateverdescricao');
        var recipientdata = button.data('whateverdata');
        var recipienttipo = button.data('whatevertipo');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        // modal.find('.modal-title').text('ID ' + recipient);
        modal.find('#idIncValor').val(recipient);
        modal.find('#valor-notasEdit').val(recipientdescricao);
        modal.find('#valor-despesaEdit').val(recipientvalor);
        modal.find('#data-despesaEdit').val(recipientdata);
        modal.find('#tipo-despesaEdit').val(recipienttipo);


    });
    
    $('#andamentoEdit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes
        var recipientdata = button.data('whateverdata');
        var recipienttexto = button.data('whatevertexto');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        // modal.find('.modal-title').text('ID ' + recipient);
        modal.find('#idAndamento').val(recipient);
        modal.find('#dataAndamentoEdit').val(recipientdata);
        modal.find('#textoDescricaoEdit').val(recipienttexto);

    });
    
    $('#arquivosEdit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes
        var recipientdata = button.data('whateverdata');
        var recipientdescricao = button.data('whateverdescricao');
        var recipientarq = button.data('whateverarq');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        // modal.find('.modal-title').text('ID ' + recipient);
        modal.find('#idArquivo').val(recipient);
        modal.find('#dataArquivoEdit').val(recipientdata);
        modal.find('#descricaoArquivoEdit').val(recipientdescricao);
        modal.find('#arquivoAnteriorEdit').val(recipientarq);

    });
     
    $("#fase").on("change", function(){
        
        var fase = $("#fase option:selected").val();
                
        if (fase == 7) {
            $("#exibeConclusao").css('display', 'block');
        }else{
            $("#exibeConclusao").css('display', 'none');
        }
        
    });
    
    $("#posicao").on("change", function(){
        
        var fase = $("#posicao option:selected").val();
                
        if (fase == 1) {
            $("#tela1").css('display', 'block');
            $("#tela2").css('display', 'none');
            $("#tela3").css('display', 'none');
            $("#tela4").css('display', 'none');
        }else if (fase == 2){
            $("#tela1").css('display', 'none');
            $("#tela2").css('display', 'block');
            $("#tela3").css('display', 'none');
            $("#tela4").css('display', 'none');
        }else if (fase == 3){
            $("#tela1").css('display', 'none');
            $("#tela2").css('display', 'none');
            $("#tela3").css('display', 'block');
            $("#tela4").css('display', 'none');
        }else if (fase == 4){
            $("#tela1").css('display', 'none');
            $("#tela2").css('display', 'none');
            $("#tela3").css('display', 'none');
            $("#tela4").css('display', 'block');
        }
        
    });
 
    
</script>

    
<script>
    function varitext(text){
        text=document
        print(text)
    }
</script>

<style>
@media print {
    
    nav, footer, #btnPrint{ 
    display:none; 
    }

}
</style>