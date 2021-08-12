<?php
require_once '../controller/VendasController.php';
if (!$_GET) header('Location: ./Vendas.php');

$aluguel = new VendasController();
$aluguel->setidaluguel($_GET['id']);

try {
    $aluguel->delete($aluguel->getidaluguel());
    header('Location: ./Vendas.php');
} catch (PDOException $err) {
    echo 'Erro';
}