<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singin</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!--  CUSTOM CSS -->
    <link rel="stylesheet" href="./style/main.css">
    <link rel="stylesheet" href="./style/singin.css">
</head>

<body>
    <div id="content" class="">
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-danger">
            <a href="index.html" class="navbar-brand">We Plus</a>
            <div class="ml-auto" id="nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="singIn.php" class="nav-link active">Login</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main id="main" class="d-flex flex-column align-items-center justify-content-center">

            <!-- LOGS PHP -->
            <?if(isset($_GET['erro']) && $_GET['erro']=='exist'){?>

            <div class="alert text-light bg-info alert-dismissible fade show" role="alert">
                Email já cadastrado!

                <button type="button" class='close' data-dismiss="alert" arial-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>

            <?}elseif(isset($_GET['log']) && $_GET['log']=='pass'){?>
            <div class="alert bg-danger" role="alert">
                <span class="text-light bg-danger mr-2">
                     Senha inválida!
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <?}elseif(isset($_GET['log']) && $_GET['log']=='cadastrado'){?>
            <div class="alert bg-success" role="alert">
                <span class="mr-2  text-light">
                    Cadastrado com sucesso!
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <?}elseif(isset($_GET['log']) && $_GET['log']=='notExist'){?>
                <div class="alert bg-warning" role="alert">
                <span class="mr-2 text-light">
                    Usúario não cadastrado!
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
           
            <?}?>

            <!-- FORMULARIO -->
            <form class="d-flex flex-column align-items-center justify-content-center" action="../security/Tarefas/login.php" method="POST">
                <div class="form-group px-3 mt-3">
                    <label class="text-light" for="email">Email</label>
                    <input id="email" name="email" class="form-control" required type="email">

                </div>
 
                <div class="form-group px-3">
                    <label class="text-light" for="pass">Senha</label>
                    <input id="pass" name="senha" class="form-control" required type="password">

                </div>
                <?if(isset($_GET['log']) && $_GET['log']=='pass'){?>
                    <p class="text-light">Esqueceu a senha? <a id="link" href="singup.html">Redefinir Senha</a></p>
               <?}else{?>
                <p class="text-light">Não possui conta? <a id="link" href="singup.html">Criar conta</a></p>
                <?}?>
                <div class=" d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-outline-success px-4">Logar</button>

                </div>


            </form>

        </main>

    </div>


</body>
<!-- BOOTSTRAO JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="./scripts/ajax.js"></script>

</html>