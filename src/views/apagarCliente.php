<?php
require_once '../controller/ClientesController.php';
if (!$_GET) header('Location: ./clientes.php');

$cliente = new ClientesController();
$cliente->setidcliente($_GET['id']);

try {
    $cliente->delete($cliente->getidcliente());
    header('Location: ./clientes.php');
} catch (PDOException $err) {
    echo 'Erro';
}