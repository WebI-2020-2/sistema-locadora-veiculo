<?php
require '../controller/tipoveiculoController.php';
$tipoveiculo = new tipoveiculoController();
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Tipo Veiculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body>
    <div class="container">
        <h1 class="p-1 title">Cadastrar Tipo do veiculo</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>

        </div>
        <form class='form' action="./cadastrartipoveiculo.php" method="POST">
            <div class="mb-3"><br>

                <label for="descricao" class="form-label">tipo do veiculo</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero" minlength="2" name="descricao" class="form-control" id="descricao" autocomplete="off" required>
            </div><br>

                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
         <?php

$descricao =filter_input(INPUT_POST,'descricao');

if($descricao){

      $sql = Database::prepare("SELECT * FROM tipoveiculo  WHERE descricao = :descricao");
        $sql->bindValue(':descricao', $descricao);
        $sql->execute();

if($sql->rowCount() === 0){

$sql= Database::prepare("INSERT INTO tipoveiculo (descricao) VALUES (:descricao)");
        $sql->bindValue(':descricao', $descricao);
        $sql->execute();

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          tipoveiculo cadastrado com Sucesso!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

}else{
    echo "Esse tipo_veiculo , ja esta cadastrado;";
}
}

        ?> 
     
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>