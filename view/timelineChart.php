<?php

echo '
	<!DOCTYPE html>
	<script src = "http://d3js.org/d3.v3.js"></script>
	<script src = "http://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.15-beta/nv.d3.js"></script>
	<link rel = "stylesheet" href = "http://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.15-beta/nv.d3.css">

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
		<form method="post" action="../control/timelineChart.php">
	      <div>
	        <label>Prefixo1</label>
	        <select name="prefixo1">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
	      </div>
	      
	      <div>
	        <label>Prefixo2</label>
	        <select name="prefixo2">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
	      </div>

	      <div>
	        <label>Prefixo3</label>
	        <select name="prefixo3">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
	      </div>

	      <div>
	        <label>Ano1</label>
	        <select name="ano1">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
	      </div>

	      <div>
	        <label>Ano2</label>
	        <select name="ano2">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
	      </div>

	      <div>
	        <label>Ano3</label>
	        <select name="ano3">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
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