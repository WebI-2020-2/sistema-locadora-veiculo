<?php

require_once '../model/funcionario.php';
require_once '../model/Database.php';

class funcionarioController extends funcionario
{
    protected $tabela = 'funcionario';

    public function __construct()
    {
    }

    public function findOne($idfuncionario)
    {

        
        $query = "SELECT * FROM funcionario WHERE idfuncionario = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idfuncionario, PDO::PARAM_INT);
        $stm->execute();
        $funcionario = new funcionario(null, null, null, null);

        foreach ($stm->fetchAll() as $cl) {
            $funcionario->setidfuncionario($cl->idfuncionario);
            $funcionario->setNome($cl->nome);
            $funcionario->setCpf($cl->cpf);
        }
        return $funcionario;
    }

    public function findAll()
    {
        
        $query = "SELECT * from funcionario";
        $stm = Database::prepare($query);
        $stm->execute();
        $funcionarios = array();

        foreach ($stm->fetchAll() as $funcionario) {
            $funcionarios[] = new funcionario($funcionario->idfuncionario, $funcionario->nome, $funcionario->cpf);
        }
        return $funcionarios;
    }

    public function delete($idfuncionario)
    {

        $query = "DELETE FROM $this->tabela WHERE idfuncionario = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idfuncionario, PDO::PARAM_INT);
        return $stm->execute();
    }

    public function update($idfuncionario)
    {
        $cpf = $this->getCpf();
        $this->setidfuncionario($idfuncionario);
        $query = "UPDATE $this->tabela SET nome = :nome, cpf = :cpf WHERE idfuncionario = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidfuncionario(), PDO::PARAM_INT);
        $stm->bindParam(':nome', $this->getNome());
        $stm->bindParam(':cpf', $cpf);
        return $stm->execute();
    }

 public function insert($nome, $cpf)
    {
        $query = "INSERT INTO $this->tabela (nome, cpf) VALUES (:nome, :cpf)";
        $stm = Database::prepare($query);
        $stm->bindParam(':nome', $nome);
        $stm->bindParam(':cpf', $cpf);
        return $stm->execute();

}
}