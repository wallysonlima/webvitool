<?php

class Posto {
	private $prefixo, $nome, $municipio, $bacia, $altitude, $latitude, $longitude, $ano_ini, $ano_fim, $intervalo;

	function __construct(){}

	function postoConstructor1($prefixo, $nome, $municipio, $bacia, $altitude, $latitude, $longitude, $ano_ini, $ano_fim, $intervalo) {
		$this->$prefixo = $prefixo;
		$this->$nome = $nome;
		$this->$municipio = $municipio;
		$this->$bacia = $bacia;
		$this->$altitude = $altitude;
		$this->$latitude = $latitude;
		$this->$longitude = $longitude;
		$this->$ano_ini = $ano_ini;
		$this->$ano_fim = $ano_fim;
		$this->$intervalo = $intervalo;
	}

	function postoConstructor2($prefixo, $municipio, $bacia, $latitude, $longitude) {
		$this->$prefixo = $prefixo;
		$this->$municipio = $municipio;
		$this->$bacia = $bacia;
		$this->$latitude = $latitude;
		$this->$longitude = $longitude;
	}

	function getPrefixo() {
		return $this->$prefixo;
	}

	function setPrefixo($prefixo) {
		$this->$prefixo = $prefixo;
	}


	function getNome() {
		return $this->$nome;
	}

	function setNome($nome) {
		$this->$nome = $nome;
	}


	function getMunicipio() {
		return $this->$municipio;
	}

	function setMunicipio($municipio) {
		$this->$municipio = $municipio;
	}


	function getBacia() {
		return $this->$bacia;
	}

	function setBacia($bacia) {
		$this->$bacia = $bacia;
	}


	function getAltitude() {
		return $this->$altitude;
	}

	function setAltitude($altitude) {
		$this->$altitude = $altitude;
	}


	function getLatitude() {
		return $this->$latitude;
	}

	function setLatitude($latitude) {
		$this->$latitude = $latitude;
	}


	function getLongitude() {
		return $this->$longitude;
	}

	function setLongitude($longitude) {
		$this->$longitude = $longitude;
	}


	function getAno_ini() {
		return $this->$ano_ini;
	}

	function setAno_ini($ano_ini) {
		$this->$ano_ini = $ano_ini;
	}

	function getAno_fim() {
		return $this->$ano_fim;
	}

	function setAno_fim($ano_fim) {
		$this->$ano_fim = $ano_fim;
	}

	function getIntervalo() {
		return $this->$intervalo;
	}

	function setIntervalo($intervalo) {
		$this->$intervalo = $intervalo;
	}
} 


?>