<?php
include_once("../dao/PostoDAO.php");
include_once("../dao/PrecipitacaoDAO.php");

$preDao = new PrecipitacaoDAO();
$ano = $_POST['a'];
$prefixo = $_POST['pre2'];
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

    if ( $i == 12 )
        break;
}

for($i = 0; $i < sizeof($mes); $i++) {
	echo "<option value='$mes[$i]'>$mes[$i]</option>";
}

?>