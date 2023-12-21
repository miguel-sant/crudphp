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
$idFk = filter_input(INPUT_GET, 'id_fk');
$usuario = [];

$sql = $pdo->prepare("SELECT * FROM contatos where id = :id");
$sql->bindValue(':id', $id);
$sql->execute();
$tableContatos = $sql->fetch(PDO::FETCH_ASSOC);

$sql = $pdo->prepare("SELECT * FROM endereco where id = :id");
$sql->bindValue(':id', $idFk);
$sql->execute();
$tableEndereco = $sql->fetch(PDO::FETCH_ASSOC);


?>

<body>
    <!-- Início HEADER-->
    <header>
        <div class="header">
            <i class="fa-2x fa-solid fa-address-book"></i>
            <h1>Alterar Informações de <?= $tableContatos['nome']; ?></h1>
        </div>
    </header>
    <!-- Fim HEAContatos

    <!--Início BOTÃO DE VOLTAR -->
    <a href="index.php" class="fa-3x fa-solid fa-arrow-left"></a>
    <!-- FIM BOTÃO DE VOLTAR-->


    <!-- Início FORMULÁRIO -->
    <div class="container-cadastro">

        <form action="editar_action.php" method="POST" class="form">
            <div class="input-box">
                <input type="hidden" name="id_tableContatos" value="<?= $tableContatos['id']; ?>">
            </div>
            <div class="input-box">
                <label>
                    Nome <input type="text" name="nome" value="<?= $tableContatos['nome']; ?>" required>
                </label>
            </div>

            <div class="input-box">
                <label>
                    Unidade <input type="text" name="setor" value="<?= $tableContatos['setor']; ?>" required>
                </label>
            </div>
            <div class="input-box">
                <label>
                    Email <input type="email" name="email" value="<?= $tableContatos['email']; ?>" required>
                </label>
            </div>
            <div class="input-box">
                <label>
                    Telefone <input type="text" name="telefone" value="<?= $tableContatos['telefone']; ?>" required>
                </label>
            </div>

            <div class="input-box">
                <input type="hidden" name="id_tableEndereco" value="<?= $tableEndereco['id']; ?>">
            </div>

            <div class="input-box">
                <label>
                    Bairro <input type="text" name="bairro" placeholder="Bairro" value="<?= $tableEndereco['bairro'] ?>" required>
                </label>
            </div>

            <div class="input-box">
                <label>
                    Rua <input type="text" name="rua" placeholder="Rua" value="<?= $tableEndereco['rua'] ?>" required>
                </label>
            </div>

            <div class="input-box">
                <label>
                    CEP <input type="number" name="cep" placeholder="Setor" value="<?= $tableEndereco['cep'] ?>" required>
                </label>
            </div>
            <input type="submit" value="Alterar" class="btn">
        </form>
    </div>
    <!-- Fim FORMULÁRIO-->


    <!-- Início RODAPÉ-->
    <footer class="rodape">
        <h3>Sistema de contatos</h3>
    </footer>
    <!--fim RODAPÉ-->


</body>

</html>