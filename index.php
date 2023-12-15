<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<body>
    
    <?php
        require 'config.php';
        $listas = [];
        $sql=$pdo->query("SELECT * FROM lista");
        $listas = $sql->fetchAll(PDO::FETCH_ASSOC);
    ?>


<a href="cadastrar.php">Cadastrar</a>
    <table class="tabela" border=1>
        <tr>
            <th class="th">Nome</th>
            <th class="th">Unidade</th>
            <th class="th">Email</th>
            <th class="th">Telefone</th>
            <th class="th">Ações</th>
        </tr>
        <?php foreach ($listas as $lista):    ?>
        <tr class="<?=$classeLinha?>">
            <td class="td"><?=$lista['nome'];?><p></td>
            <td class="td"><?=$lista['setor'];?></td>
            <td class="td"><?=$lista['email'];?></td>
            <td class="td"><?=$lista['telefone'];?></td>
            <td class="td">
            <a href="editar.php?id=<?=$lista['id']?>" class="fa-2x fa-solid fa-pen-to-square"></a>
            
            </td>
    
        </tr>
        <?php
                $classeLinha = ($contador % 2 == 0) ? 'even-row' : 'odd-row';
                $contador++;
            ?>
        <?php endforeach;    ?>
    </table>
    
    
</body>
</html>
