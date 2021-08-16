<?php
require '../controller/seguroController.php';
$Seguros = new seguroController();
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seguro</title>
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="bg-secondary">

    <div class="container">
        <h1 class="display-1 text-center text-light">Seguro</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./veiculo.php" class="nav-item nav-link active bg-danger" >Voltar </a>
            <a href="./cadastrarseguro.php" class="nav-item nav-link active bg-success">Cadrastrar Seguro</a>
        </nav>
        <table class="table table-striped " id="table">
            <thead class="table-dark">

                <th></th>
                <th>Valor</th>
                <th>Data-final</th>
                <th>Data-inicio</th>
                <th></th>

            </thead>
            <tbody>
                <?php
                foreach ($Seguros->findAll() as $Seguro) : ?>
                    <tr class="text-light">
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

<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>-->


</html>