<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Astrajuri</title>
    
    <!-- Bootstrap -->
    <link href="<?= HOME; ?>/assets/bootstrap/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= HOME; ?>/assets/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= HOME; ?>/assets/bootstrap/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= HOME; ?>/assets/bootstrap/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?= HOME ?>/assets/css/custom.min.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="<?= HOME; ?>/assets/bootstrap/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
    
    <!-- FullCalendar-->
    <link href="<?= HOME; ?>/assets/bootstrap/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?= HOME; ?>/assets/bootstrap/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    
    <link href="<?= HOME ?>/assets/css/template.css" rel="stylesheet">
    <link href='<?= HOME; ?>/assets/cssCK/personalizado.css' rel='stylesheet' />

    
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?= HOME; ?>" class="site_title"><span>Astrajuri</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                      <div class="profile_pic">
                        <img src="<?= HOME; ?>/assets/images/img.jpg" alt="..." class="img-circle profile_img">
                      </div>
                      <div class="profile_info">
                        <span>Bem Vindo,</span>
                        <h2><?= utf8_encode($viewData['dados_user']['pessoa']['Nome']); ?></h2>
                      </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- menu lateral -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">

                            <li><a href="<?= HOME; ?>/home"><i class="fa fa-calendar"></i> Agenda </a></li>              
                            <li>
                            <a><i class="fa fa-file-text-o"></i> Cadastros <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                        <li><a href="<?= HOME; ?>/clientes">Cliente</a></li>
                                        <?php if($viewData['dados_user']['idPerfil'] == 3): ?>
                                            <li><a href="<?= HOME; ?>/usuarios">Usuário</a></li>
                                        <?php endif; ?>
                                        <?php if($viewData['dados_user']['idPerfil'] != 1):?>
                                            <li><a href="<?= HOME; ?>/processofull">Processo</a></li>
                                            <li><a href="<?= HOME; ?>/comarca">Comarca</a></li>
                                        <?php endif; ?>
                                        
                                </ul>
                            </li>
                           

                            <?php if($viewData['dados_user']['idPerfil'] == 3): ?>
                             <li><a href="<?= HOME; ?>/financeiro"><i class="fa fa-money"></i> Financeiro </a></li>
                            <li><a><i class="fa fa-bar-chart-o"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="chartjs.html">1</a></li>
                                    <li><a href="chartjs2.html">2</a></li>
                                    <li><a href="morisjs.html">3</a></li>
                                    <li><a href="echarts.html">4</a></li>
                                    <li><a href="other_charts.html">5</a></li>
                                </ul>
                            </li>
                            <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                    <!-- /menu lateral -->

                    <div class="sidebar-footer hidden-small">
                      <a data-toggle="tooltip" data-placement="top" title="Configrações">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                      </a>

                        <a data-toggle="tooltip" data-placement="top" title="Sair" href="<?= HOME; ?>/login/logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                      </a>
                    </div>

                </div>
            </div>

            <div class="top_nav">
              <div class="nav_menu">
                <nav>
                  <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>

                  <ul class="nav navbar-nav navbar-right">
                    <li class="">
                      <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?= HOME; ?>/assets/images/img.jpg" alt=""><?= utf8_encode($viewData['dados_user']['pessoa']['Nome']); ?>
                        <span class=" fa fa-angle-down"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Perfil</a></li>
                        <li>
                          <a href="javascript:;">
                            <span>Configurações</span>
                          </a>
                        </li>
                        <li><a href="<?= HOME; ?>/login/logout"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                      </ul>
                    </li>

                  </ul>
                </nav>
              </div>
            </div>
            
            <div>
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            </div>
          
        </div>   
    </div>
</body>
</html>
