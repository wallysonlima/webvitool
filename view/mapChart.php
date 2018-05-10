<?php

include_once("../dao/PostoDAO.php");

 function addPrefixoSpinner() {
	$postoDao = new PostoDAO(); 
	$pre = array();
	$pre = $postoDao->getPrefixo();

	for($i = 0; $i < sizeof($pre); $i++) {
		echo "<option value='$pre[$i]'>$pre[$i]</option><br>";
	}
}


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
	    <form method="post" action="../control/mapChart.php">
	    <table>
	      <div>
	      	<tr>
	        <td><label>Prefixo</label></td>
	        <td><select name="prefixo" id="prefixo">';
	        	addPrefixoSpinner();
	        	echo '
	        </select></td>
	        </tr>
	      </div>
	      
	      <div>
	      	<tr>
	        <td><label>Ano</label></td>
	        <td><select name="ano" id="ano">
	        	<script>
		        		$("#prefixo").on("change",function(){
					    
					    var prefixo = $("#prefixo").val();
					    
					    $.ajax({
					        url:"ajaxMap.php",
					        data:{pref:prefixo},
					        type: "post",
					        success : function(resp){
					            $("#ano").html(resp);               
					        },
					        error : function(resp){}
					    });
					});
		        </script>
	        </select></td>
	        </tr>
	      </div>

	      <div>
	        <tr>
	        <td><label>Mes</label></td>
	        <td><select name="mes">
	          <script>
		        		$("#ano").on("change",function(){
					    
					    var ano = $("#ano").val();
					    
					    $.ajax({
					        url:"ajaxMap.php",
					        data:{a:ano},
					        type: "post",
					        success : function(resp){
					            $("#ano").html(resp);               
					        },
					        error : function(resp){}
					    });
					});
		        </script>
	        </select></td>
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