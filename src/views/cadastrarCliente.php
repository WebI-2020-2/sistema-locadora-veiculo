<?php
    require '../controller/ClientesController.php';
    $cliente = new ClientesController();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cliente</title>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
    <link rel="stylesheet" href="../../public/styles/main.css">

</head>

<body class="bg-secondary">
    <div class="container">
        <h1 class="display-1 text-center text-light" >Cadastrar Cliente</h1>
       <nav class="nav nav-pills nav-justified ">
        <a href="./clientes.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>
        <form class='form' action="./cadastrarCliente.php" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label text-light">Nome completo</label>
                <input type="text" pattern="[a-zA-Z\s]+$" title="somente letras, por favor" name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="email" class="form-labe text-light">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="endereco" class="form-label text-light">Endereco</label>
                <input type="text"   name="endereco" class="form-control" id="endereco" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="telefone" class="form-label text-light">Telefone</label>
                <input type="tel"  name="telefone"  \ pattern="^(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})$" title="(00) 00000-0000" class="form-control" id="telefone" autocomplete="off" data-mask="(00) 00000-0000" maxlength="15"  required>

            </div>            
            <div class="button"><br>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>

    <?php
    $nome =filter_input(INPUT_POST,'nome');
    $email=filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $telefone=filter_input(INPUT_POST,'telefone');
    $endereco=filter_input(INPUT_POST,'endereco');

if($nome && $email && $telefone && $endereco){

      $sql = Database::prepare("SELECT * FROM cliente  WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

if($sql->rowCount() === 0){

$sql= Database::prepare("INSERT INTO cliente (nome,email,telefone,endereco) VALUES (:nome, :email, :telefone, :endereco)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':endereco', $endereco);
        $sql->bindValue(':telefone', $telefone);
        $sql->execute();

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          Cliente cadastrado com Sucesso!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

}else{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          Esse email , ja esta cadastrado;
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
}
}

        ?>
    </div>
</body>
<!-- Atente-se para a ordem: primeiro jquery, depois locastyle, depois o JS do Bootstrap. -->
<script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

</html>