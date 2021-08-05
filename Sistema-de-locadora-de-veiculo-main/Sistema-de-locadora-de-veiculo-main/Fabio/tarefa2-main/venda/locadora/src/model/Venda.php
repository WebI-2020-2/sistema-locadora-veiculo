<?php

class aluguel
{

    private $idaluguel;
    private $idcliente;
    private $total;
    private $pago;
    private $diaria;
    private $desconto;
    private $troco;
    private $datalocacao;
    private $combustivelatual;

    
    public function __construct($idaluguel, $idcliente,$total,$pago,$diaria,$desconto,$troco,$datalocacao,$combustivelatual)
    {
        $this->idaluguel = $idaluguel;
        $this->idcliente = $idcliente;
        $this->total = $total;
        $this->pago = $pago;
        $this->diaria = $diaria;
        $this->desconto = $desconto;
        $this->troco = $troco;
        $this->datalocacao = $datalocacao;
        $this->combustivelatual = $combustivelatual;

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

    public function setidcliente($idcliente)
    {
        $this->idcliente = $idcliente;
    }

        public function gettotal()
    {
        return $this->total;
    }

    public function settotal($total)
    {
        $this->total = $total;
    }

    public function getpago()
    {
        return $this->pago;
    }

    public function setpago($pago)
    {
        $this->pago = $pago;
    }
        public function getdiaria()
    {
        return $this->diaria;
    }

    public function setdiaria($diaria)
    {
        $this->diaria = $diaria;
    }
            public function getdesconto()
    {
        return $this->desconto;
    }

    public function setdesconto($desconto)
    {
        $this->desconto = $desconto;
    }

    public function gettroco()
    {
        return $this->troco;
    }

    public function settroco($troco)
    {
        $this->troco = $troco;
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


}