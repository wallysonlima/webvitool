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
		<form method="post" action="../control/timelineChart.php">
	      <table>
	      <div>
	        <tr>
	        <td><label>Prefixo1</label></td>
	        <td><select name="prefixo1">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
	        </td>
	        </tr>
	      </div>
	      
	      <div>
            <tr>
	        <td><label>Prefixo2</label></td>
	        <td><select name="prefixo2">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select></td>
	        </tr>
	      </div>

	      <div>
	        <tr>
	        <td><label>Prefixo3</label></td>
	        <td><select name="prefixo3">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select></td>
	        </tr>
	      </div>

	      <div>
	      	<tr>
	        <td><label>Ano1</label></td>
	        <td><select name="ano1">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
	        </td>
	        </tr>
	      </div>

	      <div>
	        <tr>
	        <td><label>Ano2</label></td>
	        <td><select name="ano2">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
	         </td>
	        </tr>
	      </div>

	      <div>
	        <tr>
	        <td><label>Ano3</label></td>
	        <td><select name="ano3">
	          <option value="january">January</option>
	          <option value="february">February</option>
	          <option value="may">May</option>
	        </select>
	        </td>
	        </tr>
	      </div>

	      <div>
	      <tr><td>
	        <input type="submit" name="submit" value="Selecionar">  
	      </td></tr>
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