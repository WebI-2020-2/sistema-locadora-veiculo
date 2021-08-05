<?php

require_once '../model/ItensVenda.php';
require_once '../model/Database.php';

class ItensVendaController extends itemaluguel
{
    protected $tabela = 'itemaluguel';

    public function __construct()
    {
    }

    // inserir um itensVenda
    public function insert($idaluguel, $idveiculo)
    {
        $query = "INSERT INTO $this->tabela (idaluguel, idveiculo) VALUES (:idaluguel, :idveiculo)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idaluguel', $idaluguel);
        $stm->bindParam(':idveiculo', $idveiculo);

        return $stm->execute();
    }

    //busca todos os itensVenda de uma venda
    public function findAllidaluguel($idaluguel)
    {
        $query = "SELECT * FROM $this->tabela WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        $stm->execute();
        $itemaluguels = array();

        foreach ($stm->fetchAll() as $itemaluguel) {
            array_push(
                $itemaluguels,
                new ItensVenda($itemaluguel->iditemaluguel, $idaluguel, $itemaluguel->idveiculo)
            );
        }
        return $itemaluguels;
    }

    //deleta todos os itensVenda pelo idVenda
    public function delete($idaluguel)
    {
        $query = "DELETE FROM $this->tabela WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        return $stm->execute();
    }

}