<?php
header('Location:../index.php');
shell_exec('mpc clear');
shell_exec('mpc load station');
sleep( 2 );
shell_exec('mpc play');
header('Location:../index.php');
?>