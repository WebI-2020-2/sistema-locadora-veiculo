<?php

require_once '../model/seguro.php';
require_once '../model/Database.php';

class seguroController extends seguro
{
    protected $tabela = 'seguro';

    public function __construct()
    {
    }

    public function findOne($idseguro)
    {
        
        $query = "SELECT * FROM $this->tabela WHERE idseguro = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idseguro, PDO::PARAM_INT);
        $stm->execute();
        $seguro = new seguro(null, null, null, null);

        foreach ($stm->fetchAll() as $cl) {
            $seguro->setidseguro($cl->idseguro);
            $seguro->setvalor($cl->valor);
            $seguro->setdatafinal($cl->datafinal);
            $seguro->setdatainicio($cl->datainicio);
        }
        return $seguro;
    }

    public function findAll()
    {
        
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $seguros = array();

        foreach ($stm->fetchAll() as $seguro) {
            $seguros[] = new seguro($seguro->idseguro, $seguro->valor, $seguro->datafinal, $seguro->datainicio);
        }
        return $seguros;
    }

    public function delete($idseguro)
    {

        $query = "DELETE FROM $this->tabela WHERE idseguro = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idseguro, PDO::PARAM_INT);
        return $stm->execute();
    }

    public function update($idseguro)
    {
        $datainicio = $this->getdatainicio();
        $this->setidseguro($idseguro);
        $query = "UPDATE $this->tabela SET valor = :valor, datafinal = :datafinal, datainicio = :datainicio WHERE idseguro = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidseguro(), PDO::PARAM_INT);
        $stm->bindParam(':valor', $this->getvalor());
        $stm->bindParam(':datafinal', $this->getdatafinal());
        $stm->bindParam(':datainicio', $datainicio);
        return $stm->execute();
    }

    public function insert($valor,$datafinal,$datainicio)
    {
        $query = "INSERT INTO $this->tabela ( valor,datafinal,datainicio) VALUES (:valor, :datafinal,:datainicio)";
        $stm = Database::prepare($query);
        $stm->bindParam(':valor', $valor);
        $stm->bindParam(':datafinal', $datafinal);
        $stm->bindParam(':datainicio', $datainicio);
        return $stm->execute();
    }

}
