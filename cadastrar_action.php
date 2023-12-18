<?php
require 'config.php';

$usuario = [];
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');
$setor = filter_input(INPUT_POST, 'setor');

    $sql = $pdo->prepare("INSERT INTO lista (nome, email, telefone,setor) VALUES (:nome, :email, :telefone, :setor)");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':setor', $setor);
    $sql->execute();
    
    header('Location:index.php');


