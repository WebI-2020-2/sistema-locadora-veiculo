<?php

require_once '../model/Venda.php';
require_once '../model/Database.php';

class VendasController extends aluguel
{
    protected $tabela = 'aluguel';

    public function __construct()
    {
    }

    public function findOne($idaluguel)
    {
        $query = "SELECT * FROM $this->tabela WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        $stm->execute();
        $aluguel = new aluguel(null, null, null,null, null, null,null, null, null,null,null,null);

        foreach ($stm->fetchAll() as $ven) {
            $aluguel->setidaluguel($ven->idaluguel);
            $aluguel->setidcliente($ven->idcliente);
            $aluguel->settotal($ven->total);
            $aluguel->setpago($ven->pago);
            $aluguel->setdiaria($ven->diaria);
            $aluguel->setdesconto($ven->desconto);
            $aluguel->settroco($ven->troco);
            $aluguel->setdatalocacao($ven->datalocacao);
            $aluguel->setcombustivelatual($ven->combustivelatual);

        }
        return $aluguel;
    }

    public function findAll()
    {
        
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $aluguels = array();

        foreach ($stm->fetchAll() as $aluguel) {
            $aluguels[] = new aluguel($aluguel->idaluguel, $aluguel->idcliente, $aluguel->total, $aluguel->pago, $aluguel->diaria, $aluguel->desconto, $aluguel->troco, $aluguel->datalocacao, $aluguel->combustivelatual);
        }
        return $aluguels;
    }

        public function update($idaluguel)
    {
        $diaria = $this->getdiaria();
        $this->setidaluguel($idaluguel);
        $query = "UPDATE $this->tabela SET idcliente = :idcliente, total = :total, pago = :pago, diaria = :diaria , desconto = :desconto, troco = :troco, datalocacao = :datalocacao, combustivelatual = :combustivelatual WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidaluguel(), PDO::PARAM_INT);
        $stm->bindParam(':idcliente', $this->getidcliente());
        $stm->bindParam(':total', $this->gettotal());
        $stm->bindParam(':pago', $this->getpago());
        $stm->bindParam(':diaria', $this->getdiaria());
        $stm->bindParam(':desconto', $this->getdesconto());
        $stm->bindParam(':troco', $this->gettroco());
        $stm->bindParam(':datalocacao', $this->getdatalocacao());
        $stm->bindParam(':combustivelatual', $this->getcombustivelatual());
        $stm->bindParam(':diaria', $diaria);
        return $stm->execute();
    }

    public function insert($idcliente, $total,$pago, $diaria,$desconto,$troco,$datalocacao,$combustivelatual)
    {
        $query = "INSERT INTO $this->tabela (idcliente, total,pago,diaria,desconto,troco,datalocacao,combustivelatual) VALUES (:idcliente, :total,:pago,:diaria,:desconto,:troco,:datalocacao,:combustivelatual)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idcliente', $idcliente);
        $stm->bindParam(':total', $total);
        $stm->bindParam(':pago', $pago);
        $stm->bindParam(':diaria', $diaria);
        $stm->bindParam(':desconto', $desconto);
        $stm->bindParam(':troco', $troco);
        $stm->bindParam(':datalocacao', $datalocacao);
        $stm->bindParam(':combustivelatual', $combustivelatual);
        return $stm->execute();
    }

    public function findidaluguel($idcliente)
    {
        $idaluguel = null;
        $query = "SELECT idaluguel FROM $this->tabela WHERE idcliente = :id ";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idcliente, PDO::PARAM_INT);
        $stm->execute();

        foreach ($stm->fetchAll() as $aluguel) {
            $idaluguel = $aluguel->idaluguel;
        }
        return $idaluguel;
    }

    public function delete($idaluguel)
    {
        $query = "DELETE FROM $this->tabela WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        return $stm->execute();
    }

}