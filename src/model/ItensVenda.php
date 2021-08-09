<?php

class itemaluguel
{

    private $iditemaluguel;
    private $idaluguel;
    private $idveiculo;
    
    public function __construct($iditemaluguel, $idaluguel, $idveiculo)
    {
        $this->iditemaluguel = $iditemaluguel;
        $this->idaluguel = $idaluguel;
        $this->idveiculo = $idveiculo;

    }

    public function getiditemaluguela()
    {
        return $this->iditemaluguel;
    }

    public function setiditemaluguel($iditemaluguel)
    {
        $this->iditemaluguel = $iditemaluguel;
    }

    public function getidaluguel()
    {
        return $this->idaluguel;
    }

    public function setidaluguel($idaluguel)
    {
        $this->idaluguel = $idaluguel;
    }

    public function getidveiculo()
    {
        return $this->idveiculo;
    }

    public function setidveiculo($idveiculo)
    {
        $this->idveiculo = $idveiculo;
    }
    

}