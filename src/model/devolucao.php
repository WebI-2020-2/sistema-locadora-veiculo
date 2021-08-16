<?php

class  devolucao
{

    private $iddevolucao;
    private $idaluguel;
    private $total;
    private $extra;
    private $datadevolucao;
    private $combustiveldevolucao;
    private $pagamento;
    
    public function __construct($iddevolucao,$idaluguel,$total,$extra,$datadevolucao,$combustiveldevolucao,$pagamento)
    {
        $this->iddevolucao = $iddevolucao;
        $this->idaluguel = $idaluguel;       
        $this->total = $total;
        $this->extra = $extra;
        $this->datadevolucao = $datadevolucao;
        $this->pagamento = $pagamento;
        $this->combustiveldevolucao = $combustiveldevolucao;


        
    }


       
    /**
     * @return mixed
     */
    public function getiddevolucao()
    {
        return $this->iddevolucao;

    }
    public function getpag()
    {
        return $this->pagamento;
    }

    /**
     * @return mixed
     */
    public function getidaluguel()
    {
        return $this->idaluguel;
    }

    
    /**
     * @return mixed
     */
    public function gettotal()
    {
        return $this->total;
    }

                /**
     * @return mixed
     */
    public function getextra()
    {
        return $this->extra;
    }

        /**
     * @return mixed
     */
    public function getdatadevolucao()
    {
        return $this->datadevolucao;
    }
            /**
     * @return mixed
     */
    public function getcombustiveldevolucao()
    {
        return $this->combustiveldevolucao;
    }


    /**
     * @param mixed $iddevolucao
     */
    public function setiddevolucao($iddevolucao)
    {
        $this->iddevolucao = $iddevolucao;
    }
     public function setpag($idpagamento)
    {
        $this->pagamento = $pagamento;
    }
        /**
     * @param mixed $iddevolucao
     */
    public function setidaluguel($idaluguel)
    {
        $this->idaluguel = $idaluguel;
    }

    /**
     * @param mixed $avaria
     */
    public function settotal($total)
    {
        $this->total = $total;
    }

             /**
     * @param mixed $extra
     */
    public function setextra($extra)
    {
        $this->extra = $extra;
    }
    
     /**
     * @param mixed $datadevolucao
     */
    public function setdatadevolucao($datadevolucao)
    {
        $this->datadevolucao = $datadevolucao;
    }
         /**
     * @param mixed $combustiveldevolucao
     */
    public function setcombustiveldevolucao($combustiveldevolucao)
    {
        $this->combustiveldevolucao = $combustiveldevolucao;
    }




}