<?php
   
   require 'config.php';
   $id = filter_input(INPUT_POST, 'id_tableContatos');
   $idfk = filter_input(INPUT_POST,'id_tableEndereco');

    $sql=$pdo->prepare("DELETE FROM contatos where id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    $sql=$pdo->prepare("DELETE FROM endereco where id = :id");
    $sql->bindValue(':id', $idfk);
    $sql->execute();
    header('Location:index.php');
?>