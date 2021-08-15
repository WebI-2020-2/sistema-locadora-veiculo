<?php
require_once '../controller/VendasController.php';
require '../controller/totalController.php';
require '../controller/ClientesController.php';
require_once '../controller/veiculoController.php';
$veiculos = new veiculoController();
$clientes = new ClientesController();
$total = new totalController();
$alugues = new VendasController();
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
    <div class="container">
        <h1 class="display-1 text-center text-light">Realizar Devolução</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./devolucao.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>
        <form class='form' id="form" action="./cadastrardevolucao2.php" method="POST">
        <div class="mb-3"><br>
            <label for="idaluguel" class="form-label text-light ">selecione  o aluguel</label>
            <select name="idaluguel" class="form-select" id="idaluguel" required>
                <option value="" selected disabled>Selecione o aluguel</option>
                <?php
                foreach ($alugues->disponivel() as $alugues) { ?>
                    <option value="<?= $alugues->getidaluguel() ?>">
                        <?php
                        $c = $clientes->findOne($alugues->getidcliente());
                        $v = $veiculos->findOneAlu($alugues->getidaluguel());
                        echo "cliente: ", $c->getnome(), " Carro: ",$v->getnome(); ?></option> <?php
                }?>
            </select>
        </div>
                                <div class="mb-3"><br>
                    <div class="input" style="width: 25% !important;">
                        <label for="extra" class="form-label text-light">valor extra</label>
                        <div class="input-group"><span class="input-group-addon"> R$  </span>
                        <input type="number" step="any"  name="extra" class="form-control" id="extra" required>
                            </div>
                    </div>
            <div class="mb-3"><br>
                    <label for="datadevolucao" class="form-label text-light">Data-devolução</label>
                    <input type="date" step="any" name="datadevolucao" class="form-control" id="datadevolucao" min = 2021-07-09  required>
                </div><br>
            </div>
                    <div class="mb-3"><br>

                    <div class="input" style="width: 25% !important;">
                        <label for="combustiveldevolucao" class="form-label text-light">combustivel devolucao</label>
                        <div class="input-group"><span class="input-group-addon"> litros  </span>
                        <input type="number" step="any" min="1" name="combustiveldevolucao" class="form-control"  id="combustiveldevolucao" required>
                            </div>
                    </div><br>
                </div>
            <div class="mb-3"><br>
                <div class="input" style="width: 25% !important;">
                    <label for="prgas" class="form-label text-light">preço combustivel</label>
                    <div class="input-group"><span class="input-group-addon"> R$  </span>
                    <input type="number" step="any" min="1" name="prgas" class="form-control" id="prgas" required>
                        </div>
                </div><br>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-lg btn-success mt-3">Finalizar</button>
            </div>
        </form>
    </div>

        ?>
    </div>
</body>
<!-- Atente-se para a ordem: primeiro jquery, depois locastyle, depois o JS do Bootstrap. -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

</html>