<?php
require_once '../controller/devolucaoController.php';

$idaluguel = intval($_POST['idaluguel']);
$avaria = $_POST['avaria'];
$extra = $_POST['extra'];
$datadevolucao = $_POST['datadevolucao'];
$combustiveldevolucao = $_POST['combustiveldevolucao'];

$devolucao = new devolucaoController();




try {
    $devolucao->insert($idaluguel,$avaria,$extra,$datadevolucao,$combustiveldevolucao,0);
    $devolucao->setidaluguel($idaluguel);
    $devolucao->setavaria($avaria);
    $devolucao->setextra($extra);
    $devolucao->setdatadevolucao($datadevolucao);
    $devolucao->setcombustiveldevolucao($combustiveldevolucao);
    $devolucao->setiddevolucao($devolucao->findiddevolucao($idaluguel));    
    $devolucao->setiddevolucao($devolucao->findiddevolucao($avaria));
    $devolucao->setiddevolucao($devolucao->findiddevolucao($extra));
    $devolucao->setiddevolucao($devolucao->findiddevolucao($datadevolucao));
    $devolucao->setiddevolucao($devolucao->findiddevolucao($cocombustiveldevolucaor));


    

    header('Location: ./devolucao.php');

} catch (PDOException $err) {
    echo ' cadastro realizador';
}

