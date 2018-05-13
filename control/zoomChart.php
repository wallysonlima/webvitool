<?php

include_once("../dao/PostoDAO.php");
include_once("../dao/PrecipitacaoDAO.php");

$pre = explode("/", $_POST["prefixo"]);
$prefixo = substr($pre[0], 0, -1);
$municipio = $pre[1];
$ano = $_POST["ano"];
$qtde = $_POST["qtde"];

writeData($prefixo, $municipio, $ano, $qtde);

echo '

<!DOCTYPE html>
<meta charset="utf-8">
<html>
<style>

.area {
  fill: steelblue;
  clip-path: url(#clip);
}

.zoom {
  cursor: move;
  fill: none;
  pointer-events: all;
}

#info {
    text-align: center;
    color: #00BCD4;
    font-family: arial, serif, Times;
    border-bottom: 1px solid #00BCD4;
    font-size: 20px;
}

</style>
<head>
	<title>Webvitool</title>
	<link rel="stylesheet" href="../view/css/zoom.css">
  	<script type="text/javascript" src="http://d3js.org/d3.v4.min.js"></script>
</head>
<body>';

require_once("../view/header.php");
require_once("../view/nav.php");

echo '
<p>
</p>';

$width = 960;
$height = 500;

echo '
    <section>
      <h1 id="info">Média Chuva p/ Mês: '.$prefixo.' / '.$municipio.' / '.$ano.'</h1>
      <svg width='.$width.' height='.$height.'></svg>
    </section>';

require_once("../view/footer.php");

echo '
    <script type="text/javascript" src="../view/js/zoomDraw.js"></script>
	</body>
	</html>';

function writeData($prefixo, $municipio, $ano, $qtde) {
	$preDao = new PrecipitacaoDAO();
	$arrayPre = $preDao->getMediaChuvaMes($prefixo, $ano);
	$file = fopen("../view/data/zoom.csv","w");
	
	$corpo = "date,price\n";
	$limite = (int) $qtde * 12;
	$i = 0;

	foreach ($arrayPre as $p)
	{
		switch( $p->getMes() ) {
			case "01":
                $corpo .= "Jan ".$p->getAno().",".$p->getMedia()."\n";
                break;
            case "02":
            	$corpo .= "Feb ".$p->getAno().",".$p->getMedia()."\n";
                break;
            case "03":
            	$corpo .= "Mar ".$p->getAno().",".$p->getMedia()."\n";
                break;
            case "04":
                $corpo .= "Apr ".$p->getAno().",".$p->getMedia()."\n";
                break;
            case "05":
                $corpo .= "May ".$p->getAno().",".$p->getMedia()."\n";
                break;
            case "06":
            	$corpo .= "Jun ".$p->getAno().",".$p->getMedia()."\n";
                break;
            case "07":
            	$corpo .= "Jul ".$p->getAno().",".$p->getMedia()."\n";
                break;
            case "08":
            	$corpo .= "Aug ".$p->getAno().",".$p->getMedia()."\n";
                break;
            case "09":
           		$corpo .= "Sep ".$p->getAno().",".$p->getMedia()."\n";
                break;
            case "10":
            	$corpo .= "Oct ".$p->getAno().",".$p->getMedia()."\n";
                break;
            case "11":
            	$corpo .= "Nov ".$p->getAno().",".$p->getMedia()."\n";
                break;
            case "12":
            	$corpo .= "Dec ".$p->getAno().",".$p->getMedia()."\n";
		}

		$i++;
		if ( $i == $limite ) break;
	}

	fwrite($file, $corpo);

	fclose($file); 
}


?>