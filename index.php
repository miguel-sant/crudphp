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

    <header>
        <div class="header">  
            <i class="fa-2x fa-solid fa-address-book"></i>
            <h1>Lista de Contatos</h1>
        </div>    
    </header>

    <div class="containers-index">
    <div id="nti-info">
        <h2>NTI</h2>
        <p>Necessidade de Tecnologia da Informação</p>
    </div>

    <div id="suporte-info">
        <h2>Suporte Técnico</h2>
        <p>5-2713</p>
    </div>

    <div id="cadastro-info">
    <h2>Adicionar Contato</h2>
    <a href="cadastrar.php">Acesse Aqui</a>
    </div>
</div>


    <!--Lista contendo os dados dos usuários -->
    
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
            <a href="editar.php?id=<?=$lista['id'];?>" class="fa-2x fa-solid fa-pen-to-square"></a>
            <a href="excluir.php?id=<?=$lista['id'];?>"class="fa-2x fa-solid fa-trash-can"></a>
            </td>
    
        </tr>
        <?php
                $classeLinha = ($contador % 2 == 0) ? 'even-row' : 'odd-row';
                $contador++;
            ?>
        <?php endforeach;    ?>
    </table>
    <footer class="rodape">
       <h3>Sistema de contatos</h3> 
    <p>© Desenvolvido por Miguel Santos</p>
    </footer>
    
</body>
</html>
