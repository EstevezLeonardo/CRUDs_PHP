<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="stilo1.css">
</head>
<body>
    <main>
        <h1>Resultado da Conversão</h1>
        <p>
            <?php 
                // Obtendo a cotação do dólar, euro e libra

                // Definindo o intervalo de datas para a cotação
                $iniciodol = date("d/m/Y", strtotime("-7 days"));  
                $fimdol = date("d/m/Y");
                // URL para obter a cotação do dólar
                $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''. $iniciodol.'\'&@dataFinalCotacao=\''. $fimdol . '\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';
                // Fazendo a requisição e decodificando o JSON retornado
                $dadosdol = json_decode(file_get_contents($url), true);   
                $cotacaodol = $dadosdol["value"][0]["cotacaoCompra"];
                
                $inicioeur = date("d/m/Y", strtotime("-7 days"));  
                $fimeur = date("d/m/Y");
                // URL para obter a cotação do euro
                $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaPeriodo(moeda=@moeda,dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@moeda=\'EUR\'&@dataInicial=\''.$inicioeur.'\'&@dataFinalCotacao=\''. $fimeur . '\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';
                $dadoseur = json_decode(file_get_contents($url), true);
                $cotacaoeur = $dadoseur["value"][0]["cotacaoCompra"];
                
                $iniciolibra = date("d/m/Y", strtotime("-7 days"));  
                $fimlibra = date("d/m/Y");
                // URL para obter a cotação da libra
                $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaPeriodo(moeda=@moeda,dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@moeda=\'GBP\'&@dataInicial=\''. $iniciolibra.'\'&@dataFinalCotacao=\''. $fimlibra . '\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';
                $dadoslibra = json_decode(file_get_contents($url), true);
                $cotacaolibra = $dadoslibra["value"][0]["cotacaoCompra"];
                
                // Obtendo o valor informado pelo usuário e a moeda escolhida
                $real = empty($_GET["valor"]) ? 0 : $_GET["valor"];
                $moeda = $_GET["moeda"];
                $dolar = $cotacaodol;
                $euro = $cotacaoeur;             
                $libra = $cotacaolibra;
                $valfinal = $real / $$moeda;
                $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
                echo "O valor informado foi <strong>" . numfmt_format_currency($padrao, $real, "BRL") . "</strong>.<br>";

                // Exibindo o resultado da conversão com base na moeda escolhida
                switch ($moeda) {
                case "dolar":
                    echo  "O valor convertido na moeda escolhida é <strong> " . numfmt_format_currency($padrao, $valfinal, "USD") . "</strong>.";
                    break;
                case "euro":
                    echo "O valor convertido na moeda ecolhida é <strong> " . numfmt_format_currency($padrao, $valfinal, "EUR") . "</strong>.";
                    break;
                case "libra":
                    echo "O valor convertido na moeda ecolhida é <strong> " . numfmt_format_currency($padrao, $valfinal, "GBP") . "</strong>.";
                    break;}
                ?>
        </p>
        <button onclick="javascript:window.location.href='index.html'">&#x2B05Voltar</button>
    </main>
</body>
</html>