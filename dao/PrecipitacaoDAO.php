<?php
	/* Developed by: Wallyson Lima
	   Email: wallyson.n.a.lima@gmail.com
	   Github: Wallyson Lima
	   Date: 03/05/2018
	*/
include_once("/opt/lampp/htdocs/webvitool/model/Database.php");
include_once("/opt/lampp/htdocs/webvitool/model/Precipitacao.php");

class PrecipitacaoDAO {
	private $con;
	private $tableName;

	function __construct() {
		$db = new Database();
		$this->con = $db->connection();
		$this->tableName = "posto";
	}

	function getMediaChuvaMes($prefixo, $ano) {
		$sql = $this->con->prepare("SELECT ano, mes, ".
                "d1, d2, d3, d4, d5, d6, d7, d8, d9, d10,".
                " d11, d12, d13, d14, d15, d16, d17, d18, d19, d20, d21, d22, d23, d24, d25, d26, d27,".
                " d28, d29, d30, d31 FROM `precipitacao` WHERE prefixo='".$prefixo.".dat' and ano >='".$ano."' group by ano, mes");

		$sql->execute();
		$pre = array();

		while ( $row = $sql->fetch() )
		{
			$dias = array();
			$ano = $row[0];
			$mes = $row[1];

			for($i = 2; $i < 33; $i++)
				array_push($dias, (Float) $row[$i]);

			$media = 0;
			$count = 0;

			foreach($dias as &$d) {
				if ( $d != 9999 ) {
					$media += $d;
					$count++;
				}
			}	

			$media = number_format((float)$media/(++$count), 2, '.', '');


			$obj = new Precipitacao($prefixo, $ano, $mes, $media);
			array_pus($pre, $obj);
		}

		$con = null;
		return $pre;
	}

	function getMediaChuvaAno($prefixo, $ano) {
		$sql = $this->con->prepare("SELECT ano, mes, d1, d2, d3, d4, d5, d6, d7, d8, d9, d10,".
                " d11, d12, d13, d14, d15, d16, d17, d18, d19, d20, d21, d22, d23, d24, d25, d26, d27,".
                " d28, d29, d30, d31 FROM `precipitacao` WHERE prefixo='".$prefixo.".dat' and".
                " ano='".$ano."' group by mes;");

		$sql->execute();
		$pre = array();

		while ( $row = $sql->fetch() )
		{
			$dias = array();
			$ano = $row[0];
			$mes = $row[1];

			for($i = 2; $i < 33; $i++)
				array_push($dias, (Float) $row[$i]);

			$media = 0;
			$count = 0;

			foreach($dias as &$d) {
				if ( $d != 9999 ) {
					$media += $d;
					$count++;
				}
			}	

			$media = number_format((float)$media/(++$count), 2, '.', '');
			$obj = new Precipitacao($prefixo, $ano, $mes, $media);
			
			array_push($pre, $obj);
		}

		$con = null;
		return $pre;
	}

	function getMediaChuvaMesPostos($ano, $mes) {
		$sql = $this->con->prepare("SELECT ".
                "d1, d2, d3, d4, d5, d6, d7, d8, d9, d10,".
                " d11, d12, d13, d14, d15, d16, d17, d18, d19, d20, d21, d22, d23, d24, d25, d26, d27,".
                " d28, d29, d30, d31 FROM `precipitacao` WHERE prefixo IN (".
                "'D4-004.dat', 'B7-047.dat', ".
                "'C5-008.dat', 'D7-020.dat', 'E3-074.dat', 'D5-080.dat', 'B5-002.dat', 'D6-001.dat', 'D5-019.dat', ".
                "'D3-002.dat', 'E5-047.dat', 'E3-038.dat', 'C8-043.dat', 'B4-001.dat', 'E3-002.dat', 'E4-135.dat', 'E4-023.dat', 'C5-025.dat', "."'B7-008.dat', 'E3-025.dat', 'D4-064.dat', 'D6-010.dat', 'E3-264.dat', 'D4-002.dat', 'D8-003.dat', ".
                "'F4-004.dat', 'C4-034.dat', 'E3-041.dat', 'C4-019.dat', 'C3-031.dat', 'B6-014.dat', 'D2-021.dat', 'E3-003.dat', 'E2-045.dat', ".
                "'E4-056.dat', 'E2-022.dat', 'B6-032.dat') ".
                "and ano='".$ano."' and mes='".$mes."';");

		$sql->execute();
		$pre = array();

		while ( $row = $sql->fetch() )
		{
			$dias = array();

			for($i = 0; $i < 31; $i++)
				array_push($dias, (Float) $row[$i]);

			
			$media = 0;
			$count = 0;

			foreach($dias as &$d) {
				if ( $d != 9999 ) {
					$media += $d;
					$count++;
				}
			}	

			$media = number_format((float)$media/(++$count), 2, '.', '');
			array_push($pre, $media);
		}

		$con = null;
		return $pre;
	}

	function getQtdeMes($prefixo, $ano) {
		$sql = $this->con->prepare("SELECT COUNT(mes) as qtde FROM `precipitacao` WHERE prefixo='".$prefixo.".dat' and ano='".$ano."';");
		$mes = 0;
		$sql->execute();

		while ( $row = $sql->fetch() )
		{
			$mes = (int) $row[0];
			$con = null;
			return $mes;
		}

		$con = null;
		return null;
	}

}
?>