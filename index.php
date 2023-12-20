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
        $sql=$pdo->query("SELECT contatos.nome, contatos.email, contatos.setor, contatos.telefone, endereco.bairro, endereco.rua, endereco.cep from contatos join endereco
        on contatos.id_enderecofk = endereco.id;");
        $listas = $sql->fetchAll(PDO::FETCH_ASSOC);
        $contador = null;
    ?>


<a href="cadastrar.php">Cadastrar</a>
    <table class="tabela" border=1>
        <tr>
            <th class="th">Nome</th>
            <th class="th">Unidade</th>
            <th class="th">Email</th>
            <th class="th">Telefone</th>
            <th class="th">Bairro</th>
            <th class="th">Rua</th>
            <th class="th">CEP</th>
            
            <th class="th">Ações</th>
        </tr>
        <?php foreach ($listas as $lista):    ?>
        <tr class="<?=$classeLinha?>">
            <td class="td"><?=$lista['nome'];?><p></td>
            <td class="td"><?=$lista['setor'];?></td>
            <td class="td"><?=$lista['email'];?></td>
            <td class="td"><?=$lista['telefone'];?></td>
            <td class="td"><?=$lista['bairro'];?></td>
            <td class="td"><?=$lista['rua'];?></td>
            <td class="td"><?=$lista['cep'];?></td>
            <td class="td">
            <a href="editar.php?id=<?=$lista['id']?>" class="fa-2x fa-solid fa-pen-to-square"></a>
            <a href="excluir.php?id=<?=$lista['id']?>">[ Excluir ]</a></a>
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
