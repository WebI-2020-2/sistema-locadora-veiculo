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

<body class="bg-secondary">

    <div class="container">
        <h1 class="display-1 text-center text-light">Veiculo</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="../../index.php" class="nav-item nav-link active bg-danger" >Voltar </a>
            <a href="./seguro.php" class="nav-item nav-link active ">Seguros</a>
            <a href="./tipoveiculo.php" class="nav-item nav-link active">Tipos</a>
            <a href="./modelo.php" class="nav-item nav-link active">Modelos</a>
            <a href="./cadastrarveiculo.php" class="nav-item nav-link active bg-success">Cadastrar Veiculo</a>
        </nav>

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
                    <tr class="text-light">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</html>