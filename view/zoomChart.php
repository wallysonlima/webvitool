<?php

include_once("../dao/PostoDAO.php");

 function addPrefixoMunicipioSpinner() {
	$postoDao = new PostoDAO(); 
	$premuni = array();
	$premuni = $postoDao->getPrefixoAndMunicipio();

	for($i = 0; $i < sizeof($premuni); $i++) {
		echo "<option value='$premuni[$i]'>$premuni[$i]</option><br>";
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
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	</head>
	<body>	
';

require_once("header.php");
require_once("nav.php");

echo '
	<section>
	  <div id="container">  
		<form method="post" action="../control/zoomChart.php">
	      <table>
	      <div>
	      <tr>
	        <td><label>Prefixo</label></td>
	        <td><select name="prefixo" id="prefixo">';
	        	addPrefixoMunicipioSpinner();
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
						        url:"ajax/ajaxSimple.php",
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
	        <td><label>Quantidade</label></td>
	        <td><select name="qtde">';
	        	for($i = 0; $i < 10; $i++) {
					echo "<option value='$i'>".($i+1)."</option>";
				}

				echo '
	        </select>
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