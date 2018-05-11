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
		<form method="post" action="../control/timelineChart.php">
	      <table>
	      <div>
	        <tr>
	        <td><label>Prefixo1</label></td>
	        <td>
	        	<select name="prefixo1" id="prefixo1">';
		          	addPrefixoMunicipioSpinner();
		         	echo '
		        </select>  
	        </td>
	        </tr>
	      </div>
	      
	      <div>
            <tr>
	        <td><label>Prefixo2</label></td>
	        <td>
	        	<select name="prefixo2" id="prefixo2">';
		          	addPrefixoMunicipioSpinner();
		         	echo '
		        </select> 
	        </td>
	        </tr>
	      </div>

	      <div>
	        <tr>
	        <td><label>Prefixo3</label></td>
	        <td>
		        <select name="prefixo3" id="prefixo3">';
		          	addPrefixoMunicipioSpinner();
		         	echo '
		        </select> 
	        </td>
	        </tr>
	      </div>

	      <div>
	      	<tr>
	        <td><label>Ano1</label></td>
	        <td><select name="ano1" id="ano1">
	        	<script>
		        		$("#prefixo1").on("change",function(){
					    
					    var prefixo1 = $("#prefixo1").val();
					    
					    $.ajax({
					        url:"ajax/ajaxSimple.php",
					        data:{pref:prefixo1},
					        type: "post",
					        success : function(resp){
					            $("#ano1").html(resp);               
					        },
					        error : function(resp){}
					    });
					});
		        </script>
	        </select>
	        </td>
	        </tr>
	      </div>

	      <div>
	        <tr>
	        <td><label>Ano2</label></td>
	        <td><select name="ano2" id="ano2">
	          <script>
		        		$("#prefixo2").on("change",function(){
					    
					    var prefixo2 = $("#prefixo2").val();
					    
					    $.ajax({
					        url:"ajax/ajaxSimple.php",
					        data:{pref:prefixo2},
					        type: "post",
					        success : function(resp){
					            $("#ano2").html(resp);               
					        },
					        error : function(resp){}
					    });
					});
		      </script>
	        </select>
	         </td>
	        </tr>
	      </div>

	      <div>
	        <tr>
	        <td><label>Ano3</label></td>
	        <td><select name="ano3" id="ano3">
	          <script>
		        		$("#prefixo3").on("change",function(){
					    
					    var prefixo3 = $("#prefixo3").val();
					    
					    $.ajax({
					        url:"ajax/ajaxSimple.php",
					        data:{pref:prefixo3},
					        type: "post",
					        success : function(resp){
					            $("#ano3").html(resp);               
					        },
					        error : function(resp){}
					    });
					});
		        </script>
	        </select>
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