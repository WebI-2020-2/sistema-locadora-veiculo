<?php
require_once '../controller/seguroController.php';
require_once '../controller/modeloController.php';
require_once '../controller/tipoveiculoController.php';
require '../controller/veiculoController.php';
if (!$_GET) header('Location: ./veiculo.php');;
$idveiculo = $_GET['id'];
$veiculo = new veiculoController();
$seguros = new seguroController();
$modelos = new modeloController();
$tipoveiculos = new tipoveiculoController();

$veiculo->setidveiculo($idveiculo);
$veiculo->setidmodelo($veiculo->findOne($idveiculo)->getidmodelo());
$veiculo->setidtipoveiculo($veiculo->findOne($idveiculo)->getidtipoveiculo());
$veiculo->setidseguro($veiculo->findOne($idveiculo)->getidseguro());
$veiculo->setano($veiculo->findOne($idveiculo)->getano());
$veiculo->setcor($veiculo->findOne($idveiculo)->getcor());
$veiculo->setplaca($veiculo->findOne($idveiculo)->getplaca());
$veiculo->setstatus($veiculo->findOne($idveiculo)->getstatus());
$veiculo->setnome($veiculo->findOne($idveiculo)->getnome());


?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Veiculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>


<body>
    <div class="container">

        <h1 class="p-1 title">Atualizar Veiculo</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' action="./editarveiculo.php?id=<?= $veiculo->getidveiculo() ?>" method="POST">
             <div class="mb-3">
                <label for="idseguro" class="form-label">Selecionar o valor do seguro</label>

                <select name="idseguro" class="form-select" id="idseguro" disabled required>
                    <option value="" selected disabled>Selecione o  valor do seguro</option>
                    <?php
                    foreach ($seguros->findAll() as $seguro) {
                        if ($seguro->getidseguro() == $veiculo->getidseguro()) { ?>
                            <option selected value="<?= $seguro->getidseguro() ?>"><?= $seguro->getvalor() ?></option> <?php
                                                                                                                 } else { ?>
                            <option value="<?= $seguro->getidseguro() ?>"><?= $seguro->getvalor() ?></option> <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                ?>
                </select>
            </div>
             <div class="mb-3">
                <label for="idtipoveiuclo" class="form-label">Selecionar o tipo do veiculo</label>

                <select name="idtipoveiuclo" class="form-select" id="idtipoveiuclo" disabled required>
                    <option value="" selected disabled>Selecione o  tipo do veiculo</option>
                    <?php
                    foreach ($tipoveiculos->findAll() as $tipoveiculo) {
                        if ($tipoveiculo->getidtipoveiculo() == $veiculo->getidtipoveiculo()) { ?>
                            <option selected value="<?= $tipoveiculo->getidtipoveiculo() ?>"><?= $tipoveiculo->getdescricao() ?></option> <?php
                                                                                                                 } else { ?>
                            <option value="<?= $tipoveiculo->getidtipoveiculo() ?>"><?= $tipoveiculo->getdescricao() ?></option> <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                ?>
                </select>
            </div>
             <div class="mb-3">
                <label for="idmodelo" class="form-label">Selecionar o Modelo do veiculo</label>

                <select name="idmodelo" class="form-select" id="idmodelo" disabled required>
                    <option value="" selected disabled>Selecione o  Modelo do veiculo</option>
                    <?php
                    foreach ($modelos->findAll() as $modelo) {
                        if ($modelo->getidmodelo() == $veiculo->getidmodelo()) { ?>
                            <option selected value="<?= $modelo->getidmodelo() ?>"><?= $modelo->getdescricao() ?></option> <?php
                                                                                                                 } else { ?>
                            <option value="<?= $modelo->getidmodelo() ?>"><?= $modelo->getdescricao() ?></option> <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                ?>
                </select>
            </div>
            <div class="mb-3"><br>
                <label for="ano" class="form-label">ano</label>
                <input type="text" step="any" min="2000"  max ="2021"  value="<?= $veiculo->getano() ?>" name="ano" class="form-control" id="ano" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="cor" class="form-label">cor</label>
                <input type="text" step="any"  pattern="[a-z\s]+$" / \ title="sem numero"  value="<?= $veiculo->getcor() ?>" name="cor" class="form-control" id="cor" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="placa" class="form-label">placa</label>
                <input type="text" step="any"   value="<?= $veiculo->getplaca() ?>" name="placa" class="form-control" id="placa" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="status" class="form-label">status</label>
                <input type="text" step="any"  value="<?= $veiculo->getstatus() ?>" name="status" class="form-control" id="status" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="nome" class="form-label">nome</label>
                <input type="text" step="any"  value="<?= $veiculo->getnome() ?>" name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        <?php

        if (!$_POST) return;
        $veiculo->setano($_POST['ano']);
        $veiculo->setcor($_POST['cor']);
        $veiculo->setplaca($_POST['placa']);
        $veiculo->setstatus($_POST['status']);
        $veiculo->setnome($_POST['nome']);


        try {
            $veiculo->update($idveiculo);
            header("Location: ./veiculo.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar a veiculo!';
        }

        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>