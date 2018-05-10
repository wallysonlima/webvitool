<?php
class Precipitacao {
	private $prefixo, $ano, $mes, $media;

	function __constructor($prefixo, $ano, $mes, $media) {
		$this->prefixo = $prefixo;
		$this->ano = $ano;
		$this->mes = $mes;
		$this->media = $media;
	}

	function getPrefixo() {
		return $this->prefixo;
	}

	function setPrefixo($prefixo) {
		$this->prefixo = $prefixo;
	}

	function getAno() {
		return $this->ano;
	}

	function setAno($ano) {
		$this->ano = $ano;
	}

	function getMes() {
		return $this->mes;
	}

	function setMes($mes) {
		$this->mes = $mes;
	}

	function getMedia() {
		return $this->media;
	}

	function setMedia($media) {
		$this->media = $media;
	}
}

?>