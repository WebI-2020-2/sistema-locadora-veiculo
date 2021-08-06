<?php

require_once '../model/devolucao.php';
require_once '../model/Database.php';

class devolucaoController extends devolucao
{
    protected $tabela = 'devolucao';

    public function __construct()
    {
    }

    public function findOne($iddevolucao)
    {
        
        $query = "SELECT * FROM $this->tabela WHERE iddevolucao = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $iddevolucao, PDO::PARAM_INT);
        $stm->execute();
        $devolucao = new devolucao(null, null, null, null, null, null, null, null);

        foreach ($stm->fetchAll() as $ven) {
            $devolucao->setiddevolucao($ven->iddevolucao);
            $devolucao->setidaluguel($ven->idaluguel);
            $devolucao->setavaria($ven->avaria);
            $devolucao->setdatadevolucao($ven->datadevolucao);
            $devolucao->setextra($ven->extra);
            $devolucao->setcombustiveldevolucao($ven->combustiveldevolucao);
        }
        return $devolucao;
    }

     public function findAll()
    {
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $devolucaos = array();

        foreach ($stm->fetchAll() as $devolucao) {
            array_push(
                $devolucaos,
                new devolucao($devolucao->iddevolucao,$devolucao->idaluguel, $devolucao->avaria, $devolucao->extra,$devolucao->datadevolucao, $devolucao->combustiveldevolucao)
            );
        }
        return $devolucaos;
    }

    public function insert($idaluguel,$avaria, $extra,$datadevolucao,$combustiveldevolucao)
    {
        $query = "INSERT INTO $this->tabela (idaluguel,avaria,extra, datadevolucao,combustiveldevolucao) VALUES (:idaluguel, :avaria, :extra,:datadevolucao, :combustiveldevolucao)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idaluguel', $idaluguel);       
        $stm->bindParam(':avaria', $avaria);
        $stm->bindParam(':extra', $extra);
        $stm->bindParam(':datadevolucao', $datadevolucao);
        $stm->bindParam(':combustiveldevolucao', $combustiveldevolucao);
        return $stm->execute();
    }

    
    public function findiddevolucao($idaluguel)
    {
        $idedevolucao = null;
        $query = "SELECT idedevolucao FROM $this->tabela WHERE idaluguel = :id ";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        $stm->execute();

        foreach ($stm->fetchAll() as $devolucao) {
            $idedevolucao = $devolucao->idedevolucao;
        }
        return $iddevolucao;
    }

    public function update($iddevolucao)
    {
        $combustiveldevolucao = $this->getcombustiveldevolucao();
        $this->setiddevolucao($iddevolucao);
        $query = "UPDATE $this->tabela SET idaluguel = :idaluguel,avaria = :avaria, extra = :extra, datadevolucao = :datadevolucao, combustiveldevolucao = :combustiveldevolucao WHERE iddevolucao = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getiddevolucao(), PDO::PARAM_INT);
        $stm->bindParam(':idaluguel', $this->getidaluguel());        
        $stm->bindParam(':avaria', $this->getavaria());
        $stm->bindParam(':extra', $this->getextra());
        $stm->bindParam(':datadevolucao', $this->getdatadevolucao());
        $stm->bindParam(':combustiveldevolucao', $combustiveldevolucao);
        return $stm->execute();
    }
    public function delete($iddevolucao)
    {

        $query = "DELETE FROM $this->tabela WHERE iddevolucao = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $iddevolucao, PDO::PARAM_INT);
        return $stm->execute();
    }

}
