<?php

echo '
	<!DOCTYPE html>
	<meta charset="utf-8">
	<html>
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
	</body>
	</html>
';
?>