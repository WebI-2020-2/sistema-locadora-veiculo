<?php

require_once '../controller/veiculoController.php';
require_once '../controller/VendasController.php';
require_once '../controller/ItensVendaController.php';

$idcliente = intval($_POST['idcliente']);
$idveiculos = $_POST['idveiculo'];
$diaria = $_POST['diaria'];
$datalocacao = $_POST['datalocacao'];
$combustivelatual = $_POST['combustivelatual'];
$valores = array();


$veiculo = new veiculoController();
$aluguel = new VendasController();
$itemaluguel = new ItensVendaController();


foreach ($idveiculos as $idveiculo) {
    array_push($valores, $veiculo->findOne($idveiculo)->getnome());
}

        
try {
    $aluguel->insert($idcliente,$diaria,$datalocacao,$combustivelatual, 0);
    $aluguel->setidcliente($idcliente);
    $aluguel->setdiaria($diaria);
    $aluguel->setdatalocacao($datalocacao);
    $aluguel->setcombustivelatual($combustivelatual);
    $aluguel->setidaluguel($aluguel->findidaluguel($idcliente));
    $itemaluguel->setidaluguel($aluguel->getidaluguel());

    for ($i = 0; $i < count($idveiculos); $i++) { 
        $itemaluguel->insert($aluguel->getidaluguel(), $idveiculos[$i], $valores[$i]);
    }
    header('Location: ./vendas.php');

} catch (PDOException $err) {
    echo '<script>
            alert("'.$err->getMessage().'");
            window.location.href = "./vendas.php";
          </script>';
}

