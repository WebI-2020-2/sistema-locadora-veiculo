<?php

class  veiculo
{

    private $idveiculo;
    private $idseguro;
    private $idtipoveiculo;
    private $ano;
    private $cor;
    private $placa;
    private $idmodelo;
    private $nome;
    private $status;
    
    public function __construct($idveiculo, $idseguro,$idtipoveiculo,$ano,$cor,$placa,$idmodelo,$nome,$status)
    {
        $this->idveiculo = $idveiculo;
        $this->idseguro = $idseguro;
        $this->idtipoveiculo = $idtipoveiculo;
        $this->ano = $ano;
        $this->cor = $cor;   
        $this->placa = $placa;
        $this->idmodelo = $idmodelo;
        $this->nome = $nome;
        $this->status = $status;
    }
    /**
     * @return mixed
     */
    public function getidveiculo()
    {
        return $this->idveiculo;
    }

    /**
     * @return mixed
     */
    public function getidseguro()
    {
        return $this->idseguro;
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
    public function getano()
    {
        return $this->ano;
    }

    /**
     * @return mixed
     */
    public function getcor()
    {
        return $this->cor;
    }

    /**
     * @return mixed
     */
    public function getstatus()
    {
        return $this->status;
    }
    /**
     * @return mixed
     */
    public function getplaca()
    {
        return $this->placa;
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
    public function getnome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $idveiculo
     */
    public function setidveiculo($idveiculo)
    {
        $this->idveiculo = $idveiculo;
    }

    /**
     * @param mixed $idseguro
     */
    public function setidseguro($idseguro)
    {
        $this->idseguro = $idseguro;
    }
    /**
     * @param mixed $tipoveiculo
     */
    public function setidtipoveiculo($idtipoveiculo)
    {
        $this->idtipoveiculo = $idtipoveiculo;
    }
     /**
     * @param mixed $ano
     */
    public function setano($ano)
    {
        $this->ano = $ano;
    }
    /**
     * @param mixed $cor
     */
    public function setcor($cor)
    {
        $this->cor = $cor;
    }
        /**
     * @param mixed $modelo
     */
    public function setplaca($placa)
    {
        $this->placa = $placa;
    }
            /**
     * @param mixed $idmodelo
     */
    public function setidmodelo($idmodelo)
    {
        $this->idmodelo = $idmodelo;
    }
                /**
     * @param mixed $nome
     */
    public function setnome($nome)
    {
        $this->nome = $nome;
    }
                /**
     * @param mixed $status
     */
    public function setstatus($status)
    {
        $this->status = $status;
    }

}