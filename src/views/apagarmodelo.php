<?php

require_once '../controller/modeloController.php';
if (!$_GET) header('Location: ./modelo.php');

$modelo = new modeloController();
$modelo->setidmodelo($_GET['id']);

try {
    $modelo->delete($modelo->getidmodelo());
    header('Location: ./modelo.php');
} catch (PDOException $err) {
    echo 'Erro';
}

