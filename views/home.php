<div class="right_col" role="main">

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                
                <div class="x_title">
                  <h2>Agenda</h2>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                   
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
		
			<div id='calendar'></div>
                </div>
                
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center">Dados do Evento</h4>
            </div>
            <div class="modal-body">
                <div class="visualizar">
                    <dl class="dl-horizontal">
                        <dt>Compromisso</dt>
                        <dd id="title"></dd>
                        <dt>Inicio</dt>
                        <dd id="start"></dd>
                        <dt>Fim</dt>
                        <dd id="end"></dd>
                        <dt>Texto</dt>
                        <dd id="texto"></dd>
                        <dt>Advogado</dt>
                        <dd id="advogado"></dd>
                        <dt>Cliente</dt>
                        <dd id="cliente"></dd>
                    </dl>
                    <button class="btn btn-canc-vis btn-warning">Editar</button>
                    <a href="#" id="btExcluirEvento" class="btn btn-danger" data-confirm="Tem Certeza que Deseja Excluir o Compromisso Selecionado?">Excluir</a>
                </div>
                <div class="form">
                    <form class="form-horizontal" method="POST">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Compromisso</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Titulo do Evento">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tipo</label>
                            <div class="col-sm-10">
                                <select name="color" class="form-control" id="color">
                                <option value="">Selecione</option>			
                                <option style="color:#FFD700;" value="#FFD700">Reunião</option>	
                                <option style="color:#FF4500;" value="#FF4500">Audiência</option>
                                <option style="color:#436EEE;" value="#436EEE">Outros</option>
                                <option style="color:#8B0000;" value="#8B0000">Prazo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Inicio</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Fim</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Advogado</label>
                            <div class="col-sm-10">
                                <input type="text" <?= (isset($advogadoTrue) && !empty($advogadoTrue) && $advogadoTrue == 'sim')? 'disabled="disabled"':''; ?> value="<?= (isset($advogadoTrue) && !empty($advogadoTrue) && $advogadoTrue == 'sim')? utf8_encode($dados_user['pessoa']['Nome']):''; ?>" id="advogado" list="listaAdvogado" name="advogado" class="form-control col-md-7 col-xs-12">
                                <datalist id="listaAdvogado">
                                    <?php foreach($advogados as $advogado): ?>
                                        <option value="<?= utf8_encode($advogado['nome']); ?>"><?= $advogado['OAB']; ?></option>
                                        <input type="hidden" name="idAdv" id="idAdv" value="<?= $advogado['idAdvogado']; ?>" />
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Cliente</label>
                            <div class="col-sm-10">
                                <input type="text" id="cliente" list="listaCliente" name="cliente" class="form-control col-md-7 col-xs-12">
                                <datalist id="listaCliente">
                                    <?php foreach($clientes as $cliente): ?>
                                        <option value="<?= utf8_encode($cliente['Nome']); ?>"><?= $cliente['CPF']; ?><input type="hidden" name="cpf_cnpj" id="cpf_cnpj" value="<?= $cliente['idContato']; ?>"></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label" id="texto">Texto</label>
                            <div class="col-sm-10">
                                <textarea class="resizable_textarea form-control" id="texto" name="texto" placeholder="Digite o andamento..."></textarea>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="id" id="id">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-canc-edit btn-primary">Cancelar</button>
                                <button type="submit" class="btn btn-warning">Salvar Alterações</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
		
<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Cadastrar Evento</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Compromisso</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Titulo do Evento">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tipo</label>
                        <div class="col-sm-10">
                            <select name="color" class="form-control" id="color">
                            <option value="">Selecione</option>			
                            <option style="color:#FFD700;" value="#FFD700">Reunião</option>	
                            <option style="color:#FF4500;" value="#FF4500">Audiência</option>
                            <option style="color:#436EEE;" value="#436EEE">Outros</option>
                            <option style="color:#8B0000;" value="#8B0000">Prazo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Inicio</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Fim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Advogado</label>
                        <div class="col-sm-10">
                            <input type="text" <?= (isset($advogadoTrue) && !empty($advogadoTrue) && $advogadoTrue == 'sim')? 'disabled="disabled"':''; ?> value="<?= (isset($advogadoTrue) && !empty($advogadoTrue) && $advogadoTrue == 'sim')? utf8_encode($dados_user['pessoa']['Nome']):''; ?>" id="advogado" list="listaAdvogado" name="advogado" class="form-control col-md-7 col-xs-12">
                            <datalist id="listaAdvogado">
                                <?php foreach($advogados as $advogado): ?>
                                    <option value="<?= utf8_encode($advogado['nome']); ?>"><?= $advogado['OAB']; ?></option>
                                    <input type="hidden" name="idAdv" id="idAdv" value="<?= $advogado['idAdvogado']; ?>" />
                                <?php endforeach; ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Cliente</label>
                        <div class="col-sm-10">
                            <input type="text" id="cliente" list="listaCliente" name="cliente" class="form-control col-md-7 col-xs-12">
                            <datalist id="listaCliente">
                                <?php foreach($clientes as $cliente): ?>
                                <option value="<?= utf8_encode($cliente['Nome']); ?>"><?= $cliente['CPF']; ?><input type="hidden" name="cpf_cnpj" id="cpf_cnpj" value="<?= $cliente['idContato']; ?>"></option>
                                <?php endforeach; ?>
                            </datalist>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label" id="texto">Texto</label>
                        <div class="col-sm-10">
                            <textarea class="resizable_textarea form-control" id="texto" name="texto" placeholder="Digite o andamento..."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                    </div>
                </form>
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
    <!-- FullCalendar -->
    <script src="<?= HOME; ?>/assets/bootstrap/moment/min/moment.min.js"></script>
    <script src="<?= HOME; ?>/assets/bootstrap/fullcalendar/dist/fullcalendar.min.js"></script>
    
    <script src='<?= HOME; ?>/agenda/locale/pt-br.js'></script>
    
    <!-- Custom Theme Scripts -->
<!--    <script src='<?= HOME; ?>/assets/js/custom.js'></script>-->
    
    
    <script>
        $('.btn-canc-vis').on("click", function() {
                $('.form').slideToggle();
                $('.visualizar').slideToggle();
        });
        $('.btn-canc-edit').on("click", function() {
                $('.visualizar').slideToggle();
                $('.form').slideToggle();
        });
    </script>
    

    <script>
        
        (function($,sr){
            // debouncing function from John Hann
            // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
            var debounce = function (func, threshold, execAsap) {
              var timeout;

                return function debounced () {
                    var obj = this, args = arguments;
                    function delayed () {
                        if (!execAsap)
                            func.apply(obj, args); 
                        timeout = null; 
                    }

                    if (timeout)
                        clearTimeout(timeout);
                    else if (execAsap)
                        func.apply(obj, args);

                    timeout = setTimeout(delayed, threshold || 100); 
                };
            };

            // smartresize 
            jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

        })(jQuery,'smartresize');
       
       var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
        $BODY = $('body'),
        $MENU_TOGGLE = $('#menu_toggle'),
        $SIDEBAR_MENU = $('#sidebar-menu'),
        $SIDEBAR_FOOTER = $('.sidebar-footer'),
        $LEFT_COL = $('.left_col'),
        $RIGHT_COL = $('.right_col'),
        $NAV_MENU = $('.nav_menu'),
        $FOOTER = $('footer');

        // Sidebar
        function init_sidebar() {
        // TODO: This is some kind of easy fix, maybe we can improve this
        var setContentHeight = function () {
                // reset height
                $RIGHT_COL.css('min-height', $(window).height());

                var bodyHeight = $BODY.outerHeight(),
                        footerHeight = $BODY.hasClass('footer_fixed') ? -10 : $FOOTER.height(),
                        leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
                        contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

                // normalize content
                contentHeight -= $NAV_MENU.height() + footerHeight;

                $RIGHT_COL.css('min-height', contentHeight);
        };
        
        $SIDEBAR_MENU.find('a').on('click', function(ev) {
                console.log('clicked - sidebar_menu');
              var $li = $(this).parent();

              if ($li.is('.active')) {
                  $li.removeClass('active active-sm');
                  $('ul:first', $li).slideUp(function() {
                      setContentHeight();
                  });
              } else {
                  // prevent closing menu if we are on child menu
                  if (!$li.parent().is('.child_menu')) {
                      $SIDEBAR_MENU.find('li').removeClass('active active-sm');
                      $SIDEBAR_MENU.find('li ul').slideUp();
                  }else
                  {
                                      if ( $BODY.is( ".nav-sm" ) )
                                      {
                                              $SIDEBAR_MENU.find( "li" ).removeClass( "active active-sm" );
                                              $SIDEBAR_MENU.find( "li ul" ).slideUp();
                                      }
                              }
                  $li.addClass('active');

                  $('ul:first', $li).slideDown(function() {
                      setContentHeight();
                  });
              }
          });
          
          // toggle small or large menu 
        $MENU_TOGGLE.on('click', function() {
                        console.log('clicked - menu toggle');

                        if ($BODY.hasClass('nav-md')) {
                                $SIDEBAR_MENU.find('li.active ul').hide();
                                $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
                        } else {
                                $SIDEBAR_MENU.find('li.active-sm ul').show();
                                $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
                        }

                $BODY.toggleClass('nav-md nav-sm');

                setContentHeight();

                $('.dataTable').each ( function () { $(this).dataTable().fnDraw(); });
        });
        
        // check active menu
	$SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

	$SIDEBAR_MENU.find('a').filter(function () {
                        return this.href == CURRENT_URL;
                }).parent('li').addClass('current-page').parents('ul').slideDown(function() {
                        setContentHeight();
                }).parent().addClass('active');

                // recompute content when resizing
                $(window).smartresize(function(){  
                        setContentHeight();
                });

                setContentHeight();

                // fixed sidebar
                if ($.fn.mCustomScrollbar) {
                        $('.menu_fixed').mCustomScrollbar({
                                autoHideScrollbar: true,
                                theme: 'minimal',
                                mouseWheel:{ preventDefault: true }
                        });
                }
        };
          
        $(document).ready(function() {
            init_sidebar();			
	});	
        
    $(document).ready(function(){
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                    header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: Date(),
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    eventClick: function(event) {

                            $('#visualizar #id').text(event.id);
                            $('#visualizar #id').val(event.id);
                            $('#visualizar #title').text(event.title);
                            $('#visualizar #title').val(event.title);
                            $('#visualizar #cliente').text(event.idContato);
                            $('#visualizar #cliente').val(event.idContato);
                            $('#visualizar #advogado').text(event.idAdv);
                            $('#visualizar #advogado').val(event.idAdv);
                            $('#visualizar #texto').text(event.texto);
                            $('#visualizar #texto').val(event.texto);
                            $('#btExcluirEvento').attr('href', 'http://localhost/astrajuri/home/del/'+event.id);
                            $('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
                            $('#visualizar #start').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
                            $('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
                            $('#visualizar #end').val(event.end.format('DD/MM/YYYY HH:mm:ss'));
                            $('#visualizar #color').val(event.color);
                            $('#visualizar').modal('show');
                            return false;

                    },

                    selectable: true,
                    selectHelper: true,
                    select: function(start, end){
                            $('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
                            $('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
                            $('#cadastrar').modal('show');						
                    },
                    events: [
                        <?php foreach($eventos as $evento):?>
                                        
                        {
                            id: '<?= $evento['idCompromisso']; ?>',
                            title: '<?= utf8_encode($evento['Compromisso']); ?>',
                            start: '<?= $evento['DataInicio']; ?>',
                            end: '<?= $evento['DataFinal']; ?>',
                            color: '<?= $evento['Cor']; ?>',
                            idAdv: '<?= utf8_encode($evento['nomeAdvogado']); ?>',
                            idContato: '<?= utf8_encode($evento['nomeCliente']); ?>',
                            texto: '<?= utf8_encode($evento['Texto']); ?>',
                        },
                        <?php    endforeach; ?>

                    ]
            });
        });
    });
    
    //Mascara para o campo data e hora
    function DataHora(evento, objeto){
            var keypress=(window.event)?event.keyCode:evento.which;
            campo = eval (objeto);
            if (campo.value == '00/00/0000 00:00:00'){
                    campo.value=""
            }

            caracteres = '0123456789';
            separacao1 = '/';
            separacao2 = ' ';
            separacao3 = ':';
            conjunto1 = 2;
            conjunto2 = 5;
            conjunto3 = 10;
            conjunto4 = 13;
            conjunto5 = 16;
            if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
                    if (campo.value.length == conjunto1 )
                    campo.value = campo.value + separacao1;
                    else if (campo.value.length == conjunto2)
                    campo.value = campo.value + separacao1;
                    else if (campo.value.length == conjunto3)
                    campo.value = campo.value + separacao2;
                    else if (campo.value.length == conjunto4)
                    campo.value = campo.value + separacao3;
                    else if (campo.value.length == conjunto5)
                    campo.value = campo.value + separacao3;
            }else{
                    event.returnValue = false;
            }
    }

    $('a[data-confirm]').click(function(){
        var href = $(this).attr('href');
        if (!$('#confirm-delete').length) {
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="1" role="dialog" aria-labelledby="modalLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header">Excluir Entrada de Material<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja realmente excluir esta Entrada de Material?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataConfirmOk">Deletar</a></div></div></div></div>');
        }
        $('#dataConfirmOk').attr('href', href);
        $('#confirm-delete').modal({show:true});
        return false;
    });

    
    </script>