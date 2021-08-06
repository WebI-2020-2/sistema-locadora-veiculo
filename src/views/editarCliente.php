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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body>
    <div class="container">

        <h1 class="p-1 title">Atualizar Cliente</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' action="./editarCliente.php?id=<?= $cliente->getidcliente() ?>" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero" minlength="10" value="<?= $cliente->getNome() ?>" name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input">
                    <label for="email" class="form-label">email</label>
                    <input type="email" value="<?= $cliente->getemail() ?>" step="any" name="email" class="form-control" id="email" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input">
                    <label for="endereco" class="form-label">Endereco</label>
                    <input type="text" pattern="[a-z\s]+$" / \ title="sem numero"  minlength="10" value="<?= $cliente->getendereco() ?>" step="any" name="endereco" class="form-control" id="endereco" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel"  name="telefone"  \ pattern="^(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})$"  \ title="Digite um telefone valido " value="<?= $cliente->gettelefone() ?>" step="any" name="telefone" class="form-control" id="telefone" required>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>