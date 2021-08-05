<?php

require_once '../controller/veiculoController.php';
require '../controller/ClientesController.php';
require_once '../controller/VendasController.php';
if (!$_GET) header('Location: ./Vendas.php');;
$idaluguel = $_GET['id'];
$clientes = new ClientesController();
$veiculos = new veiculoController();
$aluguel = new VendasController();
$aluguel->setidaluguel($idaluguel);
$aluguel->setpago($aluguel->findOne($idaluguel)->getpago());
$aluguel->setdiaria($aluguel->findOne($idaluguel)->getdiaria());
$aluguel->setidcliente($aluguel->findOne($idaluguel)->getidcliente());
$aluguel->settotal($aluguel->findOne($idaluguel)->gettotal());
$aluguel->setdesconto($aluguel->findOne($idaluguel)->getdesconto());
$aluguel->settroco($aluguel->findOne($idaluguel)->gettroco());
$aluguel->setdatalocacao($aluguel->findOne($idaluguel)->getdatalocacao());
$aluguel->setcombustivelatual($aluguel->findOne($idaluguel)->getcombustivelatual());

?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluguel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body>
    <div class="container">
        <h1 class="p-1 title">Editar Aluguel</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-outline-primary">Voltar</a>
        </div>
        <form class='form' id="form" action="./editar-venda.php?id=<?= $idaluguel ?>" method="POST">
            <div class="mb-3">
                <label for="idcliente" class="form-label">Selecionar Cliente</label>
                
                <select name="idcliente" class="form-select" id="idcliente" disabled required>
                    <option value="" selected disabled>Selecione um cliente</option>
                    <?php
                        foreach ($clientes->findAll() as $cliente) { 
                            if ($cliente->getidcliente() == $aluguel->getidcliente()) { ?>
                                <option selected value="<?= $cliente->getidcliente() ?>"><?= $cliente->getNome() ?></option> <?php
                            } else { ?>
                                <option value="<?= $cliente->getidcliente() ?>"><?= $cliente->getNome() ?></option> <?php
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label"> total</label>
                <input type="number"  value="<?= $aluguel->gettotal() ?>" name="total" class="form-control" id="total" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="desconto" class="form-label"> desconto</label>
                <input type="number"  value="<?= $aluguel->getdesconto() ?>" name="desconto" class="form-control" id="desconto" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="troco" class="form-label"> troco</label>
                <input type="number"  value="<?= $aluguel->gettroco() ?>" name="troco" class="form-control" id="troco" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="diaria" class="form-label"> diaria</label>
                <input type="number"  value="<?= $aluguel->getdiaria() ?>" name="diaria" class="form-control" id="diaria" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <label for="pago" class="form-label"> pago</label>
                <input type="number"  value="<?= $aluguel->getpago() ?>" name="pago" class="form-control" id="pago" autocomplete="off" required>
            </div>
          <div class="mb-3">
                <label for="combustivelatual" class="form-label"> combustivelatual</label>
                <input type="number"  value="<?= $aluguel->getcombustivelatual() ?>" name="combustivelatual" class="form-control" id="combustivelatual" autocomplete="off" required>
            </div>
          <div class="mb-3">
                <label for="datalocacao" class="form-label"> datalocacao</label>
                <input type="date"  value="<?= $aluguel->getdatalocacao() ?>" name="datalocacao" class="form-control" id="datalocacao" autocomplete="off" required>
            </div>

            <div class="button mt-3">
                <button type="submit" class="btn btn-lg btn-success">Atualizar Aluguel</button>
            </div>
        </form>
                 <?php

        if (!$_POST) return;
        $aluguel->settroco($_POST['troco']);
        $aluguel->setdiaria($_POST['diaria']);
        $aluguel->setpago($_POST['pago']);
        $aluguel->setcombustivelatual($_POST['combustivelatual']);
        $aluguel->setdatalocacao($_POST['datalocacao']);
        $aluguel->settotal($_POST['total']);
        $aluguel->setdesconto($_POST['desconto']);

        try {
            $aluguel->update($idaluguel);
            header("Location: ./Vendas.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar o aluguel!';
        }

        ?>
    </div>
</body>

<script src="../../public/js/addCampo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>