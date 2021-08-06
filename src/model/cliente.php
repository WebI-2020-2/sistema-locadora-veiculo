<?php

class cliente
{

    private $idcliente;
    private $nome;
    private $email;
    private $endereco;
    private $telefone;


    public function __construct($idcliente, $nome, $email,$endereco,$telefone)
    {
        $this->idcliente = $idcliente;
        $this->nome = $nome;
        $this->email = $email;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getidcliente()
    {
        return $this->idcliente;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getemail()
    {
        return $this->email;
    }
        /**
     * @return mixed
     */
    public function getendereco()
    {
        return $this->endereco;
    }
    /**
     * @return mixed
     */
    public function gettelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $idcliente
     */
    public function setidcliente($idcliente)
    {
        $this->idcliente = $idcliente;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param mixed $email
     */
    public function setemail($email)
    {
        $this->email = $email;
    }
    /**
     * @param mixed $endereco
     */
    public function setendereco($endereco)
    {
        $this->endereco = $endereco;
    }
    /**
     * @param mixed $telefone
     */
    public function settelefone($telefone)
    {
        $this->telefone = $telefone;
    }

}