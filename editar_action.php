<?php
    require 'config.php';
    
    $nome = filter_input(INPUT_POST,'nome');
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST,'telefone');
    $setor = filter_input(INPUT_POST,'setor');

    $bairro = filter_input(INPUT_POST,'bairro');
    $rua = filter_input(INPUT_POST,'rua');
    $cep = filter_input(INPUT_POST,'cep');

    $id = filter_input(INPUT_POST, 'id_tableContatos');
    $idfk = filter_input(INPUT_POST,'id_tableEndereco');



    $sql=$pdo->prepare("UPDATE contatos set nome = :nome, email = :email, telefone = :telefone, setor = :setor WHERE id = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':setor', $setor);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':id', $id);
    $sql->execute();
    
    
    $sql=$pdo->prepare("UPDATE endereco set bairro = :bairro, rua = :rua, cep = :cep WHERE id = :id");
    $sql->bindValue(':bairro', $bairro);
    $sql->bindValue(':rua', $rua);
    $sql->bindValue(':cep', $cep);
    $sql->bindValue(':id', $idfk);
    $sql->execute();

    header('Location:index.php');






    
?>