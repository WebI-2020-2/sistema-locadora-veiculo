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
            $devolucao->setavaria($ven->avaria);
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
                new devolucao($devolucao->iddevolucao,$devolucao->idaluguel, $devolucao->avaria, $devolucao->extra,$devolucao->datadevolucao, $devolucao->combustiveldevolucao)
            );
        }
        return $devolucaos;
    }

    public function insert($idaluguel,$avaria, $extra,$datadevolucao,$combustiveldevolucao,$prgas)
    {
        $query = "INSERT INTO $this->tabela (idaluguel,avaria,extra, datadevolucao,combustiveldevolucao) VALUES (:idaluguel, :avaria, :extra,:datadevolucao, :combustiveldevolucao)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idaluguel', $idaluguel);       
        $stm->bindParam(':avaria', $avaria);
        $stm->bindParam(':extra', $extra);
        $stm->bindParam(':datadevolucao', $datadevolucao);
        $stm->bindParam(':combustiveldevolucao', $combustiveldevolucao);
        $stm->execute();
        $query2 = "SELECT * FROM itemaluguel WHERE idaluguel = :idaluguel";
        $stm2 = Database::prepare($query2);
        $stm2->execute();
        $a = $stm2->fetch(PDO::FETCH_OBJ);
        $query3 = "UPDATE `veiculo` SET `status` = 'disponivel' WHERE `veiculo`.`idveiculo` = $a->idveiculo ";
        $stm = Database::prepare($query3);
        $stm->execute();
        $query4 = "UPDATE `aluguel` SET `ativo` = '0' WHERE `aluguel`.`idaluguel` =  :idaluguel ";
        $stm = Database::prepare($query4);
        $stm->execute();
        $query5 = "SELECT * FROM aluguel WHERE idaluguel = :idaluguel";
        $stm5 = Database::prepare($query5);
        $stm5->execute();
        $alu = $stm5->fetch(PDO::FETCH_OBJ);
        $datainicial = $alu->datalocacao;
        $diferenca = strtotime(':datadevolucao') - strtotime($datainicial);
        $dias = floor($diferenca / (60 * 60 * 24));

        $gasol = $alu->combustivelatual - ':combustiveldevolucao';
        $extra2 = ':extra';
        if($gasol>0){
            $extra2 = $extra2 + ($gasol*':prgas');
        }

        $total = (( $dias * $alu->diaria )- $alu->disconto)+ $extra2;
        $query4 = "UPDATE `aluguel` SET `total` = $total WHERE `aluguel`.`idaluguel` =  :idaluguel ";
        $stm = Database::prepare($query4);
        return $stm->execute();


    }

    
    public function findiddevolucao($idaluguel)
    {
        $idedevolucao = null;
        $query = "SELECT idedevolucao FROM $this->tabela WHERE idaluguel = :id ";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        $stm->execute();

        foreach ($stm->fetchAll() as $devolucao) {
            $idedevolucao = $devolucao->idedevolucao;
        }
        return $iddevolucao;
    }

    public function update($iddevolucao)
    {
        $combustiveldevolucao = $this->getcombustiveldevolucao();
        $this->setiddevolucao($iddevolucao);
        $query = "UPDATE $this->tabela SET idaluguel = :idaluguel,avaria = :avaria, extra = :extra, datadevolucao = :datadevolucao, combustiveldevolucao = :combustiveldevolucao WHERE iddevolucao = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $this->getiddevolucao(), PDO::PARAM_INT);
        $stm->bindParam(':idaluguel', $this->getidaluguel());        
        $stm->bindParam(':avaria', $this->getavaria());
        $stm->bindParam(':extra', $this->getextra());
        $stm->bindParam(':datadevolucao', $this->getdatadevolucao());
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
