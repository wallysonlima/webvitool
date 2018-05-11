<?php

include_once("../dao/PostoDAO.php");
include_once("../dao/PrecipitacaoDAO.php");

$pre = explode("/", $_POST["prefixo"]);
$ano = $_POST["ano"];
$opcao = $_POST["mes"];
$prefixo = $pre[0];
$municipio = $pre[1];

writeData($prefixo, $ano);

echo '
	<!DOCTYPE html>
	<meta charset="utf-8">
	<html>

	<style>

	body {
	  font: 10px sans-serif;
	}

	.axis path,
	.axis line {
	  fill: none;
	  stroke: #000;
	  shape-rendering: crispEdges;
	}

	.bar {
	  fill: orange;
	}

	.bar:hover {
	  fill: orangered ;
	}

	.x.axis path {
	  display: none;
	}

	.d3-tip {
	  line-height: 1;
	  font-weight: bold;
	  padding: 12px;
	  background: rgba(0, 0, 0, 0.8);
	  color: #fff;
	  border-radius: 2px;
	}

	/* Creates a small triangle extender for the tooltip */
	.d3-tip:after {
	  box-sizing: border-box;
	  display: inline;
	  font-size: 10px;
	  width: 100%;
	  line-height: 1;
	  color: rgba(0, 0, 0, 0.8);
	  content: "\25BC";
	  position: absolute;
	  text-align: center;
	}

	/* Style northward tooltips differently */
	.d3-tip.n:after {
	  margin: -1px 0 0 0;
	  top: 100%;
	  left: 0;
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
		<link rel="stylesheet" href="../view/css/estilo.css">
		<style type="text/css">
	      #container { position: relative; }
	      #imageView { border: 1px solid #000; }
	      #imageTemp { position: absolute; top: 1px; left: 1px; }
	    </style>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	</head>
	<body>	
';

require_once("../view/header.php");
require_once("../view/nav.php");

echo '
	<section>
	  <div id="container">  
	   	<h1 id="info">   Media Chuva p/ Mes: $prefixo / $municipio / $ano </h1>
	   	<div id="tipo" value="$tipo"></div>
 	  </div>
	</section>
';


require_once("../view/footer.php");

echo '
	<script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script>
	<script type="text/javascript" src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
	<script type="text/javascript" src="../view/js/simpleDraw.js"></script>
	</body>
	</html>
';

function writeData($prefixo, $ano) {
	$preDao = new PrecipitacaoDAO();
	$arrayPre = $preDao->getMediaChuvaAno($prefixo, $ano);
	$file = fopen("../view/data/simple.csv","w+");
	
	$texto = array();
	array_push($texto, "letter");
	array_push($texto, "frequency");
	fputcsv($file, $texto);

	foreach ($arrayPre as $p)
	{
		switch( $p->getMes() ) {
			case "01":
				$texto = array();
                array_push($texto, "Jan");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
            case "02":
            	$texto = array();
                array_push($texto, "Feb");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
            case "03":
                $texto = array();
                array_push($texto, "Mar");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
            case "04":
                $texto = array();
                array_push($texto, "Apr");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
            case "05":
                $texto = array();
                array_push($texto, "May");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
            case "06":
             	$texto = array();
                array_push($texto, "Jun");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
            case "07":
            	$texto = array();
                array_push($texto, "Jul");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
            case "08":
            	$texto = array();
                array_push($texto, "Aug");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
            case "09":
           		$texto = array();
                array_push($texto, "Sep");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
            case "10":
            	$texto = array();
                array_push($texto, "Oct");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
            case "11":
            	$texto = array();
                array_push($texto, "Nov");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
            case "12":
            	$texto = array();
                array_push($texto, "Dec");
                array_push($texto, $p->getMedia());
                fputcsv($file, $texto);
                break;
		}
	}

	fclose($file); 
}

?>