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
        $veiculo = new veiculo(null, null, null, null, null,null,null,null,null,null);

        foreach ($stm->fetchAll() as $cl) {
            $veiculo->setidveiculo($cl->idveiculo);
            $veiculo->setidseguro($cl->idseguro);
            $veiculo->setidtipoveiculo($cl->idtipoveiculo);
            $veiculo->setano($cl->ano);
            $veiculo->setcor($cl->cor);
            $veiculo->setplaca($cl->placa);
            $veiculo->setidmodelo($cl->idmodelo);
            $veiculo->setnome($cl->nome);
            $veiculo->setstatus($cl->status);

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
            $veiculos[] = new veiculo($veiculo->idveiculo, $veiculo->idseguro, $veiculo->idtipoveiculo, $veiculo->ano, $veiculo->cor, $veiculo->placa, $veiculo->idmodelo, $veiculo->nome, $veiculo->status);
        }
        return $veiculos;
    }

    public function delete($idveiculo)
    {

        $query = "DELETE FROM $this->tabela WHERE idveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idveiculo, PDO::PARAM_INT);
        return $stm->execute();
    }

    public function update($idveiculo)
    {
        $idtipoveiculo = $this->getidtipoveiculo();
        $this->setidveiculo($idveiculo);
        $query = "UPDATE $this->tabela SET nome = :nome, cor = :cor, ano = :ano, status = :status, placa = :placa, idmodelo = :idmodelo, idseguro = :idseguro, idtipoveiculo = :idtipoveiculo WHERE idveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidveiculo(), PDO::PARAM_INT);
        $stm->bindParam(':nome', $this->getnome());
        $stm->bindParam(':cor', $this->getcor());
        $stm->bindParam(':ano', $this->getano());
        $stm->bindParam(':status', $this->getstatus());
        $stm->bindParam(':placa', $this->getplaca());
        $stm->bindParam(':idmodelo', $this->getidmodelo());
        $stm->bindParam(':idseguro', $this->getidseguro());
        $stm->bindParam(':idtipoveiculo', $idtipoveiculo);
        return $stm->execute();
    }


    public function insert($nome, $cor,$idmodelo,$idseguro,$ano,$idtipoveiculo,$status,$placa)
    {
        $query = "INSERT INTO $this->tabela (nome, cor,idmodelo,idseguro,ano,idtipoveiculo,status,placa) VALUES (:nome, :cor, :idmodelo, :idseguro,:ano,:idtipoveiculo,:status,:placa)";
        $stm = Database::prepare($query);
        $stm->bindParam(':nome', $nome);
        $stm->bindParam(':cor', $cor);
        $stm->bindParam(':idmodelo', $idmodelo);
        $stm->bindParam(':idseguro', $idseguro);
        $stm->bindParam(':ano', $ano);
        $stm->bindParam(':idtipoveiculo', $idtipoveiculo);
        $stm->bindParam(':status', $status);
        $stm->bindParam(':placa', $placa);
        return $stm->execute();
    }

}
