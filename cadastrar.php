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
    <header>
        <div class="header">  
            <i class="fa-2x fa-solid fa-address-book"></i>
            <h1>Cadastrar Novo Contato</h1>
        </div>    
    </header>

<div class="container-cadastro">
<form action="cadastrar_action.php" method="POST" class="form">

<div class="input-box">
<label>
    Nome <input type="text" name="nome" placeholder="Username" required>
</label>
</div>

<div class="input-box">
<label>
    Email <input type="email" name="email" placeholder="Email" required>
</label>
</div>

<div class="input-box">
<label>
    Telefone <input type="text" name="telefone" placeholder="Nome" required>
</label>
</div>

<div class="input-box">
<label>
    Setor <input type="text" name="setor" placeholder="Setor" required>
</label>
</div>

<input type="submit" value="Cadastrar" class="btn">
</form>

</body>

</div>