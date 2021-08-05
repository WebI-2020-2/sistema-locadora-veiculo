<?php
    require '../controller/ClientesController.php';
    $cliente = new ClientesController();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body>
    <div class="container">
        <h1 class="p-1 title">Cadastrar Cliente</h1>
        <div class="menu p-2">
            <a href="../../index.php" class="btn btn-sm btn-primary">Voltar</a>
            
        </div>
        <form class='form' action="./cadastrarCliente.php" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome completo</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero" minlength="10"  name="nome" class="form-control" id="nome" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="endereco" class="form-label">Endereco</label>
                <input type="text" pattern="[a-z\s]+$" / \ title="sem numero" minlength="10" name="endereco" class="form-control" id="endereco" autocomplete="off" required>
            </div>
            <div class="mb-3"><br>
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" name="telefone"  \ pattern="^(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})$"  \ title="Digite um telefone valido " 
                 class="form-control" id="telefone" autocomplete="off" required>
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
    echo "Esse email , ja esta cadastrado;";
}
}

        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>