<?php
include_once("../dao/PostoDAO.php");

	$postoDao = new PostoDAO(); 
	$preDao = new PrecipitacaoDAO();
	$prefixo = "";

	if ( isset($_POST['pref']) && !empty($_POST['pref']) )  {
		$prefixo = $_POST['pref'];
		$ano = array();
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
			echo "<option value='".$ano_ini."'>".($ano_ini + $i)."</option>";
		}
	} 
	
	if ( isset($_POST['a']) && !empty($_POST['a']) ) {
		$ano = $_POST['a']);
		$qtde = $preDao->getQtdeMes($prefixo, $ano);
		$mes = array();

		for($i = 0; $i < $qtde; $i++) {
			switch($i) {
				case 0:
                    array_push($mes, "Janeiro");
                    break;
                case 1:
                    array_push($mes, "Fevereiro");
                    break;
                case 2:
                    array_push($mes, "Março");
                    break;
                case 3:
                    array_push($mes, "Abril");
                    break;
                case 4:
                   array_push($mes, "Maio");
                    break;
                case 5:
                    array_push($mes, "Junho");
                    break;
                case 6:
                    array_push($mes, "Julho");
                    break;
                case 7:
                    array_push($mes, "Agosto");
                    break;
                case 8:
                    array_push($mes, "Setembro");
                    break;
                case 9:
                    array_push($mes, "Outubro");
                    break;
                case 10:
                    array_push($mes, "Novembro");
                    break;
                case 11:
                    array_push($mes, "Dezembro");
                    break;
            }
		}

		for($i = 0; $i < $duracao; $i++) {
			echo "<option value='".$mes[$i]."'>".$mes[$i]."</option>";
		}
	}	
?>