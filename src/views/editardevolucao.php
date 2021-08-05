<?php
require_once '../controller/VendasController.php';
require '../controller/devolucaoController.php';
if (!$_GET) header('Location: ./devolucao.php');;
$iddevolucao = $_GET['id'];
$devolucao = new devolucaoController();
$alugues = new VendasController();
$devolucao->setiddevolucao($iddevolucao);
$devolucao->setidaluguel($devolucao->findOne($iddevolucao)->getidaluguel());
$devolucao->setavaria($devolucao->findOne($iddevolucao)->getavaria());
$devolucao->setextra($devolucao->findOne($iddevolucao)->getextra());
$devolucao->setdatadevolucao($devolucao->findOne($iddevolucao)->getdatadevolucao());
$devolucao->setcombustiveldevolucao($devolucao->findOne($iddevolucao)->getcombustiveldevolucao());


?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>


<body>
    <div class="container">

        <h1 class="p-1 title">atualizar devolucao</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' action="./editardevolucao.php?id=<?= $devolucao->getiddevolucao() ?>" method="POST">
             <div class="mb-3">
                <label for="idaluguel" class="form-label">Selecionar o ID-aluguel</label>

                <select name="idaluguel" class="form-select" id="idaluguel" disabled required>
                    <option value="" selected disabled>Selecione o  ID-aluguel</option>
                    <?php
                    foreach ($alugues->findAll() as $aluguel) {
                        if ($aluguel->getidaluguel() == $devolucao->getidaluguel()) { ?>
                            <option selected value="<?= $aluguel->getidaluguel() ?>"><?= $aluguel->getidaluguel() ?></option> <?php
                                                                                                                 } else { ?>
                            <option value="<?= $aluguel->getidaluguel() ?>"><?= $aluguel->getidaluguel() ?></option> <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                ?>
                </select>
            </div>
            <div class="mb-3"><br>
                <label for="avaria" class="form-label">avaria</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero"  value="<?= $devolucao->getavaria() ?>" name="avaria" class="form-control" id="avaria" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="extra" class="form-label">extra</label>
                    <input type="number" value="<?= $devolucao->getextra() ?>" step="any" name="extra" class="form-control" id="extra" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datadevolucao" class="form-label">data-devolucao</label>
                    <input type="date" value="<?= $devolucao->getdatadevolucao() ?>" step="any" name="datadevolucao" class="form-control" min = 2021-07-09  id="datadevolucao" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="combustiveldevolucao" class="form-label">combustivel-devolucao</label>
                    <input type="number" value="<?= $devolucao->getcombustiveldevolucao() ?>" step="any" name="combustiveldevolucao" class="form-control" id="combustiveldevolucao" required>
                </div>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        <?php

        if (!$_POST) return;
        $devolucao->setavaria($_POST['avaria']);
        $devolucao->setextra($_POST['extra']);
        $devolucao->setdatadevolucao($_POST['datadevolucao']);
        $devolucao->setcombustiveldevolucao($_POST['combustiveldevolucao']);


        try {
            $devolucao->update($iddevolucao);
            header("Location: ./devolucao.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar a devolucao!';
        }

        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>