<?php

class Usuario {
    private $idusuario;
    private $nome;
    private $email;
    private $senha;
    private $admin;
    private $datanasc;
    
    function __construct($nome, $datanasc, $email, $senha, $admin,$idusuario=0) {
        $this->idusuario = $idusuario;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->admin = $admin;
        $this->datanasc = $datanasc;
    }
    
    function getIdusuario() {
        return $this->idusuario;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getAdmin() {
        return $this->admin;
    }

    function getDatanasc() {
        return $this->datanasc;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }

    function setDatanasc($datanasc) {
        $this->datanasc = $datanasc;
    }

}
