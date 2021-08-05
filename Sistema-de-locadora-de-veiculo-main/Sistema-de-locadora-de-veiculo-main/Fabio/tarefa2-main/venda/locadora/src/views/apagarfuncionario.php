<?php

require_once '../controller/funcionarioController.php';
if (!$_GET) header('Location: ./funcionario.php');

$funcionario = new funcionarioController();
$funcionario->setidfuncionario($_GET['id']);

try {
    $funcionario->delete($funcionario->getidfuncionario());
    header('Location: ./funcionario.php');
} catch (PDOException $err) {
    echo 'Erro';
}

