<?php
session_start();
require '../classes/Usuario.php';
$u = new Usuario();
$u->logout();
?>
<script language="javascript">
    window.location.href = "login.php";
</script>

