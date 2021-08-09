<?php
    require_once '../controller/VendasController.php';
    require '../controller/devolucaoController.php';
    $devolucao = new devolucaoController();
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Devolução</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body>
<?php $total = $devolucao->total($_POST['idaluguel'],$_POST['datadevolucao'],$_POST['combustiveldevolucao'],$_POST['prgas'],$_POST['extra']) ?>
    <div class="container">
        <h1 class="p-1 title">Realizar Devolução</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br><br>
        </div>
        <form class='form' id="form" action="./cadastrardevolucao2.php" method="POST">
            <div class="mb-3"><br>
                <label for="extra" class="form-label">valor total</label>
                <input type="number" step="any"  name="total" class="form-control" id="total" required value='<?php echo $total ?>'>
            </div>
            <input type="hidden"  name="extra" class="form-control" id="extra" required value='<?php echo $_POST['extra'] ?>'>
            <input type="hidden"   name="idaluguel" class="form-control" id="idaluguel" required value='<?php echo $_POST['idaluguel'] ?>'>
            <input type="hidden"   name="datadevolucao" class="form-control" id="datadevolucao" required value='<?php echo $_POST['datadevolucao'] ?>'>
            <input type="hidden"   name="combustiveldevolucao" class="form-control" id="combustiveldevolucao" required value='<?php echo $_POST['combustiveldevolucao'] ?>'>
            <input type="hidden"   name="prgas" class="form-control" id="prgas" required value='<?php echo $_POST['prgas'] ?>'>
            <input type="hidden"   name="env" class="form-control" id="env" required value= 1>
            <div class="button"><br>
                <button type="submit" class="btn btn-lg btn-success mt-3">Finalizar</button>
            </div>
        </form>

    </div>
</body>
<?php
//var_dump($total);

if(isset ($_POST['env'])){
     $r = $devolucao->insert($_POST['idaluguel'],$_POST['datadevolucao'],$_POST['combustiveldevolucao'],$_POST['extra'],$total);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          devolucao realizado com sucesso!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                      </div>';

    }

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>