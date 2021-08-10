<?php

require_once '../controller/devolucaoController.php';
if (!$_GET) header('Location: ./devolucao.php');

$devolucao = new devolucaoController();
$devolucao->setiddevolucao($_GET['id']);

try {
    $devolucao->delete($devolucao->getiddevolucao());
    header('Location: ./devolucao.php');
} catch (PDOException $err) {
    echo 'Erro';
}
