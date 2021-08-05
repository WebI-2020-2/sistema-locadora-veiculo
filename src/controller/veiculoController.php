<?php

require_once '../model/veiculo.php';
require_once '../model/Database.php';

class veiculoController extends veiculo
{
    protected $tabela = 'veiculo';

    public function __construct()
    {
    }

    public function findOne($idveiculo)
    {
        
        $query = "SELECT * FROM $this->tabela WHERE idveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idveiculo, PDO::PARAM_INT);
        $stm->execute();
        $veiculo = new veiculo(null, null, null, null, null, null, null, null,null,null,null);

        foreach ($stm->fetchAll() as $ven) {
            $veiculo->setidveiculo($ven->idveiculo);
            $veiculo->setidseguro($ven->idseguro);
            $veiculo->setidmodelo($ven->idmodelo);
            $veiculo->setidtipoveiculo($ven->idtipoveiculo);
            $veiculo->setano($ven->ano);
            $veiculo->setcor($ven->cor);
            $veiculo->setplaca($ven->placa);
            $veiculo->setstatus($ven->status);
            $veiculo->setnome($ven->nome);

        }
        return $veiculo;
    }

     public function findAll()
    {
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $veiculos = array();

        foreach ($stm->fetchAll() as $veiculo) {
            array_push(
                $veiculos,
                new veiculo($veiculo->idveiculo,$veiculo->idseguro, $veiculo->idmodelo, $veiculo->idtipoveiculo,$veiculo->ano, $veiculo->cor, $veiculo->placa, $veiculo->status, $veiculo->nome)
            );
        }
        return $veiculos;
    }

    public function insert($idseguro,$idmodelo, $idtipoveiculo,$ano,$cor, $placa, $status, $nome)
    {
        $query = "INSERT INTO $this->tabela (idseguro,idmodelo,idtipoveiculo, ano,cor,placa,status,nome) VALUES (:idseguro, :idmodelo, :idtipoveiculo,:ano, :cor,:placa, :status,:nome)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idseguro', $idseguro);       
        $stm->bindParam(':idmodelo', $idmodelo);
        $stm->bindParam(':idtipoveiculo', $idtipoveiculo);
        $stm->bindParam(':ano', $ano);
        $stm->bindParam(':cor', $cor);
        $stm->bindParam(':placa', $placa);
        $stm->bindParam(':status', $status);
        $stm->bindParam(':nome', $nome);
        return $stm->execute();
    }

    
    public function findidveiculo($idseguro)
    {
        $idveiculo = null;
        $query = "SELECT idveiculo FROM $this->tabela WHERE idseguro = :id ";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idseguro, PDO::PARAM_INT);
        $stm->execute();

        foreach ($stm->fetchAll() as $veiculo) {
            $idveiculo = $veiculo->idveiculo;
        }
        return $idveiculo;
    }

    public function update($idveiculo)
    {
        $nome = $this->getnome();
        $this->setidveiculo($idveiculo);
        $query = "UPDATE $this->tabela SET idseguro = :idseguro,idmodelo = :idmodelo, idtipoveiculo = :idtipoveiculo, ano = :ano, cor = :cor , placa = :placa, status = :status, nome = :nome WHERE idveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidveiculo(), PDO::PARAM_INT);
        $stm->bindParam(':idseguro', $this->getidseguro());        
        $stm->bindParam(':idmodelo', $this->getidmodelo());
        $stm->bindParam(':idtipoveiculo', $this->getidtipoveiculo());
        $stm->bindParam(':ano', $this->getano());
        $stm->bindParam(':cor', $this->getcor());
        $stm->bindParam(':placa', $this->getplaca());
        $stm->bindParam(':status', $this->getstatus());
        $stm->bindParam(':nome', $nome);
        return $stm->execute();
    }
    public function delete($idveiculo)
    {

        $query = "DELETE FROM $this->tabela WHERE idveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idveiculo, PDO::PARAM_INT);
        return $stm->execute();
    }

}
