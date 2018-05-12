<?php

include_once("../dao/PostoDAO.php");
include_once("../dao/PrecipitacaoDAO.php");

$pre = $_POST["prefixo"];
$prefixo = substr($pre, 0, -1);
$ano = $_POST["ano"];
$mes_string = $_POST["mes"];

switch($mes_string) {
    case "Janeiro":
        $mes = "01";
        break;

    case "Fevereiro":
        $mes = "02";
        break;

    case "Março":
        $mes = "03";
        break;

    case "Abril":
        $mes = "04";
        break;

    case "Maio":
        $mes = "05";
        break;

    case "Junho":
        $mes = "06";
        break;

    case "Julho":
        $mes = "07";
        break;

    case "Agosto":
        $mes = "08";
        break;

    case "Setembro":
        $mes = "09";
        break;

    case "Outubro":
        $mes = "10";
        break;

    case "Novembro":
        $mes = "11";
        break;

    case "Dezembro":
        $mes = "12";
}

writeData($prefixo, $ano, $mes);

echo '

<!DOCTYPE html>
<meta charset="utf-8">
<head>
<title>Webvitool</title>
<link rel="stylesheet" href="../view/css/estilo.css">
<link rel="stylesheet" type="text/css" href="../view/css/map.css">
    <style>
        #info {
            text-align: center;
            color: #00BCD4;
            font-family: arial, serif, Times;
            border-bottom: 1px solid #00BCD4;
            font-size: 20px;
        }
    </style>
</head>

<body>';

require_once("../view/header.php");
require_once("../view/nav.php");

echo '
    <section>
      <h1 id="info">   Media Chuva ao ano p/ Mês: '.$mes_string.' / '.$ano.' </h1>
      <div id="map_4">  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="http://d3js.org/d3.v4.min.js" charset="utf-8"></script>
        <script src="http://d3js.org/topojson.v1.min.js"></script>
        <script src="../view/js/mapDraw.js"></script>
      </div>
    </section>
';


require_once("../view/footer.php");

echo '
</body>
</html> ';

function writeData($prefixo, $ano, $mes) {
    $preDao = new PrecipitacaoDAO();
    $postoDao = new PostoDAO();
    $medias = $preDao->getMediaChuvaMesPostos($ano, $mes);
    $postos = $postoDao->getInfoPosto();
    $texto = "municipio,prefixo,bacia,latitude,longitude,media\n";
    $file = fopen("../view/data/map.csv","w+");

    echo sizeof($medias);

    for($i = 0; $i < sizeof($medias); $i++) {
        $texto .= $postos[$i]->getMunicipio().",".$postos[$i]->getPrefixo().",".
        $postos[$i]->getBacia().",".substr($postos[$i]->getLatitude(), 1).",".
        substr($postos[$i]->getLongitude(), 1).",".$medias[$i]."\n";
    }

    $list = explode("\n", $texto);

    foreach ($list as $line)
    {
        fputcsv($file, explode(',', $line));
    }

    fclose($file); 
}


?>