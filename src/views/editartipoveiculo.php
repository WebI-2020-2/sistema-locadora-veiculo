<?php

require '../controller/tipoveiculoController.php';
if (!$_GET) header('Location: ./tipoveiculo.php');;
$idtipoveiculo = $_GET['id'];
$tipoveiculo = new tipoveiculoController();
$tipoveiculo->setidtipoveiculo($idtipoveiculo);
$tipoveiculo->setdescricao($tipoveiculo->findOne($idtipoveiculo)->getdescricao());


?>

<!DOCTYPE html>
<html lang="pt_br">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar tipo veiculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body>
    <div class="container">

        <h1 class="p-1 title">atualizar tipo veiculo</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' action="./editartipoveiculo.php?id=<?= $tipoveiculo->getidtipoveiculo() ?>" method="POST">
            <div class="mb-3"><br>
                <label for="descricao" class="form-label"> Descrição</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero" minlength="2" value="<?= $tipoveiculo->getdescricao() ?>" name="descricao" class="form-control" id="descricao" autocomplete="off" required>
            </div>

            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
          <?php

        if (!$_POST) return;
        $tipoveiculo->setdescricao($_POST['descricao']);

        try {
            $tipoveiculo->update($idtipoveiculo);
            header("Location: ./tipoveiculo.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar o tipoveiculo!';
        }

        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>