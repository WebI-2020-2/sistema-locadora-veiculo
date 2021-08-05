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

<body>
    <div class="container">
        <h1 class="p-1 title">Cadastrar seguro</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
        </div>
        <form class='form' action="./cadastrarseguro.php" method="POST">
            
        <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="valor" class="form-label">Valor</label>
                    <input type="number" step="any" name="valor" class="form-control" id="valor" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datainicio" class="form-label">Data-inicio</label>
                    <input type="date" step="any" name="datainicio" class="form-control" id="datainicio" min = 2021-08-07 required>
                </div><br>
            </div>
                        <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datafinal" class="form-label">Data-final</label>
                    <input type="date" step="any" name="datafinal" class="form-control" id="datafinal" min = 2021-08-07  required>
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

      $sql = Database::prepare("SELECT * FROM seguro  WHERE valor = :valor");
        $sql->bindValue(':valor', $valor);
        $sql->execute();

if($sql->rowCount() === 0){

$sql= Database::prepare("INSERT INTO seguro (valor,datainicio,datafinal) VALUES (:valor, :datainicio, :datafinal)");
        $sql->bindValue(':valor', $valor);
        $sql->bindValue(':datainicio', $datainicio);
        $sql->bindValue(':datafinal', $datafinal);
        $sql->execute();

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          seguro cadastrado com Sucesso!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

}else{
    echo "Esse valor , ja esta cadastrado;";
}
}

        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>