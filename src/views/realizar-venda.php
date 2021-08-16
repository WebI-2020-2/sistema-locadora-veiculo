            <?php

                require_once '../controller/ClientesController.php';
                require_once '../controller/veiculoController.php';
                require_once '../controller/VendasController.php';
                $aluguel = new VendasController();
                $clientes = new ClientesController();
                $veiculos = new veiculoController();

            ?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Aluguel</title>
 <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
   <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="bg-secondary">
    <div class="container">
        <h1 class="display-1 text-center text-light">Realizar Aluguel</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./vendas.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>
        <form class='form' id="form" action="./finalizar-venda.php" method="POST">
            <div class="mb-3"><br>   
                <label for="idcliente" class="form-label text-light">Selecionar Cliente</label>
                <select name="idcliente" class="form-select" id="idcliente" required>
                    <option value="" selected disabled>Selecione um cliente</option>
                    <?php
                        foreach ($clientes->findAll() as $cliente) { ?>
                            <option value="<?= $cliente->getidcliente() ?>"><?= $cliente->getnome() ?></option> <?php
                        }
                    ?>
                </select>
            </div>
<div class="mb-3"><br>
                        <label for="idveiculo" class="form-label text-light">Selecionar veiculo</label>
                        <select name="idveiculo" class="form-select" id="idveiculo" required>
                            <option value="" selected disabled>Selecione um veiculo</option>
                                <?php
                                    foreach ($veiculos->disponivel() as $veiculo) { ?>
                                        <option value="<?= $veiculo->getidveiculo() ?>"><?= $veiculo->getnome() ?></option> <?php
                                    }
                                ?>
                        </select>
                    </div>
            <div class="mb-3">
                <label for="datalocacao" class="form-label text-light">datalocacao</label>
                        <input type="date" step="any"  name="datalocacao" class="form-control" id="datalocacao" required>
                    </div>
                      <div class="mb-3" >
                        <label for="diaria" class="form-label text-light">diaria</label>
                          <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">R$</span>
                              </div>
                        <input type="number" min="1" step="any"  name="diaria" class="form-control" id="diaria" required>
                          </div></div>
                      <div class="mb-3">
                        <label for="combustivelatual" class="form-label text-light">combustivel_atual</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">R$</span>
                              </div>
                        <input type="number" min="1" step="any"  name="combustivelatual" class="form-control" id="combustivelatual" required>

                    </div>
                  </div>
            <div>
            <button type="submit" class="btn btn-lg btn-success mt-3">Finalizar Aluguel</button>
            </div>
        </form>
         

</body>
<!-- Atente-se para a ordem: primeiro jquery, depois locastyle, depois o JS do Bootstrap. -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</html>