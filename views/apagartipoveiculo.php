<?php

require_once '../controller/tipoveiculoController.php';
if (!$_GET) header('Location: ./tipoveiculo.php');

$tipoveiculo = new tipoveiculoController();
$tipoveiculo->setidtipoveiculo($_GET['id']);

try {
    $tipoveiculo->delete($tipoveiculo->getidtipoveiculo());
    header('Location: ./tipoveiculo.php');
} catch (PDOException $err) {
    echo 'Erro';
}

