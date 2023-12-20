<?php
    require 'config.php';
    $usuario = [];
    $nome = filter_input(INPUT_POST,'nome');
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $telefone = filter_input(INPUT_POST,'telefone');
    $setor = filter_input(INPUT_POST, 'setor');

    $bairro = filter_input(INPUT_POST, 'bairro');
    $rua = filter_input(INPUT_POST, 'rua');
    $cep = filter_input(INPUT_POST, 'cep');
    
    try {
        $pdo->beginTransaction();
    
       
    
        $sql=$pdo->prepare("INSERT INTO endereco (bairro, rua, cep) values (:bairro, :rua, :cep)");
        $sql->bindValue(':bairro', $bairro);
        $sql->bindValue(':rua', $rua);
        $sql->bindValue(':cep', $cep);
        $sql->execute();
    
        $sql = $pdo->query('SELECT MAX(id) as id from endereco');
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $idEndereco=$result['id'];
    
        $sql=$pdo->prepare("INSERT INTO contatos (nome, email, telefone, setor, id_enderecofk) VALUES (:nome, :email, :telefone, :setor, :id_enderecofk)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':setor', $setor);
        $sql->bindValue(':id_enderecofk', $idEndereco);
        $sql->execute();      
    
        
    
        $sql = $pdo->query('SELECT MAX(id) from contatos');
        $idLista = $sql->fetch(PDO::FETCH_ASSOC);
    
    
    
    
       $sql=$pdo->prepare("UPDATE contatos set id_enderecofk = :id_enderecofk where id = :id");
        $sql->bindValue(':id_enderecofk', $idEndereco, PDO::PARAM_INT);
        $sql->bindValue(':id', $idEndereco);
         $sql->execute();
    
         header('Location:index.php');
        $pdo->commit();
        echo "Transação concluída com sucesso!";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Falha na transação: " . $e->getMessage();
    }
        


    
?>