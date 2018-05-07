<?php
	include_once("../control/PostoDAO.php");
	$postoDao = new PostoDAO(); 
	$ano = array();

	$ano = postoDao->getAno($_POST['pref']);

	$tam1 = strlen($ano[0]);
	$tam2 = strlen($ano[1]);

	if ( $tam1 == 5 )
		$ano[0] = substr($ano[0], 1);
	if ( $tam2 == 5 ) 
		$ano[1] = substr($ano[1], 1);

	$duracao = $ano[1] - $ano[0];

	for($i = 0; $i < $duracao; $i++) {
		echo "<option value='$ano[0]'>".$ano[0] + $i."</option>";
	}
?>