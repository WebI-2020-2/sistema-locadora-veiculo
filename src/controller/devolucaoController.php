<?php

require_once '../model/devolucao.php';
require_once '../model/Database.php';

class devolucaoController extends devolucao
{
    protected $tabela = 'devolucao';

    public function __construct()
    {
    }

    public function findOne($iddevolucao)
    {
        
        $query = "SELECT * FROM $this->tabela WHERE iddevolucao = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $iddevolucao, PDO::PARAM_INT);
        $stm->execute();
        $devolucao = new devolucao(null, null, null, null, null, null, null, null,null);

        foreach ($stm->fetchAll() as $ven) {
            $devolucao->setiddevolucao($ven->iddevolucao);
            $devolucao->setidaluguel($ven->idaluguel);
            $devolucao->settotal($ven->total);
            $devolucao->setdatadevolucao($ven->datadevolucao);
            $devolucao->setextra($ven->extra);
            $devolucao->setcombustiveldevolucao($ven->combustiveldevolucao);
        }
        return $devolucao;
    }

     public function findAll()
    {
        $query = "SELECT * FROM $this->tabela";
        $stm = Database::prepare($query);
        $stm->execute();
        $devolucaos = array();

        foreach ($stm->fetchAll() as $devolucao) {
            array_push(
                $devolucaos,
                new devolucao($devolucao->iddevolucao,$devolucao->idaluguel, $devolucao->total, $devolucao->extra,$devolucao->datadevolucao, $devolucao->combustiveldevolucao)
            );
        }
        return $devolucaos;
    }

    public function insert($idaluguel,$datadevolucao,$combustiveldevolucao,$extra,$total)
    {
        $query = "INSERT INTO $this->tabela (idaluguel, datadevolucao,combustiveldevolucao,extra,total) VALUES (:idaluguel,:datadevolucao, :combustiveldevolucao,:extra,:total)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idaluguel', $idaluguel);
        $stm->bindParam(':extra', $extra);
        $stm->bindParam(':total', $total);
        $stm->bindParam(':datadevolucao', $datadevolucao);
        $stm->bindParam(':combustiveldevolucao', $combustiveldevolucao);
        $stm->execute();
        $query2 = "SELECT * FROM itemaluguel WHERE idaluguel = :idaluguel";
        $stm2 = Database::prepare($query2);
        $stm2->bindParam(':idaluguel', $idaluguel);
        $stm2->execute();
        $a = $stm2->fetch(PDO::FETCH_OBJ);
        $query3 = "UPDATE `veiculo` SET `status` = 'disponivel' WHERE `veiculo`.`idveiculo` = $a->idveiculo ";
        $stm3 = Database::prepare($query3);
        $stm3->execute();
        $query4 = "UPDATE `aluguel` SET `ativo` = '0' WHERE `idaluguel` =  :idaluguel ";
        $stm4 = Database::prepare($query4);
        $stm4->bindParam(':idaluguel', $idaluguel);
        $stm4->execute();
        $query5 = "UPDATE `devolucao` SET `total` = $total WHERE `idaluguel` =  :idaluguel ";
        $stm5 = Database::prepare($query5);
        $stm5->bindParam(':idaluguel', $idaluguel);
        return $stm5->execute();
    }

    public function total($idaluguel,$datadevolucao,$combustiveldevolucao,$prgas,$extra){
        $query = "SELECT * FROM aluguel WHERE idaluguel = :idaluguel";
        $stm = Database::prepare($query);
        $stm->bindParam(':idaluguel', $idaluguel);
        $stm->execute();
        $alu = $stm->fetch(PDO::FETCH_OBJ);
        $datainicial = new DateTime($alu->datalocacao);
        $datafinal = new DateTime($datadevolucao);
        $diferenca = $datainicial->diff($datafinal);
        $dias = $diferenca->days;
        $gasol = floatval($alu->combustivelatual) - floatval($combustiveldevolucao);
        $extra2 = floatval($extra);
        if($gasol>0){
            $extra2 = $extra2 + ($gasol*floatval($prgas));
        }

        $total = ( $dias * floatval($alu->diaria) )+ $extra2;

        return $total;
    }

    
    public function findiddevolucao($idaluguel)
    {
        $iddevolucao = null;
        $query = "SELECT iddevolucao FROM $this->tabela WHERE idaluguel = :id ";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        $stm->execute();

        foreach ($stm->fetchAll() as $devolucao) {
            $iddevolucao = $devolucao->iddevolucao;
        }
        return $iddevolucao;
    }

    public function update($iddevolucao)
    {
        $idaluguel = $this->getidaluguel();
        $total = $this->gettotal();
        $extra = $this->getextra();
        $datadevolucao = $this->getdatadevolucao();
        $combustiveldevolucao = $this->getcombustiveldevolucao();
        $this->setiddevolucao($iddevolucao);
        $query = "UPDATE $this->tabela SET idaluguel = :idaluguel,total = :total, extra = :extra, datadevolucao = :datadevolucao, combustiveldevolucao = :combustiveldevolucao WHERE iddevolucao = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $iddevolucao, PDO::PARAM_INT);
        $stm->bindParam(':idaluguel', $idaluguel);        
        $stm->bindParam(':total', $total);
        $stm->bindParam(':extra', $extra);
        $stm->bindParam(':datadevolucao', $datadevolucao);
        $stm->bindParam(':combustiveldevolucao', $combustiveldevolucao);
        return $stm->execute();
    }
    public function delete($iddevolucao)
    {

        $query = "DELETE FROM $this->tabela WHERE iddevolucao = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $iddevolucao, PDO::PARAM_INT);
        return $stm->execute();
    }

}
