<?php

include_once("../control/PostoDAO.php");

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
	       <table>
		      <div>
		        <tr>
		        <td><label>Prefixo</label></td>
		        <td>
		          <select name="prefixo">
		            <option value="january">January</option>
		            <option value="february">February</option>
		            <option value="may">May</option>
		          </select>  
		        </td>
		        </tr>
		      </div>
		      
		      <div>
		        <tr>
		        <td><label>Ano</label></td>
		        <td><select name="ano">
		          <option value="january">January</option>
		          <option value="february">February</option>
		          <option value="may">May</option>
		        </select>
		        </td>
		        </tr>
		      </div>

		      <div>
		        <tr>
		        <td><label>Mes</label>
		        <input type="radio" id="mes" name="mes" value="mes">
		        </td>
		        <td><label>Media</label>
		        <input type="radio" id="media" name="mes" value="media">
		        </td>
		      </tr>
		      </div>

		      <div>
		        <tr><td>
		        <input type="submit" name="submit" value="Selecionar">  
		      </td></tr>
		      </div>
		  	</table>
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