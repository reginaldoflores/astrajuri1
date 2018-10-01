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
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <form method="post">
              <h1>Login</h1>
                <?php if(isset($erro) && !empty($erro)): ?>
                <div class="warning">
                    <?= $erro; ?>
                <br>
                </div>
                <?php endif; ?>;
              
              <div>
                  <input type="text" class="form-control" name="login" placeholder="Usuário" required="" />
              </div>
              <div>
                  <input type="password" class="form-control" name="senha" placeholder="Senha" required="" />
              </div>
              <div>
                  <input type="submit" class="btn btn-default submit" value="Entrar"/>
                  <input type="submit" class="btn btn-default reset" value="Cancelar"/>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
         
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1> Astrajuri</h1>
                  <p>©2018 Todos os direitos reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
		
      </div>
    </div>
  </body>
</html>
