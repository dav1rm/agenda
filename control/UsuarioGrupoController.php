<?php

require_once "model/UsuarioGrupoDAO.php";

class UsuarioGrupoController {

//    public static function novo() {
//        require_once "view/cadastrargrupo.php";
//    }
//
//    public static function inserir() {
//        $nome = $_POST["nome"];
//        $idDono = $_POST["id"];
//        $grupo = new Grupo($nome, $idDono);
//        GrupoDAO::insert($grupo);
//        header("Location: index.php");
//    }
//
//    public static function recuperar() {
//        $g = GrupoDAO::getById($_GET["id"]);
//        require_once 'view/editarGrupo.php';
//    }
//
//    public static function editar() {
//        $id = $_GET["id"];
//        $g = GrupoDAO::getById($id);
//
//        $nome = $_POST["nome"];
//        $grupo = new Usuario($nome, $g->getIdDono(), $id);
//        GrupoDAO::update($grupo);
//    }
//
//    public static function listar() {
//        UsuarioController::limitaracesso();
//        $grupos = GrupoDAO::getAll();
//        require_once 'view/listarGrupos.php';
//    }
//
//    public static function excluirGrupo() {
//        $id = $_GET["id"];
//        GrupoDAO::delete($id);
//        header("Location: index.php");
//    }

}
