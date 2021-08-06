<?php
require '../controller/SeguroController.php';
$Seguros = new SeguroController();
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seguro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">Seguro</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
            <a href="./cadastrarseguro.php" class="btn btn-sm btn-primary">Cadastrar Seguro</a>
        </div>
        <table class="table table-striped " id="table">
            <thead>
                <tr>
                <th></th>
                <th>Valor</th>
                <th>Data-final</th>
                <th>Data-inicio</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($Seguros->findAll() as $Seguro) : ?>
                    <tr>
                        <td> <?= $Seguro->getidseguro() ?> </td>
                        <td> <?= $Seguro->getvalor() ?> </td>
                        <td> <?= $Seguro->getdatafinal() ?> </td>
                        <td> <?= $Seguro->getdatainicio() ?> </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editarSeguro.php?id=<?= $Seguro->getidseguro() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagarSeguro.php?id=<?= $Seguro->getidseguro() ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"class="btn btn-outline-danger">apagar</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</body>

<script src="../../public/js/delCliente.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</html>