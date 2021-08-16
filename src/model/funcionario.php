<?php

class funcionario
{

    private $idfuncionario;
    private $nome;
    private $cpf;

    public function __construct($idfuncionario, $nome, $cpf)
    {
        $this->idfuncionario = $idfuncionario;
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getidfuncionario()
    {
        return $this->idfuncionario;
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
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $idfuncionario
     */
    public function setidfuncionario($idfuncionario)
    {
        $this->idfuncionario = $idfuncionario;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }


}