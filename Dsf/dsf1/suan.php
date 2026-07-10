<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Sorteados</title>
    <link rel="stylesheet" href="stilo1.css">
</head>
<body>
    <main>
        <h1>Resultado do Cálculo</h1>
        <p>
            <?php 
                $n = empty($_GET["num"]) ? 0 : $_GET["num"];
                $a = $n - 1;
                $s = $n + 1;
                echo "O número informado foi <strong>$n</strong>.<br>";
                echo "O antecessor é <strong>$a</strong> e o sucessor é <strong>$s</strong>.";
                ?>
        </p>
        <button onclick="javascript:window.location.href='index.html'">&#x2B05Voltar</button>
    </main>
</body>
</html>