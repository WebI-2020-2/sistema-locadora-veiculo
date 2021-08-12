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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="cpf" class="form-label text-light">CPF</label>
                    <input type="text" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" \ title="somente numero,Digite um CPF no formato: xxx.xxx.xxx-xx"  value="<?= $funcionario->getCpf() ?>" step="any" name="cpf" class="form-control" id="cpf" required>
                </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>