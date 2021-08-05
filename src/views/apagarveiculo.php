<?php

require_once '../controller/veiculoController.php';
if (!$_GET) header('Location: ./veiculo.php');

$veiculo = new veiculoController();
$veiculo->setidveiculo($_GET['id']);

try {
    $veiculo->delete($veiculo->getidveiculo());
    header('Location: ./veiculo.php');
} catch (PDOException $err) {
    echo 'Erro';
}
