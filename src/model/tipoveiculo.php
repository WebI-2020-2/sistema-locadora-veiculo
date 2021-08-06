<?php

class tipoveiculo
{

    private $idtipoveiculo;
    private $descricao;


    public function __construct($idtipoveiculo, $descricao)
    {
        $this->idtipoveiculo = $idtipoveiculo;
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getidtipoveiculo()
    {
        return $this->idtipoveiculo;
    }

    /**
     * @return mixed
     */
    public function getdescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $idtipoveiculo
     */
    public function setidtipoveiculo($idtipoveiculo)
    {
        $this->idtipoveiculo = $idtipoveiculo;
    }

    /**
     * @param mixed $descricao
     */
    public function setdescricao($descricao)
    {
        $this->descricao = $descricao;
    }



}