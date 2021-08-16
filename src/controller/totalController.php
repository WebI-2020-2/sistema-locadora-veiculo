<?php

require_once '../model/devolucao.php';
require_once '../model/Database.php';

class totalController extends devolucao
{
    protected $tabela = 'devolucao';

    public function __construct()
    {
    }

    public function total($idaluguel,$datadevolucao,$combustiveldevolucao,$prgas,$extra){
        $query = "SELECT * FROM aluguel WHERE idaluguel = :idaluguel";
        $stm = Database::prepare($query);
        $stm->bindParam(':idaluguel', $idaluguel);
        $stm->execute();
        $alu = $stm->fetch(PDO::FETCH_OBJ);
        $datainicial = new DateTime( $alu->datalocacao);
        $datafinal = new DateTime($datadevolucao);
        $diferenca = $datainicial->diff($datafinal);
        $dias = $diferenca->days;
        $gasol = floatval($alu->combustivelatual) - floatval($combustiveldevolucao);
        $extra2 = floatval($extra);
        if($gasol>0){
            $extra2 = $extra2 + ($gasol*floatval($prgas));
        }

        $total = ( $dias * floatval($alu->diaria) )+ $extra2;

        return $total;
    }

    


}
