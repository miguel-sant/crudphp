<?php
    require 'config.php';

    $nome = filter_input(INPUT_POST,'nome');
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST,'telefone');

    $sql=$pdo->prepare("INSERT INTO lista (nome, email, telefone) VALUES (:nome, :email, :telefone)");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':telefone', $telefone);
    $sql->execute();
    header('Location:index.php');
    
?>