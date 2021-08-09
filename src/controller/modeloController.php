<?php

require_once '../model/modelo.php';
require_once '../model/Database.php';

class modeloController extends modelo
{
    protected $tabela = 'modelo';

    public function __construct()
    {
    }

    public function findOne($idmodelo)
    {

        
        $query = "SELECT * FROM $this->tabela WHERE idmodelo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idmodelo, PDO::PARAM_INT);
        $stm->execute();
        $modelo = new modelo(null, null, null, null);

        foreach ($stm->fetchAll() as $cl) {
            $modelo->setidmodelo($cl->idmodelo);
            $modelo->setdescricao($cl->descricao);

        }
        return $modelo;
    }

    public function findAll()
    {
        
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $modelos = array();

        foreach ($stm->fetchAll() as $modelo) {
            $modelos[] = new modelo($modelo->idmodelo, $modelo->descricao);
        }
        return $modelos;
    }

    public function delete($idmodelo)
    {

        $query = "DELETE FROM $this->tabela WHERE idmodelo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idmodelo, PDO::PARAM_INT);
        return $stm->execute();
    }

    public function update($idmodelo)
    {
        $this->setidmodelo($idmodelo);
        $query = "UPDATE $this->tabela SET descricao = :descricao  WHERE idmodelo = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidmodelo(), PDO::PARAM_INT);
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