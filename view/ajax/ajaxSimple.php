<?php
	include_once("../../dao/PostoDAO.php");
	$postoDao = new PostoDAO(); 
	$ano = array();

	$prefixo = explode("/", $_POST['pref']);
	$prefixo = $prefixo[0];

	$ano = $postoDao->getAno($prefixo);

	$tam1 = strlen($ano[0]);
	$tam2 = strlen($ano[1]);

	if ( $tam1 == 5 )
		$ano[0] = substr($ano[0], 1);
	if ( $tam2 == 5 ) 
		$ano[1] = substr($ano[1], 1);

	$duracao = (int)$ano[1] - (int)$ano[0];
	$ano_ini = (int) $ano[0];

	for($i = 0; $i < $duracao; $i++) {
		echo "<option value='".($ano_ini + $i)."'>".($ano_ini + $i)."</option>";
	}
?>