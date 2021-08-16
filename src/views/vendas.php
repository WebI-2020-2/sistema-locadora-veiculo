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

<body class="bg-secondary">

    <div class="container">
        <h1 class="display-1 text-center text-light">Aluguel</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="../../index.php" class="nav-item nav-link active bg-danger" >Voltar </a>
            <a href="./realizar-venda.php"  class="nav-item nav-link active bg-success">Realizar Aluguel</a>
        </nav>
        <table class="table table-striped " id="table">
            <thead class="table-dark">
                <tr>
                <th></th>
                <th>Cliente</th>
                <th>diaria</th>
                <th>datalocacao</th>
                <th>combustivelatual</th>
                <th>Veiculo</th>
                <th>Ativo</th>
                <th></th>
  </tr>
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

                    foreach ($aluguels->findAll() as $aluguel) {
                        $R=$aluguel->getativo(); if($R== 1){$r="sim";}else{$r = "não";}    ?>
                        <tr class="text-light">
                            <td> <?= $aluguel->getidaluguel() ?> </td>
                            <td> <?= $clientes->findOne($aluguel->getidcliente())->getnome() ?> </td>
                            <td> <?= "R$ ",$aluguel->getdiaria() ?> </td>
                            <td> <?= $aluguel->getdatalocacao() ?> </td>
                            <td> <?= $aluguel->getcombustivelatual(),"l" ?> </td>
                            <td> <?= $aluguel->getnome() ?> </td>
                            <td> <?=$r ?> </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="./editar-venda.php?id=<?= $aluguel->getidaluguel() ?>" class="btn btn-success">editar</a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>