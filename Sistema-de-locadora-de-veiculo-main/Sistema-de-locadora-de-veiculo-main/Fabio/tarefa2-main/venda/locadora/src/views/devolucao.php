<?php
require_once '../controller/devolucaoController.php';
require_once '../controller/veiculoController.php';
require_once '../controller/ItensVendaController.php';
require_once '../controller/VendasController.php';

$devolucaos = new devolucaoController();
$veiculos = new veiculoController();
$itemaluguel = new ItensVendaController();
$aluguels = new VendasController();

?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolucao</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">Devolução</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
        <a href="./cadastrardevolucao.php" class="btn btn-sm btn-primary">Cadastrar devolução</a><br>

        </div>
        <table class="table table-striped" id="table">
            <thead class="table-dark">
                <th></th>
                <th>Avaria</th>
                <th>Extra</th>
                <th>Data_devolução</th>
                <th>Combustivel_devolucao</th>
                <th></th>

            </thead>
            <tbody>
                <?php


                foreach ($devolucaos->findAll() as $devolucao) { ?>
                    <tr>
                        <td> <?= $devolucao->getiddevolucao() ?> </td>
                        <td> <?= $devolucao->getavaria() ?> </td>
                        <td> <?= $devolucao->getextra() ?> </td>
                        <td> <?= $devolucao->getdatadevolucao() ?> </td>
                        <td> <?= $devolucao->getcombustiveldevolucao() ?> </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editardevolucao.php?id=<?= $devolucao->getiddevolucao() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagardevolucao.php?id=<?= $devolucao->getiddevolucao() ?>"  onclick="return confirm('Tem certeza de que deseja excluir este item?');"class="btn btn-outline-danger">apagar</a>
                                <br>
                            </div>
                        </td>
                    </tr> <?php
                        }
                            ?>
            </tbody>
        </table>
    </div>

</body>
<script src="../../public/js/delCliente.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</html>