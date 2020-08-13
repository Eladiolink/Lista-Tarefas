<?php
session_start();
print_r(($_GET));
if(isset($_GET['logoff']) && $_GET['logoff']='true'){
    session_destroy();
    header('Location:../../Tarefas/index.html');
}


?>