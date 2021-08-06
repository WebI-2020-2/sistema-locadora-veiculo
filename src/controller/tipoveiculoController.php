<?php

require_once '../model/tipoveiculo.php';
require_once '../model/Database.php';

class tipoveiculoController extends tipoveiculo
{
    protected $tabela = 'tipoveiculo';

    public function __construct()
    {
    }

    public function findOne($idtipoveiculo)
    {

        
        $query = "SELECT * FROM $this->tabela WHERE idtipoveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idtipoveiculo, PDO::PARAM_INT);
        $stm->execute();
        $tipoveiculo = new tipoveiculo(null, null, null, null);

        foreach ($stm->fetchAll() as $cl) {
            $tipoveiculo->setidtipoveiculo($cl->idtipoveiculo);
            $tipoveiculo->setdescricao($cl->descricao);

        }
        return $tipoveiculo;
    }

    public function findAll()
    {
        
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $tipoveiculos = array();

        foreach ($stm->fetchAll() as $tipoveiculo) {
            $tipoveiculos[] = new tipoveiculo($tipoveiculo->idtipoveiculo, $tipoveiculo->descricao);
        }
        return $tipoveiculos;
    }

    public function delete($idtipoveiculo)
    {

        $query = "DELETE FROM $this->tabela WHERE idtipoveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idtipoveiculo, PDO::PARAM_INT);
        return $stm->execute();
    }

    public function update($idtipoveiculo)
    {
        $this->setidtipoveiculo($idtipoveiculo);
        $query = "UPDATE $this->tabela SET descricao = :descricao  WHERE idtipoveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidtipoveiculo(), PDO::PARAM_INT);
        $stm->bindParam(':descricao', $this->getdescricao());
        return $stm->execute();
    }

 public function insert($descricao)
    {
        $query = "INSERT INTO $this->tabela (descricao) VALUES (:descricao)";
        $stm = Database::prepare($query);
        $stm->bindParam(':descricao', $descricao);
        return $stm->execute();

}
}