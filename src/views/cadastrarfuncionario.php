<?php
require '../controller/funcionarioController.php';
$funcionario = new funcionarioController();
?>

<<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar funcionario</title>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
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
                    <input type="text" title="somente numero,Digite um CPF no formato: xxx.xxx.xxx-xx" step="any" data-mask="000.000.000-00" maxlength="14" name="cpf" class="form-control"   id="cpf"  required>
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

echo  ('funcionario cadastrado com Sucesso!');
                         

}else{
     echo  (' Esse cpf , ja esta cadastrado');
}
}
        ?>
    </div>
</body>
<!-- Atente-se para a ordem: primeiro jquery, depois locastyle, depois o JS do Bootstrap. -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

</html>