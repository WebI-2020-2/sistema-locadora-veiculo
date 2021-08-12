<?php

require '../controller/ClientesController.php';
if (!$_GET) header('Location: ./clientes.php');;
$idcliente = $_GET['id'];
$cliente = new ClientesController();
$cliente->setidcliente($idcliente);
$cliente->setNome($cliente->findOne($idcliente)->getNome());
$cliente->setemail($cliente->findOne($idcliente)->getemail());
$cliente->setendereco($cliente->findOne($idcliente)->getendereco());
$cliente->settelefone($cliente->findOne($idcliente)->gettelefone());

?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="bg-secondary">
    <div class="container">

        <h1 class="display-1 text-center text-light">Atualizar Cliente</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./clientes.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>

        <form class='form' action="./editarCliente.php?id=<?= $cliente->getidcliente() ?>" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label text-light">Nome completo</label>
                <input type="text" pattern="[a-zA-Z\s]+$" title="somente letras, por favor"  value="<?= $cliente->getNome() ?>" name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input">
                    <label for="email" class="form-label text-light">email</label>
                    <input type="email" value="<?= $cliente->getemail() ?>" step="any" name="email" class="form-control" id="email" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input">
                    <label for="endereco" class="form-label text-light">Endereco</label>
                    <input type="text"  value="<?= $cliente->getendereco() ?>" step="any" name="endereco" class="form-control" id="endereco" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input">
                    <label for="telefone" class="form-label text-light">Telefone</label>
                    <input type="text" name="telefone"  value="<?=$cliente->gettelefone()?>" class="form-control" id="telefone" autocomplete="off" data-mask="(00) 00000-0000" maxlength="15"  required>
                </div>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>

         <?php

        if (!$_POST) return;
        $cliente->setnome($_POST['nome']);
        $cliente->setemail($_POST['email']);
        $cliente->settelefone($_POST['telefone']);
        $cliente->setendereco($_POST['endereco']);
        try {
            $cliente->update($idcliente);
            header("Location: ./clientes.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar o cliente!';
        }

        ?>
    </div>
</body>
<script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</html>