<?php
session_start();
if (!$_SESSION['login']) {
    header("Location:../../Tarefas/singIn.php?log=login");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizadas</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--  CUSTOM CSS -->
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/singin.css">
    <link rel="stylesheet" href="./style/home_page.css">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/5817f81cae.js" crossorigin="anonymous"></script>
</head>

<body onresize="rezise()" onload="rezise()">
    <div id="content" class="">
        <nav class="navbar navbar-expand-sm navbar-dark bg-danger">
            <a href="home.php" class="navbar-brand">We Plus</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="nav">

                <ul id="list" class="navbar-nav ml-auto">

                    <li class="nav-item" id='dropdown_sm'>
                        <a href="home.php" class="nav-link ">Tarefas</a>
                    </li>

                    <li class="nav-item ex">
                        <a class="nav-link" href="pendentes.php">Pendentes</a>
                    </li>

                    <li class="nav-item ex">
                        <a class="nav-link active" href="finalizadas.php">Finalizadas</a>
                    </li>

                    <li id="logoff" class="nav-item">
                        <a onclick="logoff()" class="nav-link">Logoff</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="d-flex flex-column align-items-center">

            <div class="mt-sm-3" id="adicionar-tarefa">
                <button class="btn btn-danger col-12" value="excluir" id="btn-tarefa">Limpar Tarefas Finalizar</button>
                <input type="hidden" id="id" value="<?=$_SESSION['id_usuario']?>">
            </div>

 
            <div id="todas-tarefas" class="mt-3">
                <h1 class="h5 mt-2 ml-3">Tarefas Finalizadas</h1>

                <div id="test" class="pb-2">
                    <div id="edit">

                    </div>
                </div>


            </div>
        </main>
    </div>

    <input type="hidden" value="Finalizada" id="title">
    <!-- BOOTSTRAO JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- CUSTOM JS -->

    <script>
        function logoff() {
            window.location = "../security/Tarefas/home.php?logoff=true"
        }
    </script>
    <script src="./scripts/dropdown_nav.js"></script>
    <script src="./scripts/ajax.js"></script>
</body>

</html>