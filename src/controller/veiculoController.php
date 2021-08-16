<?php

require_once '../model/veiculo.php';
require_once '../model/Database.php';

class veiculoController extends veiculo
{
    protected $tabela = 'veiculo';

    public function __construct()
    {
    }

    //busca um veiculo
    public function findOne($idveiculo)
    {
        
        $query = "SELECT * FROM $this->tabela WHERE idveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idveiculo, PDO::PARAM_INT);
        $stm->execute();
        $veiculo = new veiculo(null, null, null, null, null, null, null, null,null,null);

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
public function findOneAlu($idaluguel)
    {
        $query = "SELECT idveiculo FROM itemaluguel WHERE idaluguel = :idaluguel";
        $stm = Database::prepare($query);
        $stm->bindParam(':idaluguel', $idaluguel, PDO::PARAM_INT);
        $stm->execute();
        $R = $stm->fetch(PDO::FETCH_OBJ);
        $query2 = "SELECT * FROM $this->tabela WHERE idveiculo = :R";
        $stm2 = Database::prepare($query2);
        $stm2->bindParam(':R', $R->idveiculo, PDO::PARAM_INT);
        $stm2->execute();
        $veiculo = new veiculo(null, null, null, null, null, null, null, null,null,null);

        foreach ($stm2->fetchAll() as $ven) {
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
    //buscar todos os veiculos

     public function findAll()
    {
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $veiculos = array();

        foreach ($stm->fetchAll() as $veiculo) {
            $veiculos[] = new veiculo($veiculo->idveiculo,$veiculo->idseguro, $veiculo->idmodelo, $veiculo->idtipoveiculo,$veiculo->ano, $veiculo->cor, $veiculo->placa, $veiculo->status, $veiculo->nome);
            
        }
        return $veiculos;
    }
    //buscar os veiculos disponiveis
    public function disponivel()
    {
        $query = "SELECT * FROM $this->tabela WHERE status like 'disponivel'";
        $stm = Database::prepare($query);
        $stm->execute();
        $veiculos = array();

        foreach ($stm->fetchAll() as $veiculo) {
            $veiculos[] = new veiculo($veiculo->idveiculo,$veiculo->idseguro, $veiculo->idmodelo, $veiculo->idtipoveiculo,$veiculo->ano, $veiculo->cor, $veiculo->placa, $veiculo->status, $veiculo->nome);

        }
        return $veiculos;
    }

    // inserir um veiculo
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

        //busca todos os veiculo de um seguro

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

        //update de veiculo

    public function update($idveiculo)
    {

        $idseguro = $this->getidseguro();
        $idmodelo = $this->getidmodelo();
        $idtipoveiculo = $this->getidtipoveiculo();
        $ano = $this->getano();
        $cor = $this->getcor();
        $placa = $this->getplaca();
        $status = $this->getstatus();
        $nome = $this->getnome();
        $query = "UPDATE $this->tabela SET idseguro = :idseguro,idmodelo = :idmodelo, idtipoveiculo = :idtipoveiculo, ano = :ano, cor = :cor , placa = :placa, status = :status, nome = :nome WHERE idveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idveiculo, PDO::PARAM_INT);
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

        //deleta um veiculo
    public function delete($idveiculo)
    {

        $query = "DELETE FROM $this->tabela WHERE idveiculo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idveiculo, PDO::PARAM_INT);
        return $stm->execute();
    }

}
