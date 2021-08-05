<?php

if(!$_GET || !$_POST) header('Location: ./vendas.php');

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
$idaluguel = $_GET['id'];

$veiculo = new veiculoController();
$aluguel = new VendasController();
$itemaluguels = new ItensVendaController();
$clientes = new ClientesController();

foreach ($idveiculos as $idveiculo) {
            ($veiculo->findOne($idveiculo)->getnome());
}

$itemaluguels->setidaluguel($idaluguel);
$itemaluguels->setidveiculo($idveiculo);

try {

    $itemaluguels->delete($itemaluguels->getidaluguel());

    for ($i = 0; $i < count($idveiculo); $i++) { 
        $itemaluguels->insert(
            $itemaluguels->getidaluguel(), 
            $itemaluguels->getidveiculo()[$i], 
        );
    }

    header('Location: ./vendas.php');

} catch (PDOException $err) {
    echo '<script>
            alert("'.$err->getMessage().'");
            window.location.href = "./vendas.php";
          </script>';
}

