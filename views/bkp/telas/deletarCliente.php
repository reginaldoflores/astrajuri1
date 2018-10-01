<?php
session_start();
require_once '../classes/Usuario.php'; 

$u = new Usuario();
        if ($u->isLogged() == false):
            ?>
            <script language="javascript">
                window.location.href = "login.php";
            </script>
        <?php endif; ?>
        <?php
        require_once '../classes/Cliente.php';
        $c = new Cliente();

        if (isset($_GET['s']) && !empty($_GET['s'])) {
            $id = addslashes($_GET['s']);
            $c->deletarClienteFisico($id);
        } else {
            ?>
            <script language="javascript">
                window.location.href = "listaCliente.php";
            </script>
<?php }




