<?php
require_once '../controller/ItensVendaController.php';
require_once '../controller/veiculoController.php';
require '../controller/ClientesController.php';
require_once '../controller/VendasController.php';
if (!$_GET) header('Location: ./Vendas.php');;
$idaluguel = $_GET['id'];
$clientes = new ClientesController();
$veiculos = new veiculoController();
$aluguel = new VendasController();
$itemaluguel = new ItensVendaController();
$aluguel->setidaluguel($idaluguel);
$aluguel->setdiaria($aluguel->findOne($idaluguel)->getdiaria());
$aluguel->setidcliente($aluguel->findOne($idaluguel)->getidcliente());
$aluguel->setdatalocacao($aluguel->findOne($idaluguel)->getdatalocacao());
$aluguel->setcombustivelatual($aluguel->findOne($idaluguel)->getcombustivelatual());
$itemaluga = $itemaluguel->findidveiculo($idaluguel);
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluguel</title>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="bg-secondary">
    <div class="container">
        <h1 class="display-1 text-center text-light">Editar Aluguel</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./vendas.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>
        <form class='form' id="form" action="./editar-venda.php?id=<?= $idaluguel ?>" method="POST">
            <div class="mb-3"><br>
                <label for="idcliente" class="form-label text-light">Selecionar Cliente</label>
                <select name="idcliente" class="form-select" id="idcliente" required>
                    <option value="" selected disabled>Selecione um cliente</option>
                    <?php

                    foreach ($clientes->findAll() as $cliente) {
                        if ($cliente->getidcliente() == $aluguel->getIdCliente()) { ?>
                        <option selected value="<?= $cliente->getidcliente() ?>"><?= $cliente->getNome() ?></option> <?php
                    } else { ?>
                        <option value="<?= $cliente->getidcliente() ?>"><?= $cliente->getNome() ?></option> <?php
                    }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3"><br>
                <label for="idveiculo" class="form-label text-light">Selecionar veiculo</label>
                <select name="idveiculo" class="form-select" id="idveiculo" required>
                    <option value="" selected disabled>Selecione um veiculo</option>
                    <?php
                    foreach ($veiculos->findall() as $veiculo) {
                    if ($veiculo->getidveiculo() == $itemaluga) { ?>
                    <option selected value="<?= $veiculo->getidveiculo() ?>"><?= $veiculo->getNome() ?></option> <?php
                    } else { ?>
                    <option value="<?= $veiculo->getidveiculo() ?>"><?= $veiculo->getNome() ?></option> <?php
                    }
                    }
                    ?>
                </select>
            </div>
            <div class="input" style="width: 25% !important;">
                <label for="diaria" class="form-label text-light">diaria</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                    </div>
                    <input type="number" min="1" step="any"  value="<?= $aluguel->getdiaria() ?>" name="diaria" class="form-control" id="diaria" autocomplete="off" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="combustivelatual" class="form-label text-light">combustivel-atual</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Litros</span>
                    </div>
                    <input type="number" min="1" step="any"  value="<?= $aluguel->getcombustivelatual() ?>" name="combustivelatual" class="form-control" id="combustivelatual" autocomplete="off" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="datalocacao" class="form-label text-light">data-locacao</label>
                <input type="date" step="any"  value="<?= $aluguel->getdatalocacao() ?>" name="datalocacao" class="form-control" id="datalocacao" autocomplete="off" required>
            </div>

            <div class="button mt-3">
                <button type="submit" class="btn btn-lg btn-success">Atualizar Aluguel</button>
            </div>
        </form>
                 <?php

        if (!$_POST) return;
        $aluguel->setdiaria($_POST['diaria']);
        $aluguel->setcombustivelatual($_POST['combustivelatual']);
        $aluguel->setdatalocacao($_POST['datalocacao']);

        try {
            $aluguel->update($idaluguel);
            header("Location: ./vendas.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar o aluguel!';
        }

        ?>
    </div>
</body>

<!-- Atente-se para a ordem: primeiro jquery, depois locastyle, depois o JS do Bootstrap. -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

</html>