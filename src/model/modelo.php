<?php

class modelo
{

    private $idmodelo;
    private $descricao;


    public function __construct($idmodelo, $descricao)
    {
        $this->idmodelo = $idmodelo;
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getidmodelo()
    {
        return $this->idmodelo;
    }

    /**
     * @return mixed
     */
    public function getdescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $idmodelo
     */
    public function setidmodelo($idmodelo)
    {
        $this->idmodelo = $idmodelo;
    }

    /**
     * @param mixed $descricao
     */
    public function setdescricao($descricao)
    {
        $this->descricao = $descricao;
    }



}