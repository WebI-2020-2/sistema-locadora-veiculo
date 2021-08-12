<?php

require '../controller/seguroController.php';
if (!$_GET) header('Location: ./seguro.php');;
$idseguro = $_GET['id'];
$seguro = new seguroController();
$seguro->setidseguro($idseguro);
$seguro->setvalor($seguro->findOne($idseguro)->getvalor());
$seguro->setdatainicio($seguro->findOne($idseguro)->getdatainicio());
$seguro->setdatafinal($seguro->findOne($idseguro)->getdatafinal());


?>

<!DOCTYPE html>
<html lang="pt_br">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Seguro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="bg-secondary">
    <div class="container">

        <h1 class="display-1 text-center text-light">Atualizar Seguro</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./seguro.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>
        <form class='form' action="./editarSeguro.php?id=<?= $seguro->getidseguro() ?>" method="POST">
            <div class="mb-3"><br>
                <label for="valor" class="form-label text-light">valor</label>
                <input type="number" value="<?= $seguro->getvalor() ?>" name="valor" class="form-control" id="valor" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datainicio" class="form-label text-light">datainicio</label>
                    <input type="date" min = 2021-07-09  value="<?= $seguro->getdatainicio() ?>" step="any" name="datainicio" class="form-control" id="datainicio" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datafinal" class="form-label text-light">datafinal</label>
                    <input type="date" min = 2021-07-09  value="<?= $seguro->getdatafinal() ?>" step="any" name="datafinal" class="form-control" id="datafinal" required>
                </div>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        <?php

        if (!$_POST) return;
        $seguro->setvalor($_POST['valor']);
        $seguro->setdatainicio($_POST['datainicio']);
        $seguro->setdatafinal($_POST['datafinal']);

    $valor =filter_input(INPUT_POST,'valor');
    $datainicio=filter_input(INPUT_POST,'datainicio');
    $datafinal=filter_input(INPUT_POST,'datafinal');
if(strtotime($datafinal) > strtotime($datainicio)){

    try {
        $seguro->update($idseguro);
        header("Location: ./seguro.php");
    } catch (PDOException $err) {
        echo 'Ocorreu um erro ao atualizar o funcionario!';
    }


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

        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>