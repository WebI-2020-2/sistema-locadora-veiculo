<?php

require '../controller/modeloController.php';
if (!$_GET) header('Location: ./modelo.php');;
$idmodelo = $_GET['id'];
$modelo = new modeloController();
$modelo->setidmodelo($idmodelo);
$modelo->setdescricao($modelo->findOne($idmodelo)->getdescricao());


?>

<!DOCTYPE html>
<html lang="pt_br">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body>
    <div class="container">

        <h1 class="p-1 title">atualizar Modelo</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>
        </div>
        <form class='form' action="./editarmodelo.php?id=<?= $modelo->getidmodelo() ?>" method="POST">
            <div class="mb-3"><br>
                <label for="descricao" class="form-label"> Descrição</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero" minlength="2" value="<?= $modelo->getdescricao() ?>" name="descricao" class="form-control" id="descricao" autocomplete="off" required>
            </div>

            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
          <?php

        if (!$_POST) return;
        $modelo->setdescricao($_POST['descricao']);

        try {
            $modelo->update($idmodelo);
            header("Location: ./modelo.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar o modelo!';
        }

        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>