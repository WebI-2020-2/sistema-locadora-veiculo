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

<body class="bg-secondary">
    <div class="container">
        <h1 class="display-1 text-center text-light">Cadastrar Funcionario</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./funcionario.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>

        <form class='form' action="./cadastrarfuncionario.php" method="POST">
            <div class="mb-3"><br>

                <label for="nome" class="form-label text-light">Nome completo</label>
                <input type="text" pattern="[a-zA-Z\s]+$" title="somente letras, por favor"  name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>

                    <label for="cpf" class="form-label text-light">CPF</label>
                    <input type="text" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" \ title="somente numero,Digite um CPF no formato: xxx.xxx.xxx-xx" step="any" name="cpf" class="form-control"   id="cpf"  required>
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
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          Esse cpf , ja esta cadastrado;
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
}
}
        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>