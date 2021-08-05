<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">Aluguel</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-outline-primary">Volatar </a>
            <a href="./realizar-venda.php" class="btn btn-sm btn-outline-primary">Realizar Aluguel</a>
        </div>
        <table class="table">
            <thead class="table-dark">
                <th>#</th>
                <th>Cliente</th>
                <th>total</th>
                <th>pago</th>
                <th>diaria</th>
                <th>desconto</th>
                <th>troco</th>
                <th>datalocacao</th>
                <th>combustivelatual</th>
                <th>veiculo</th>
                <th></th>
            </thead>
            <tbody>
                <?php

                    require_once '../controller/VendasController.php';
                    require_once '../controller/ClientesController.php';
                    require_once '../controller/ItensVendaController.php';
                    require_once '../controller/veiculoController.php';

                    $aluguels = new VendasController();
                    $clientes = new ClientesController();
                    $itemaluguel = new ItensVendaController();
                    $veiculos = new veiculoController();

                    foreach ($aluguels->findAll() as $aluguel) { ?>
                        <tr>
                            <td> <?= $aluguel->getidaluguel() ?> </td>
                            <td> <?= $clientes->findOne($aluguel->getidcliente())->getnome() ?> </td>
                            <td> <?= $aluguel->gettotal() ?> </td>
                            <td> <?= $aluguel->getpago() ?> </td>
                            <td> <?= $aluguel->getdiaria() ?> </td>
                            <td> <?= $aluguel->getdesconto() ?> </td>
                            <td> <?= $aluguel->gettroco() ?> </td>
                            <td> <?= $aluguel->getdatalocacao() ?> </td>
                            <td> <?= $aluguel->getcombustivelatual() ?> </td>
                            <td> <?= $veiculos->findOne($aluguel->getidveiculo())->getnome() ?> </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="./editar-venda.php?id=<?= $aluguel->getidaluguel() ?>" class="btn btn-outline-success">editar</a>
                                <a href="./apagar-venda.php?id=<?= $aluguel->getidaluguel() ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"class="btn btn-outline-danger">apagar</a>
                                </div>
                            </td>
                        </tr> <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>

<script src="../../public/js/delVenda.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>