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
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="bg-secondary">
<?php $total = $devolucao->total($_POST['idaluguel'],$_POST['datadevolucao'],$_POST['combustiveldevolucao'],$_POST['prgas'],$_POST['extra']) ?>
    <div class="container">
        <h1 class="display-1 text-center text-light">Realizar Devolução</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./cadastrardevolucao.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>

        <form class='form' id="form" action="./cadastrardevolucao2.php" method="POST">
            <div class="mb-3"><br>
                <label for="extra" class="form-label text-light">valor total</label>
                <div class="input-group"><span class="input-group-addon"> R$  </span>
                <input type="number" step="any"  name="total" class="form-control" id="total" required value='<?php echo $total ?>'>
                    </div>
            </div>
            <div class="mb-3"><br>
                <label for="extra" class="form-label text-light ">metodo de pagammeto</label>
                    <div class="input-group">
                <input type="text" step="any"  name="pag" class="form-control" id="pag" required>

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
    $r = $devolucao->insert($_POST['idaluguel'],$_POST['datadevolucao'],$_POST['combustiveldevolucao'],$_POST['extra'],$total,$_POST['pag'] );
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          devolucao realizado com sucesso!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                      </div>';

}

?>
<!-- Atente-se para a ordem: primeiro jquery, depois locastyle, depois o JS do Bootstrap. -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</html>