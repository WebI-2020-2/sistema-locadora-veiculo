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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body>
    <div class="container">
        <h1 class="p-1 title">Realizar Aluguel</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-outline-primary">Voltar</a>
        </div>
        <form class='form' id="form" action="./finalizar-venda.php" method="POST">
            <div class="mb-3"><br>   
                <label for="idcliente" class="form-label">Selecionar Cliente</label>
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
                        <label for="idveiculo" class="form-label">Selecionar veiculo</label>
                        <select name="idveiculo" class="form-select" id="idveiculo" required>
                            <option value="" selected disabled>Selecione um veiculo</option>
                                <?php
                                    foreach ($veiculos->findAll() as $veiculo) { ?>
                                        <option value="<?= $veiculo->getidveiculo() ?>"><?= $veiculo->getnome() ?></option> <?php
                                    }
                                ?>
                        </select>
                    </div>
                      <div class="mb-3">
                        <label for="pago" class="form-label">pago</label>
                        <input type="number" step="any"  name="pago" class="form-control" id="pago" required>
                    </div>
                      <div class="mb-3">
                        <label for="total" class="form-label">total</label>
                        <input type="number" step="any"  name="total" class="form-control" id="total" required>
                    </div>
                      <div class="mb-3">
                        <label for="troco" class="form-label">troco</label>
                        <input type="number" step="any"  name="troco" class="form-control" id="troco" required>
                    </div>
                      <div class="mb-3">
                        <label for="desconto" class="form-label">desconto</label>
                        <input type="number" step="any"  name="desconto" class="form-control" id="desconto" required>
                    </div>
                      <div class="mb-3">
                        <label for="datalocacao" class="form-label">datalocacao</label>
                        <input type="date" step="any"  name="datalocacao" class="form-control" id="datalocacao" required>
                    </div>
                      <div class="mb-3">
                        <label for="diaria" class="form-label">diaria</label>
                        <input type="number" step="any"  name="diaria" class="form-control" id="diaria" required>
                    </div>
                      <div class="mb-3">
                        <label for="combustivelatual" class="form-label">combustivel_atual</label>
                        <input type="number" step="any"  name="combustivelatual" class="form-control" id="combustivelatual" required>
                    </div>
                  <div>  
                <button type="submit" class="btn btn-lg btn-success mt-3">Finalizar Aluguel</button>
            </div>
        </form>
         

</body>

<script src="../../public/js/addCampo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>