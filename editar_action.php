<?php
    require 'config.php';
    
    $nome = filter_input(INPUT_POST,'nome');
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST,'telefone');
    $setor = filter_input(INPUT_POST,'setor');
    $id = filter_input(INPUT_POST, 'id');

    $sql=$pdo->prepare("UPDATE lista set nome = :nome, email = :email, telefone = :telefone, setor = :setor WHERE id = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':setor', $setor);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':id', $id);
    $sql->execute();
    header('Location:index.php');

    var_dump($id);
?>