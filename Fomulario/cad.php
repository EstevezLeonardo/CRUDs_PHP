<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="stilo1.css">
</head>
<body>
    <header>
        <h1>Resultado do Processamento</h1>
    </header>
    <main>
        <?php
          $nome = empty($_GET["nome"]) ? "sem nome" : $_GET["nome"];
          $sobrenome = empty($_GET["sobrenome"]) ? "sem sobrenome" : $_GET["sobrenome"];
          echo "<p>Nome: <strong>$nome</strong></p>";
          echo "<p>Sobrenome: <strong>$sobrenome</strong></p>";
        ?>
        <p>
                <a href="javascript:history.go(-1)">Voltar</a>
        </p>
    </main>        
</body>
</html>