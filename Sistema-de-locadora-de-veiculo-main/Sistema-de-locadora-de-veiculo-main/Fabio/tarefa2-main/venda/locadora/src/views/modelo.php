<?php
require '../controller/modeloController.php';
$modelos = new modeloController();
?>

<!DOCTYPE html>
<html lang="pt_br">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="text-center">

    <div class="container">
        <h1 class="p-1 title">modelo</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
            <a href="./cadastrarmodelo.php" class="btn btn-sm btn-primary">Cadastrar modelo de carro</a><br>
        </div>
        <table class="table table-striped " id="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Modelo</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($modelos->findAll() as $modelo) : ?>
                    <tr>
                        <td> <?= $modelo->getidmodelo() ?> </td>
                        <td> <?= $modelo->getdescricao() ?> </td>

                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editarmodelo.php?id=<?= $modelo->getidmodelo() ?>" class="btn btn-success">editar</a><br>
                                 <a href="./apagarmodelo.php?id=<?= $modelo->getidmodelo() ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"class="btn btn-outline-danger">apagar</a>
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