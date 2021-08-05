<?php
require_once '../controller/tipoveiculoController.php';
require_once '../controller/veiculoController.php';
require_once '../controller/seguroController.php';
require_once '../controller/modeloController.php';
$seguros = new seguroController();
$veiculo = new veiculoController();
$modelos = new modeloController();
$tipoveiculos = new tipoveiculoController();

?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar veiculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body>
    <div class="container">
        <h1 class="p-1 title">Veiculo</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' id="form" action="./cadastrarveiculo.php" method="POST">

                        <div class="mb-3">
                <label for="idseguro" class="form-label">Selecionar valor do seguro</label>
                <select name="idseguro" class="form-select" id="idseguro" required>
                    <option value="" selected disabled>Selecione um valor do seguro</option>
                    <?php
                    foreach ($seguros->findAll() as $seguro) { ?>
                        <option value="<?= $seguro->getidseguro() ?>"><?= $seguro->getvalor() ?></option> <?php
                                                                                                        }
                                                                                                            ?>
                </select>
            </div>
<div class="mb-3"><br>
                <label for="idmodelo" class="form-label">Selecionar Modelo</label>
                <select name="idmodelo" class="form-select" id="idmodelo" required>
                    <option value="" selected disabled>Selecione um Modelo</option>
                    <?php
                    foreach ($modelos->findAll() as $modelo) { ?>
                        <option value="<?= $modelo->getidmodelo() ?>"><?= $modelo->getdescricao() ?></option> <?php
                                                                                                        }
                                                                                                            ?>
                </select>
            </div>
       <div class="mb-3"><br>     
                <label for="idtipoveiculo" class="form-label">Selecionar tipo</label>
                <select name="idtipoveiculo" class="form-select" id="idtipoveiculo" required>
                    <option value="" selected disabled>Selecione tipo</option>
                    <?php
                    foreach ($tipoveiculos->findAll() as $tipoveiculo) { ?>
                        <option value="<?= $tipoveiculo->getidtipoveiculo() ?>"><?= $tipoveiculo->getdescricao() ?></option> <?php
                                                                                                        }
                                                                                                            ?>
                </select>
            </div>

              <div class="mb-3">
                        <label for="ano" class="form-label">ano</label>
                        <input type="text" step="any" min="2000"  max ="2021" name="ano" class="form-control" id="ano" required>
                    </div>

              <div class="mb-3">
                        <label for="cor" class="form-label">cor</label>
                        <input type="text"  pattern="[a-z\s]+$" / \ title="sem numero"  step="any" min="1" name="cor" class="form-control" id="cor" required>
                    </div>

             <div class="mb-3">
                        <label for="placa" class="form-label">placa</label>
                        <input type="text" step="any" min="1" name="placa" class="form-control" id="placa" required>
                    </div>
                                 <div class="mb-3">
                        <label for="status" class="form-label">status</label>
                        <input type="text" step="any" min="1" name="status" class="form-control" id="status" required>
                    </div>

                    <div class="mb-3">
                        <label for="nome" class="form-label">nome</label>
                        <input type="text" step="any" min="1" name="nome" class="form-control" id="nome" required>
                    </div>

                        </div>
                </div>
                    <div class="button"><br>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
  
     <?php
    $ano =filter_input(INPUT_POST,'ano');
    $cor=filter_input(INPUT_POST,'cor');
    $placa=filter_input(INPUT_POST,'placa');
    $idmodelo=filter_input(INPUT_POST,'idmodelo');
    $idseguro=filter_input(INPUT_POST,'idseguro');
    $idtipoveiculo=filter_input(INPUT_POST,'idtipoveiculo');
    $nome=filter_input(INPUT_POST,'nome');
    $status=filter_input(INPUT_POST,'status');


if($placa && $ano && $cor && $nome){

      $sql = Database::prepare("SELECT * FROM veiculo  WHERE placa = :placa" );
        $sql->bindValue(':placa', $placa);
        $sql->execute();

if($sql->rowCount() === 0){

$sql= Database::prepare("INSERT INTO veiculo (placa,ano,cor,idmodelo,idtipoveiculo,idseguro,nome,status) VALUES (:placa, :ano, :cor, :idmodelo, :idtipoveiculo,:idseguro,:nome,:status)");
        $sql->bindValue(':placa', $placa);
        $sql->bindValue(':ano', $ano);
        $sql->bindValue(':cor', $cor);
        $sql->bindValue(':idmodelo', $idmodelo);
        $sql->bindValue(':idseguro', $idseguro);
        $sql->bindValue(':idtipoveiculo', $idtipoveiculo);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':status', $status);

        $sql->execute();

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          veiculo cadastrado com Sucesso!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

}else{
    echo "Esse veiculo , ja esta cadastrado;";
}
}

        ?>
    </div>
</body>
<script src="../../public/js/addCampo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>