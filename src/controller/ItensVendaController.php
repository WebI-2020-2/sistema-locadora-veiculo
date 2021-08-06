    <?php

require_once '../model/ItensVenda.php';
require_once '../model/Database.php';

class ItensVendaController extends itemaluguel
{
    protected $tabela = 'itemaluguel';

    public function __construct()
    {
    }

    // inserir um itemaluguel
    public function insert($idaluguel, $idveiculo)
    {
        $query = "INSERT INTO $this->tabela (idaluguel, idveiculo) VALUES (:idaluguel, :idveiculo)";
        $stm = Database::prepare($query);
        $stm->bindParam(':idaluguel', $idaluguel);
        $stm->bindParam(':idveiculo', $idveiculo);
        $stm->execute();
        $query2 = "UPDATE veiculo SET status = 'indisponivel' WHERE idveiculo = :idveiculo";
        $stm = Database::prepare($query2);
        $stm->bindParam(':idveiculo', $idveiculo);
        return $stm->execute();
    }


    //busca todos os itemaluguel de um aluguel
    public function findAllidaluguel($idaluguel)
    {
        $query = "SELECT * FROM $this->tabela WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        $stm->execute();
        $itemaluguel = array();

        foreach ($stm->fetchAll() as $itemaluguels) {
            array_push(
                $itemaluguel,
                new itemaluguel($itemaluguels->iditemaluguel, $idaluguel, $itemaluguels->idveiculo)
            );
        }
        return $itemaluguel;
    }

    //deleta todos os itemaluguels pelo idaluguel
    public function delete($idaluguel)
    {
        $query = "DELETE FROM $this->tabela WHERE idaluguel = :id";
        $stm = Database::prepare($query);
        $stm->bindParam(':id', $idaluguel, PDO::PARAM_INT);
        return $stm->execute();
    }

}