<?php

require_once "model/GrupoDAO.php";

class GrupoController {

    public static function novo() {
        require_once "view/cadastrargrupo.php";
    }

    public static function adicionarmembro() {
        $idgrupo = $_GET["id"];

        if (isset($_POST["membros"])) {
            foreach ($_POST["membros"] as $m) {
                $ug1 = new UsuarioGrupo($m, $idgrupo);
                UsuarioGrupoDAO::insert($ug1);
            }
        } 
        MensagemController::abrirConversaGrupo();
    }

    public static function inserir() {
        $nome = $_POST["nome"];
        $usuarios = $_POST['usuarios'];
        $idDono = $_GET["id"];
        $grupo = new Grupo($nome, $idDono);
        GrupoDAO::insert($grupo);
        $idGrupo = Conexao::lastId();
        $ug = new UsuarioGrupo($idDono, $idGrupo);
        UsuarioGrupoDAO::insert($ug);
        if (isset($usuarios)) {
            foreach ($usuarios as $u) {
                $ug = new UsuarioGrupo($u, $idGrupo);
                UsuarioGrupoDAO::insert($ug);
            }
        }
        header("Location: index.php");
    }

    public static function recuperar() {
        $g = GrupoDAO::getById($_GET["id"]);
        return $g;
    }

    public static function editar() {
        $id = $_GET["id"];
        $g = GrupoDAO::getById($id);

        $nome = $_POST["nome"];
        $grupo = new Grupo($nome, $g->getIdDono(), $id);
        GrupoDAO::update($grupo);
        MensagemController::abrirConversaGrupo();

    }

    public static function listardestinatario() {
        //UsuarioController::limitaracesso();
        $usuariosgrupos = UsuarioGrupoDAO::getUsuariosById($_GET['id']);
        //$grupo = GrupoDAO::getById($_GET['id']);
        //$dono = UsuarioDAO::getById($grupo->getIdDono());
        $destinatario = array();
        if (isset($usuariosgrupos)) {
            foreach ($usuariosgrupos as $ug) {
                $user = UsuarioDAO::getById($ug->getIdusuario());
                array_push($destinatario, $user);
            }
        }
        return $destinatario;
    }

    public static function listarmembros() {
        //UsuarioController::limitaracesso();
        $usuariosgrupos = UsuarioGrupoDAO::getUsuariosById($_GET['id']);
        $membros = array();

        if (isset($usuariosgrupos)) {
            foreach ($usuariosgrupos as $ug) {
                $user = UsuarioDAO::getById($ug->getIdusuario());
                array_push($membros, $user);
            }
            return $membros;
        }
    }

    public static function listarmembrosporIdade() {
        //UsuarioController::limitaracesso();
        $membros = UsuarioDAO::getUserOldByIdgroup($_GET['id']);
        if (isset($membros)) {
            return $membros;
        } else {
            return null;
        }
    }

    public static function listargrupos() {
        //UsuarioController::limitaracesso();
        $usuariosgrupos = UsuarioGrupoDAO::getByIdUser($_SESSION['usuario']->getIdusuario());

        $grupos = array();
        if (isset($usuariosgrupos)) {
            foreach ($usuariosgrupos as $ug) {
                $grupo = GrupoDAO::getById($ug->getIdgrupo());
                array_push($grupos, $grupo);
            }
            return $grupos;
        }
        require_once 'view/inicio.php';
    }

    public static function excluir() {
        $idgrupo = $_GET['id'];
        MensagemDAO::deletebyIdgrupo($idgrupo);
        UsuarioGrupoDAO::deletebyidgrupo($idgrupo);
        GrupoDAO::delete($idgrupo);
        header("Location: index.php");
    }

    public static function removermembros() {
        $membros = $_POST["membros"];

        if (isset($membros)) {
            foreach ($membros as $m) {
                UsuarioGrupoDAO::deletebyidusuario($m);
            }
        }
        MensagemController::abrirConversaGrupo();
    }

}
