<?php

class  devolucao
{

    private $iddevolucao;
    private $idaluguel;
    private $avaria;
    private $extra;
    private $datadevolucao;
    private $combustiveldevolucao;
    
    public function __construct($iddevolucao,$idaluguel,$avaria,$extra,$datadevolucao,$combustiveldevolucao)
    {
        $this->iddevolucao = $iddevolucao;
        $this->idaluguel = $idaluguel;       
        $this->avaria = $avaria;
        $this->extra = $extra;
        $this->datadevolucao = $datadevolucao;
        $this->combustiveldevolucao = $combustiveldevolucao;


        
    }


       
    /**
     * @return mixed
     */
    public function getiddevolucao()
    {
        return $this->iddevolucao;
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
    public function getavaria()
    {
        return $this->avaria;
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
    public function setavaria($avaria)
    {
        $this->avaria = $avaria;
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