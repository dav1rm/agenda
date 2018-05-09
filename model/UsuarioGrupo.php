<?php

class UsuarioGrupo {

    private $idusuario;
    private $idgrupo;

    function __construct($idusuario, $idgrupo) {
        $this->idusuario = $idusuario;
        $this->idgrupo = $idgrupo;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function getIdgrupo() {
        return $this->idgrupo;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setIdgrupo($idgrupo) {
        $this->idgrupo = $idgrupo;
    }

}
