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
                      <div class="mb-3">
                        <label for="diaria" class="form-label text-light">diaria</label>
                        <input type="number" min="1" step="any"  name="diaria" class="form-control" id="diaria" required>
                    </div>
                      <div class="mb-3">
                        <label for="combustivelatual" class="form-label text-light">combustivel_atual</label>
                        <input type="number" min="1" step="any"  name="combustivelatual" class="form-control" id="combustivelatual" required>
                    </div>
                  <div>
                  </div>

            <div>
            <button type="submit" class="btn btn-lg btn-success mt-3">Finalizar Aluguel</button>
            </div>
        </form>
         

</body>

<script src="../../public/js/addCampo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>