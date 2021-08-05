<?php
require '../controller/funcionarioController.php';
$funcionario = new funcionarioController();
?>

<<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar funcionario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body>
    <div class="container">
        <h1 class="p-1 title">Cadastrar Funcionario</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a><br>

        </div>
        <form class='form' action="./cadastrarfuncionario.php" method="POST">
            <div class="mb-3"><br>

                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero" minlength="10" name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>

                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" \ title="Digite um CPF no formato: xxx.xxx.xxx-xx"  step="any" name="cpf" max = '11' class="form-control"   id="cpf"  required>
                </div>
            </div>
            <div class="button"><br>

                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
     <?php
    $nome =filter_input(INPUT_POST,'nome');
    $cpf=filter_input(INPUT_POST,'cpf');

if($nome && $cpf ){

      $sql = Database::prepare("SELECT * FROM funcionario  WHERE cpf = :cpf");
        $sql->bindValue(':cpf', $cpf);
        $sql->execute();

if($sql->rowCount() === 0){

$sql= Database::prepare("INSERT INTO funcionario (nome,cpf) VALUES (:nome, :cpf)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':cpf', $cpf);
        $sql->execute();

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          funcionario cadastrado com Sucesso!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

}else{
    echo "Esse cpf , ja esta cadastrado;";
}
}
        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>