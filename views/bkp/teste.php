<html>
    <head>
        <title>title</title>
        <meta charset='utf-8' />
		<title>Agenda</title>
		<link href='<?= HOME; ?>/assets/cssCK/bootstrap.min.css' rel='stylesheet'>
		<link href='<?= HOME; ?>/assets/cssCK/fullcalendar.min.css' rel='stylesheet' />
		<link href='<?= HOME; ?>/assets/cssCK/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='<?= HOME; ?>/assets/cssCK/personalizado.css' rel='stylesheet' />
		<script src='<?= HOME; ?>/assets/jsCK/jquery.min.js'></script>
		<script src='<?= HOME; ?>/assets/jsCK/bootstrap.min.js'></script>
		<script src='<?= HOME; ?>/assets/jsCK/moment.min.js'></script>
		<script src='<?= HOME; ?>/assets/jsCK/fullcalendar.min.js'></script>
		<script src='<?= HOME; ?>/assets/localeCK/pt-br.js'></script>
                <script>
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
                                            {
                                                id: '1',
                                                title: 'Reunião',
                                                start: '2018-09-23 09:00:00',
                                                end: '2018-09-23 11:00:00',
                                                color: '#0071c5',
                                            },
                                            {
                                                id: '2',
                                                title: 'Reunião 2',
                                                start: '2018-09-24 09:00:00',
                                                end: '2018-09-24 11:00:00',
                                                color: '#0071c5',
                                            }
                                        ]
				});
			});
                    });
                </script>
    </head>
    <body>
        <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">

                    <div class="x_title">
                      <h2>Agenda</h2>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                      <div id='calendar'></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </body>
</html>