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
		<div id="apresentacao">
			<img class="logo2" src="../view/imagens/ic_mobivitool-web.png" alt="Webvitool Logo">	
			<p><b>
				Webvitool (Web Visualization Tool) is a tool for creating<br>
				various data visualizations with PHP, HTML/CSS, Javascript,<br>
				Ajax, JQuery and Mysql. The webvitool is the web version<br>
				of mobivitool.</b>
			</p>
   		</div>
	</section>
';


require_once("footer.php");

echo '
	</body>
	</html>
';
?>