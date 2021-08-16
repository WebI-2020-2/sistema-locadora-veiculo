<?php

class aluguel
{

    private $idaluguel;
    private $idcliente;
    private $diaria;
    private $datalocacao;
    private $combustivelatual;
    private $nome;
    private $ativo;

    
    public function __construct($idaluguel, $idcliente,$diaria,$datalocacao,$combustivelatual,$nome,$ativo)
    {
        $this->idaluguel = $idaluguel;
        $this->idcliente = $idcliente;
        $this->diaria = $diaria;
        $this->datalocacao = $datalocacao;
        $this->combustivelatual = $combustivelatual;
        $this->nome = $nome; 
        $this->ativo = $ativo;


    }

    public function getidaluguel()
    {
        return $this->idaluguel;
    }

    public function setidaluguel($idaluguel)
    {
        $this->idaluguel = $idaluguel;
    }

    public function getidcliente()
    {
        return $this->idcliente;
    }
    public function setnome($nome)
    {
        $this->nome = $nome;
    }

    public function getnome()
    {
        return $this->nome;
    }
    public function setidcliente($idcliente)
    {
        $this->idcliente = $idcliente;
    }

    
        public function getdiaria()
    {
        return $this->diaria;
    }

    public function setdiaria($diaria)
    {
        $this->diaria = $diaria;
    }
       
    public function getdatalocacao()
    {
        return $this->datalocacao;
    }
    public function setdatalocacao($datalocacao)
    {
        $this->datalocacao = $datalocacao;
    }
        public function getcombustivelatual()
    {
        return $this->combustivelatual;
    }
    public function setcombustivelatual($combustivelatual)
    {
        $this->combustivelatual = $combustivelatual;
    }
        public function getativo()
    {
        return $this->ativo;
    }
    public function setativo($ativo)
    {
        $this->ativo = $ativo;
    }
}