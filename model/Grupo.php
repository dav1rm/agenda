<?php

class Grupo {

    private $id;
    private $nome;
    private $idDono;
            
    function __construct($nome, $idDono, $id=0) {
        $this->id = $id;
        $this->nome = $nome;
        $this->idDono = $idDono;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getIdDono() {
        return $this->idDono;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIdDono($idDono) {
        $this->idDono = $idDono;
    }
}
