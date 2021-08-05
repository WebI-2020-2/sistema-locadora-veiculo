<?php

require_once '../model/cliente.php';
require_once '../model/Database.php';

class ClientesController extends cliente
{
    protected $tabela = 'cliente';

    public function __construct()
    {
    }

    public function findOne($idcliente)
    {
        
        $query = "SELECT * FROM $this->tabela WHERE idcliente = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idcliente, PDO::PARAM_INT);
        $stm->execute();
        $cliente = new cliente(null, null, null, null, null);

        foreach ($stm->fetchAll() as $cl) {
            $cliente->setidcliente($cl->idcliente);
            $cliente->setNome($cl->nome);
            $cliente->setemail($cl->email);
            $cliente->setendereco($cl->endereco);
            $cliente->settelefone($cl->telefone);
        }
        return $cliente;
    }

    public function findAll()
    {
        
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $clientes = array();

        foreach ($stm->fetchAll() as $cliente) {
            $clientes[] = new cliente($cliente->idcliente, $cliente->nome, $cliente->email, $cliente->endereco, $cliente->telefone);
        }
        return $clientes;
    }

    public function delete($idcliente)
    {

        $query = "DELETE FROM $this->tabela WHERE idcliente = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idcliente, PDO::PARAM_INT);
        return $stm->execute();
    }

    public function update($idcliente)
    {
        $telefone = $this->gettelefone();
        $this->setidcliente($idcliente);
        $query = "UPDATE $this->tabela SET nome = :nome, email = :email, endereco = :endereco, telefone = :telefone WHERE idcliente = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getidcliente(), PDO::PARAM_INT);
        $stm->bindParam(':nome', $this->getNome());
        $stm->bindParam(':email', $this->getemail());
        $stm->bindParam(':endereco', $this->getendereco());
        $stm->bindParam(':telefone', $telefone);
        return $stm->execute();
    }

    public function insert($nome, $email,$endereco,$telefone)
    {
        $query = "INSERT INTO $this->tabela (nome, email,endereco,telefone) VALUES (:nome, :email, :endereco, :telefone)";
        $stm = Database::prepare($query);
        $stm->bindParam(':nome', $nome);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':endereco', $endereco);
        $stm->bindParam(':telefone', $telefone);
        return $stm->execute();
    }

}
