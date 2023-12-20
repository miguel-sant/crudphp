<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
    require 'config.php';
    $id = filter_input(INPUT_GET,'id');
    $usuario = [];
    $sql=$pdo->prepare("SELECT * FROM lista where id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);

    ?>
<body>
    
    <form action="editar_action.php" method="POST">
       
        <input type="hidden" name="id" value="<?=$usuario['id'];?>">
    
        <label> 
            Nome: <input type="text" name="nome" value="<?=$usuario['nome'];?>">
        </label>


        <label>
            Unidade: <input type="text" name="setor" value="<?=$usuario['setor'];?>">
        </label>

        <label>
            Email: <input type="email" name="email" value="<?=$usuario['email'];?>">


        <label>
            Telefone: <input type="text" name="telefone" value="<?=$usuario['telefone'];?>">
        </label>
        <input type="submit" value="alterar">
    </form>
</body>
</html>