<?php
shell_exec('mpc play ' . $_GET['station']);
header('Location:../index.php');
?>