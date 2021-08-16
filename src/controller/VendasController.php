<?php

require_once '../model/Venda.php';
require_once '../model/Database.php';

class VendasController extends aluguel
{
    protected $tabela = 'aluguel';

    public function __construct()
    {
    }

    //busca uma aluguel
    public function findOne($idaluguel)
    {
        $query = "SELECT * FROM $this->tabela WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        $stm->execute();
        $aluguel = new aluguel(null, null, null,null,null,null,null);

        foreach ($stm->fetchAll() as $ven) {
            $aluguel->setidaluguel($ven->idaluguel);
            $aluguel->setidcliente($ven->idcliente);
            $aluguel->setdiaria($ven->diaria);
            $aluguel->setdatalocacao($ven->datalocacao);
            $aluguel->setcombustivelatual($ven->combustivelatual);
            $aluguel->setativo($ven->ativo);

        }
        return $aluguel;
    }

    //buscar todas as aluguel
    public function findAll()
    {
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $aluguels = array();

        foreach ($stm->fetchAll() as $aluguel) {

             $query2 = "SELECT * FROM itemaluguel WHERE idaluguel = $aluguel->idaluguel";
             $stm2 = Database::prepare($query2);
             $stm2->execute();
             $a = $stm2->fetch(PDO::FETCH_OBJ);
             $query3 = "SELECT * FROM veiculo WHERE idveiculo = $a->idveiculo";
             $stm3 = Database::prepare($query3);
             $stm3->execute();
             $b = $stm3->fetch(PDO::FETCH_OBJ);
            array_push(
                $aluguels,
                new aluguel($aluguel->idaluguel, $aluguel->idcliente, $aluguel->diaria, $aluguel->datalocacao, $aluguel->combustivelatual,$b->nome, $aluguel->ativo )
            );
        }

        return $aluguels;
    }

    //buscar todas as alugueis disponiovis
    public function disponivel()
    {
        $query = "SELECT * FROM $this->tabela WHERE ativo = 1";
        $stm = Database::prepare($query);
        $stm->execute();
        $aluguels = array();

        foreach ($stm->fetchAll() as $aluguel) {

            $query2 = "SELECT * FROM itemaluguel WHERE idaluguel = $aluguel->idaluguel";
            $stm2 = Database::prepare($query2);
            $stm2->execute();
            $a = $stm2->fetch(PDO::FETCH_OBJ);
            $query3 = "SELECT * FROM veiculo WHERE idveiculo = $a->idveiculo";
            $stm3 = Database::prepare($query3);
            $stm3->execute();
            $b = $stm3->fetch(PDO::FETCH_OBJ);
            array_push(
                $aluguels,
                new aluguel($aluguel->idaluguel, $aluguel->idcliente, $aluguel->diaria, $aluguel->datalocacao, $aluguel->combustivelatual, $b->nome,$aluguel->ativo)
            );
        }

        return $aluguels;
    }

    // inserir uma aluguel
    public function insert($idcliente, $diaria,$datalocacao,$combustivelatual)
    {
        $query = "INSERT INTO $this->tabela (idcliente,diaria,datalocacao,combustivelatual,ativo) VALUES (:idcliente, :diaria,:datalocacao,:combustivelatual, 1)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idcliente', $idcliente);
        $stm->bindParam(':diaria', $diaria);
        $stm->bindParam(':datalocacao', $datalocacao);
        $stm->bindParam(':combustivelatual', $combustivelatual);
        return $stm->execute();
    }

    //busca um id de uma aluguel
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
            //update de aluguel

        public function update($idaluguel)
    {
        $idcliente = $this->getidcliente();
        $datalocacao = $this->getdatalocacao();
        $combustivelatual = $this->getcombustivelatual();
        $diaria = $this->getdiaria();
        $this->setidaluguel($idaluguel);
        $query = "UPDATE $this->tabela SET idcliente = :idcliente, diaria = :diaria , datalocacao = :datalocacao, combustivelatual = :combustivelatual WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidaluguel(), PDO::PARAM_INT);
        $stm->bindParam(':idcliente', $idcliente);
        $stm->bindParam(':datalocacao', $datalocacao);
        $stm->bindParam(':combustivelatual', $combustivelatual);
        $stm->bindParam(':diaria', $diaria);
        return $stm->execute();
    }

    //deleta uma aluguel
    public function delete($idaluguel)
    {
        $query = "DELETE FROM $this->tabela WHERE idaluguel = :id";
        //$query = "UPDATE $this->tabela SET ativo = false WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        return $stm->execute();
    }

}