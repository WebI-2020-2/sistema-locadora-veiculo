<?php

require '../controller/funcionarioController.php';
if (!$_GET) header('Location: ./funcionario.php');;
$idfuncionario = $_GET['id'];
$funcionario = new funcionarioController();
$funcionario->setidfuncionario($idfuncionario);
$funcionario->setNome($funcionario->findOne($idfuncionario)->getNome());
$funcionario->setCpf($funcionario->findOne($idfuncionario)->getCpf());


?>

<!DOCTYPE html>
<html lang="pt_br">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionario</title>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="bg-secondary">
    <div class="container">

        <h1 class="display-1 text-center text-light">Atualizar Funcionario</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./funcionario.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>
        <form class='form' action="./editarfuncionario.php?id=<?= $funcionario->getidfuncionario() ?>" method="POST">
            <div class="mb-3"><br>
                <label for="nome" class="form-label text-light">Nome completo</label>
                <input type="text" pattern="[a-zA-Z\s]+$" title="somente letras, por favor"  value="<?= $funcionario->getNome() ?>" name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="cpf" class="form-label text-light">Nome completo</label>
                <input type="text"  \
            pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" \ title=" sem letras,Digite um CPF no formato: xxx.xxx.xxx-xx"  value="<?= $funcionario->getcpf() ?>" name="cpf" class="form-control" id="cpf" autocomplete="off" required>
            </div>

            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>

         <?php

        if (!$_POST) return;
        $funcionario->setnome($_POST['nome']);
        $funcionario->setcpf($_POST['cpf']);

        try {
            $funcionario->update($idfuncionario);
            header("Location: ./funcionario.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar o funcionario!';
        }

        ?>
    </div>
</body>
<!-- Atente-se para a ordem: primeiro jquery, depois locastyle, depois o JS do Bootstrap. -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

</html>