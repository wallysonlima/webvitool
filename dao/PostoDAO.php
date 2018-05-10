<?php
	/* Developed by: Wallyson Lima
	   Email: wallyson.n.a.lima@gmail.com
	   Github: Wallyson Lima
	   Date: 03/05/2018
	*/
include_once("/opt/lampp/htdocs/webvitool/model/Database.php");
include_once("/opt/lampp/htdocs/webvitool/model/Posto.php");

class PostoDAO {
	private $con;
	private $tableName;

	function __construct() {
		$db = new Database();
		$this->con = $db->connection();
		$this->tableName = "posto";
	}

	function getPrefixo() {
		$sql = $this->con->prepare("SELECT DISTINCT prefixo FROM `posto`;");

		$sql->execute();
		$pre = array();

		while ( $row = $sql->fetch() )
		{
			array_push($pre, (String) $row);
		}

		$con = null;

		return $pre;
	}

	function getPrefixoAndMunicipio() {
		$sql = $this->con->prepare("SELECT DISTINCT prefixo, municipio FROM `posto`;");
		$sql->execute();
		$pre = array();

		while ( $row = $sql->fetch() )
		{
			$texto = $row[0]." / ".$row[1]; 
			array_push($pre, (String) $texto);
		}

		$con = null;
		return $pre;
	}

	function getPrefixoMunicipio($municipio) {
		$sql = $this->con->prepare("SELECT DISTINCT prefixo FROM `posto` where municipio=?;");
		$sql->bindValue(1, $municipio);
		$sql->execute();

		while ( $row = $sql->fetch() )
		{ 
			$texto = (String) $row;
			$con = null;

			return $texto;
		}

		return null;
	}

	function getMunicipioPrefixo($prefixo) {
		$sql = $this->con->prepare("SELECT DISTINCT municipio FROM `posto` where prefixo=?;");
		$sql->bindValue(1, $prefixo);
		$sql->execute();

		while ( $row = $sql->fetch() )
		{ 
			$texto = (String) $row;
			$con = null;

			return $texto;
		}

		return null;
	}

	function getMunicipio() {
		$sql = $this->con->prepare("SELECT DISTINCT municipio FROM `posto` ORDER BY municipio;");
		$sql->execute();
		$pre = array();

		while ( $row = $sql->fetch() )
		{
			array_push($pre, (String) $row);
		}

		$con = null;

		return $pre;
	}

	function getAno($prefixo) {
		$sql = $this->con->prepare("SELECT ano_ini, ano_fim FROM `posto` where prefixo=?;");
		$sql->bindValue(1, $prefixo);
		$sql->execute();
		$ano = array();

		while ( $row = $sql->fetch() )
		{
			array_push($ano, (String) $row[0]);
			array_push($ano, (String) $row[1]);
		}

		$con = null;

		return $ano;
	}

	function getNome($prefixo1, $prefixo2, $prefixo3) {
        $sql = $this->con->prepare("SELECT nome FROM `posto` where prefixo IN(?, ?, ?);");
		$sql->bindValue(1, $prefixo1);
		$sql->bindValue(2, $prefixo2);
		$sql->bindValue(3, $prefixo3);
		$sql->execute();
		
		$nome = array();

		while ( $row = $sql->fetch() )
		{
			array_push($nome, $row);
		}

		$con = null;

		return $nome;
	}

	function getInfoPosto() {
		$sql = $this->con->prepare("SELECT prefixo, municipio, bacia, latitude, longitude FROM `posto` WHERE prefixo IN (".
                "'D4-004', 'B7-047', ".
                "'C5-008', 'D7-020', 'E3-074', 'D5-080', 'B5-002', 'D6-001', 'D5-019', ".
                "'D3-002', 'E5-047', 'E3-038', 'C8-043', 'B4-001', 'E3-002', 'E4-135', 'E4-023', 'C5-025', ".
                "'B7-008', 'E3-025.dat', 'D4-064', 'D6-010', 'E3-264', 'D4-002', 'D8-003', ".
                "'F4-004', 'C4-034.dat', 'E3-041', 'C4-019', 'C3-031', 'B6-014', 'D2-021', 'E3-003', 'E2-045', ".
                "'E4-056', 'E2-022', 'B6-032') GROUP BY prefixo;");

		$sql->bindValue(1, $prefixo);
		$sql->execute();

		$postos = array();

		while ( $row = $sql->fetch() )
		{
			$posto = new Posto();
			$posto->postoConstructor2($row[0], $row[1], $row[2], $row[3], $row[4]);
			array_push($postos, $posto);
		}

		$con = null;

		return $postos;
	}
}

?>