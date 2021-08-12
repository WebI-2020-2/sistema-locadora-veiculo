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

<body class="bg-secondary">

    <div class="container">
        <h1 class="display-1 text-center text-light">Devolução</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="../../index.php" class="nav-item nav-link active bg-danger" >Voltar </a>
            <a href="./cadastrardevolucao.php"  class="nav-item nav-link active bg-success">Realizar Devolução</a>
        </nav>
        <table class="table table-striped" id="table">
            <thead class="table-dark">
                <th></th>
                <th>Total</th>
                <th>Extra</th>
                <th>Data_devolução</th>
                <th>Combustivel_devolucao</th>
                <th>ID_Aluguel</th>
                <th></th>
            </thead>
            <tbody>
                <?php


                foreach ($devolucaos->findAll() as $devolucao) { ?>
                    <tr class=" text-light">
                        <td> <?= $devolucao->getiddevolucao() ?> </td>
                        <td> <?= $devolucao->gettotal() ?> </td>
                        <td> <?= $devolucao->getextra() ?> </td>
                        <td> <?= $devolucao->getdatadevolucao() ?> </td>
                        <td> <?= $devolucao->getcombustiveldevolucao() ?> </td>
                        <td> <?= $devolucao->getidaluguel() ?> </td>
                    </tr> <?php
                        }
                            ?>
            </tbody>
        </table>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</html>