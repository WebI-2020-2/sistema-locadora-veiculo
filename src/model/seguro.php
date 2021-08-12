<?php

class seguro
{

    private $idseguro;
    private $valor;
    private $datafinal;
    private $datainicio;

    public function __construct($idseguro, $valor, $datafinal,$datainicio)
    {
        $this->idseguro = $idseguro;
        $this->valor = $valor;
        $this->datafinal = $datafinal;
        $this->datainicio = $datainicio;
    }

    public function setidseguro($idseguro) {
        $this->idseguro = $idseguro;
    }

    public function getidseguro() {
        return $this->idseguro;
    }
    public function setvalor($valor) {
        $this->valor = $valor;
    }

    public function getvalor() {
        return $this->valor;
    }

    public function setdatafinal($datafinal) {
        $this->datafinal = $datafinal;
    }

    public function getdatafinal() {
        return $this->datafinal;
    }

    public function setdatainicio($datainicio) {
        $this->datainicio = $datainicio;
    }

    public function getdatainicio() {
        return $this->datainicio;
    }

}