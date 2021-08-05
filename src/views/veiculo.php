<?php
require_once '../controller/veiculoController.php';
require_once '../controller/seguroController.php';
require_once '../controller/modeloController.php';
require_once '../controller/tipoveiculoController.php';
$veiculos = new veiculoController();
$seguros = new seguroController();
$modelos = new modeloController();
$tipoveiculos = new tipoveiculoController();

?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veiculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">veiculo</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
        <a href="./cadastrarveiculo.php" class="btn btn-sm btn-primary">Cadastrar Veiculo</a><br>

        </div>
        <table class="table table-striped" id="table">
            <thead class="table-dark">
                <th></th>
                <th>Valor do seguro</th>
                <th>Tipo-Veiculo</th>
                <th>ano</th>
                <th>cor</th>
                <th>Placa</th>
                <th>modelo</th>
                <th>Nome</th>
                <th>Status</th>               
                <th></th>

            </thead>
            <tbody>
                <?php


                foreach ($veiculos->findAll() as $veiculo) { ?>
                    <tr>
                        <td> <?= $veiculo->getidveiculo() ?> </td>
                        <td> <?= $seguros->findOne($veiculo->getidseguro())->getvalor() ?> </td>
                        <td> <?= $tipoveiculos->findOne($veiculo->getidtipoveiculo())->getdescricao() ?> </td>
                        <td> <?= $veiculo->getano() ?> </td>   
                        <td> <?= $veiculo->getcor() ?> </td>    
                        <td> <?= $veiculo->getplaca() ?> </td>     
                        <td> <?= $modelos->findOne($veiculo->getidmodelo())->getdescricao() ?> </td>                         
                        <td> <?= $veiculo->getnome() ?> </td>  
                        <td> <?= $veiculo->getstatus() ?> </td>       

                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editarveiculo.php?id=<?= $veiculo->getidveiculo() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagarveiculo.php?id=<?= $veiculo->getidveiculo() ?>"  onclick="return confirm('Tem certeza de que deseja excluir este item?');"class="btn btn-outline-danger">apagar</a>
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