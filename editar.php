<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<?php
require 'config.php';
$id = filter_input(INPUT_GET, 'id');
$usuario = [];
$sql = $pdo->prepare("SELECT * FROM lista where id = :id");
$sql->bindValue(':id', $id);
$sql->execute();
$usuario = $sql->fetch(PDO::FETCH_ASSOC);

?>

<body>
    <header>
        <div class="header">
            <i class="fa-2x fa-solid fa-address-book"></i>
            <h1>Alterar Informações de <?= $usuario['nome']; ?></h1>
        </div>
    </header>

    <div class="container-cadastro">
        <form action="editar_action.php" method="POST" class="form">
            <div class="input-box">
                <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
            </div>
            <div class="input-box">
                <label>
                    Nome <input type="text" name="nome" value="<?= $usuario['nome']; ?>">
                </label>
            </div>

            <div class="input-box">
                <label>
                    Unidade <input type="text" name="setor" value="<?= $usuario['setor']; ?>">
                </label>
            </div>
            <div class="input-box">
                <label>
                    Email <input type="email" name="email" value="<?= $usuario['email']; ?>">
                </label>
            </div>
            <div class="input-box">
                <label>
                    Telefone <input type="text" name="telefone" value="<?= $usuario['telefone']; ?>">
                </label>
            </div>
            <input type="submit" value="Alterar" class="btn">
        </form>
    </div>
</body>

</html>