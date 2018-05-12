<?php

include_once("../dao/PostoDAO.php");
include_once("../dao/PrecipitacaoDAO.php");

$pre = explode("/", $_POST["prefixo"]);
$ano = $_POST["ano"];
$tipo = $_POST["mes"];
$prefixo = substr($pre[0], 0, -1);
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
	   	<h1 id="info">   Media Chuva p/ Mes: '.$prefixo.' / '.$municipio.' / '.$ano.' </h1>
	   	<div id="tipo" value="'.$tipo.'"></div>
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
	$file = fopen("../view/data/simple.csv","w");
	
	$corpo = "letter,frequency\n";

	foreach ($arrayPre as $p)
	{
		switch( $p->getMes() ) {
			case "01":
                $corpo .= "Jan,".$p->getMedia()."\n";
                break;
            case "02":
            	$corpo .= "Feb,".$p->getMedia()."\n";
                break;
            case "03":
            	$corpo .= "Mar,".$p->getMedia()."\n";
                break;
            case "04":
                $corpo .= "Apr,".$p->getMedia()."\n";
                break;
            case "05":
                $corpo .= "May,".$p->getMedia()."\n";
                break;
            case "06":
            	$corpo .= "Jun,".$p->getMedia()."\n";
                break;
            case "07":
            	$corpo .= "Jul,".$p->getMedia()."\n";
                break;
            case "08":
            	$corpo .= "Aug,".$p->getMedia()."\n";
                break;
            case "09":
           		$corpo .= "Sep,".$p->getMedia()."\n";
                break;
            case "10":
            	$corpo .= "Oct,".$p->getMedia()."\n";
                break;
            case "11":
            	$corpo .= "Nov,".$p->getMedia()."\n";
                break;
            case "12":
            	$corpo .= "Dec,".$p->getMedia()."\n";
                break;
		}
	}

	$list = explode("\n", $corpo);

	foreach ($list as $line)
  	{
  		fputcsv($file, explode(',',$line));
  	}

	fclose($file); 
}

?>