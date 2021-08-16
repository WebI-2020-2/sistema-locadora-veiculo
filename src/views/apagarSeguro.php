<?php

require_once '../controller/seguroController.php';
if (!$_GET) header('Location: ./seguro.php');

$seguro = new seguroController();
$seguro->setidseguro($_GET['id']);

try {
    $seguro->delete($seguro->getidseguro());
    header('Location: ./seguro.php');
} catch (PDOException $err) {
    echo 'Erro';
}
