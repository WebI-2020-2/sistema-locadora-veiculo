<?php
require_once '../controller/ClientesController.php';
require_once '../controller/veiculoController.php';
require_once '../controller/VendasController.php';
require_once '../controller/ItensVendaController.php';

$idveiculo = $_POST['idveiculo'];
$idcliente = $_POST['idcliente'];
$total = $_POST['total'];
$pago = $_POST['pago'];
$diaria = $_POST['diaria'];
$desconto = $_POST['desconto'];
$troco = $_POST['troco'];
$datalocacao = $_POST['datalocacao'];
$combustivelatual = $_POST['combustivelatual'];


$veiculo = new veiculoController();
$aluguel = new VendasController();
$itemaluguels = new ItensVendaController();
$clientes = new ClientesController();


foreach ($idveiculos as $idveiculo) {
            ($veiculo->findOne($idveiculo)->getnome());
}
        
try {
    $aluguel->insert($idcliente,$total,$pago,$diaria,$desconto,$troco,$datalocacao,$combustivelatual,$idveiculo, 0);
    $aluguel->setidcliente($idcliente);
    $aluguel->settotal($total);
    $aluguel->setpago($pago);
    $aluguel->setdiaria($diaria);
    $aluguel->setdesconto($desconto);
    $aluguel->settroco($troco);
    $aluguel->setdatalocacao($datalocacao);
    $aluguel->setcombustivelatual($combustivelatual);
    $aluguel->setidveiculo($idveiculo);
    $aluguel->setidaluguel($aluguel->findidaluguel($idcliente));
    $itemaluguels->setidaluguel($aluguel->getidaluguel());

    for ($i = 0; $i < count($idveiculos); $i++) { 
        $itemaluguels->insert($aluguel->getidaluguel(), $idveiculos[$i]);
    }
    header('Location: ./vendas.php');

} catch (PDOException $err) {
    echo '<script>
            alert("'.$err->getMessage().'");
            window.location.href = "./vendas.php";
          </script>';
}

