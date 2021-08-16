<?php
    require '../controller/seguroController.php';
    $seguro = new seguroController();
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

<body class="bg-secondary">
    <div class="container">
        <h1 class="display-1 text-center text-light">Cadastrar Seguro</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./seguro.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>

        <form class='form' action="./cadastrarseguro.php" method="POST">
            
        <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="valor" class="form-label text-light">Valor</label>
                    <input type="number" min="1" step="any" name="valor" class="form-control" id="valor" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datainicio" class="form-label text-light">Data-inicio</label>
                    <input type="date" step="any" name="datainicio" class="form-control" id="datainicio" required>
                </div><br>
            </div>
                        <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datafinal" class="form-label text-light">Data-final</label>
                    <input type="date" step="any" name="datafinal" class="form-control" id="datafinal" required>
                </div><br>
            </div>


            <div class="button"><br>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
    <?php

    $valor =filter_input(INPUT_POST,'valor');
    $datainicio=filter_input(INPUT_POST,'datainicio');
    $datafinal=filter_input(INPUT_POST,'datafinal');
    if($valor && $datainicio && $datafinal){

      $sql = Database::prepare("SELECT * FROM seguro  WHERE datafinal = :datafinal");
        $sql->bindValue(':datafinal', $datafinal);
        $sql->execute();

if(strtotime($datafinal) > strtotime($datainicio)){

$sql= Database::prepare("INSERT INTO seguro (valor,datainicio,datafinal) VALUES (:valor, :datainicio, :datafinal)");
        $sql->bindValue(':valor', $valor);
        $sql->bindValue(':datainicio', $datainicio);
        $sql->bindValue(':datafinal', $datafinal);
        $sql->execute();




echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          seguro cadastrado com Sucesso!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

        } else{
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          Erro! Verifique as datas do seguro.A data final não podem vir primeiro que a data de inicio.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                  }
              }
                  ?>
    </div>
</body>
<script src="../../public/js/addCampo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>