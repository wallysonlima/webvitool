<?php

echo '
	<!DOCTYPE html>
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
   		</div>
	</section>
';


require_once("footer.php");

echo '
	</body>
	</html>
';
?>