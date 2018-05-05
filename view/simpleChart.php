<?php

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

	  h1 {
	      text-align: center;
	      color: #00BCD4;
	      font-family: arial, serif, Times;
	      border-bottom: 1px solid #00BCD4;
	      font-size: 10px;
	  }
	</style>
	<head>
		<title>Webvitool</title>
		<link rel="stylesheet" href="css/estilo.css">
		<style type="text/css">
	      #container { position: relative; }
	      #imageView { border: 1px solid #000; }
	      #imageTemp { position: absolute; top: 1px; left: 1px; }
	    </style>
	</head>
	<body>	
';

require_once("header.php");
require_once("nav.php");

echo '
	<section>
	  <div id="container">  
	    <form method="post" action="../control/simpleChart.php">
	      <div>
	        <label>Prefixo</label>
	        <select name="prefixo">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
	      </div>
	      
	      <div>
	        <label>Ano</label>
	        <select name="ano">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
	      </div>

	      <div>
	        <label>Mes</label>
	        <input type="radio" id="mes" name="mes" value="mes">

	        <label>Media</label>
	        <input type="radio" id="media" name="media" value="media">
	      </div>

	      <div>
	        <input type="submit" name="submit" value="Selecionar">  
	      </div>
	    </form>
	  </div>
	</section>
';


require_once("footer.php");

echo '
	<script>
    var prefixo = window.AndroidSimple.getPrefixo();
    var municipio = window.AndroidSimple.getMunicipio();
    var ano = window.AndroidSimple.getAno();
    var tipo = window.AndroidSimple.getTipo();
    document.write("<h1>  Média Chuva p/ Mês: " + prefixo + "/" + municipio + "/" + ano + "</h1>");
    document.write("<div id='tipo' value='" + tipo + "'></div>");
	</script>
	
	<script type="text/javascript" src="http://d3js.org/d3.v3.min.js"></script>
	<script type="text/javascript" src="http://labratrevenge.com/d3-tip/javascripts/d3.tip.v0.6.3.js"></script>
	<script type="text/javascript" src="js/simpleDraw.js"></script>
</body>
</html>
';
?>