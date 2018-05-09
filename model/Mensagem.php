<?php

class Mensagem {

    private $idusuario;
    private $iddestino;
    private $texto;
    private $data;
    private $grupo;
    
    function __construct($idusuario, $iddestino, $texto, $data, $grupo) {
        $this->idusuario = $idusuario;
        $this->iddestino = $iddestino;
        $this->texto = $texto;
        $this->data = $data;
        $this->grupo = $grupo;
    }
    
    function getIdusuario() {
        return $this->idusuario;
    }

    function getIddestino() {
        return $this->iddestino;
    }

    function getTexto() {
        return $this->texto;
    }

    function getData() {
        return $this->data;
    }

    function getGrupo() {
        return $this->grupo;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setIddestino($iddestino) {
        $this->iddestino = $iddestino;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

}
