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
    $sql = $pdo->query("SELECT contatos.id, contatos.id_enderecofk, contatos.nome, contatos.email, contatos.setor, contatos.telefone, endereco.bairro, endereco.rua, endereco.cep from contatos join endereco
        on contatos.id_enderecofk = endereco.id;");
    $listas = $sql->fetchAll(PDO::FETCH_ASSOC);
    $contador = null;
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
    <div class="container-back"><img src="img/background.png" class="background" alt=""></div>
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
        <?php foreach ($listas as $lista) :    ?>
            <?php
            $classeLinha = ($contador % 2 == 0) ? 'even-row' : 'odd-row';
            $contador++;
            ?>
            <tr class="<?= $classeLinha ?>">
                <td class="td"><?= $lista['nome']; ?><p>
                </td>
                <td class="td"><?= $lista['setor']; ?></td>
                <td class="td"><?= $lista['email']; ?></td>
                <td class="td"><?= $lista['telefone']; ?></td>
                <td class="td"><?= $lista['bairro']; ?></td>
                <td class="td"><?= $lista['rua']; ?></td>
                <td class="td"><?= $lista['cep']; ?></td>
                <td class="td">
                    <a href="editar.php?id=<?= $lista['id']; ?>&id_fk=<?= $lista['id_enderecofk']; ?>" class="fa-2x fa-solid fa-pen-to-square"></a>
                    <a class="fa-2x fa-solid fa-trash" href="excluir.php?id=<?= $lista['id']; ?>"></a></a>
                </td>
            </tr>

        <?php endforeach;    ?>
    </table>

    <footer class="rodape">
        <h3>Sistema de contatos</h3>
        <p>© Desenvolvido por Miguel Santos</p>
    </footer>


</body>

</html>