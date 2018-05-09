<?php

require_once "model/UsuarioDAO.php";

class UsuarioController {

    public static function acessarsistema() {
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);

        $usuario = UsuarioDAO::autenticar($email, $senha);

        if ($usuario != null) {
            $_SESSION["usuario"] = $usuario;
            header("Location: index.php");
        } else {
            header("Location: index.php");
        }
        return false;
    }

    public static function novo() {
        require_once "view/cadastrarusuario.php";
    }

    public static function inserir() {
        $nome = $_POST["nome"];
        $datanasc = $_POST["datanasc"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $usuario = new Usuario($nome, $datanasc, $email, $senha, '0');
        UsuarioDAO::insert($usuario);
        header("Location: index.php");
    }

    public static function recuperar() {
        $usuario = UsuarioDAO::getById($_GET["id"]);
        require_once 'view/editarusuario.php';
    }

    public static function buscarDestinatario() {
        $destinatario = UsuarioDAO::getById($_GET["id"]);
        return $destinatario;
    }

    public static function editar() {
        $id = $_GET["id"];
        $u = UsuarioDAO::getById($id);
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $datanasc = $_POST["datanasc"];
        if (isset($_POST["senha"])) {
            $senha = md5($_POST["senha"]);
        } else {
            $senha = "";
        }
        $usuario = new Usuario($nome, $datanasc, $email, $senha, $u->getAdmin(), $id);
        UsuarioDAO::update($usuario);

        UsuarioController::recuperar();
    }

    public static function listar() {
        //UsuarioController::limitaracesso();
        $usuarios = UsuarioDAO::getAll();
        return $usuarios;
    }

    public static function listartodos() {
        UsuarioController::limitaracesso();
        $usuarios = UsuarioDAO::getAll();
        require_once 'view/listarusuarios.php';
    }

    public static function excluir() {
        $id = $_GET["id"];
        UsuarioGrupoDAO::deletebyidusuario($id);
        UsuarioDAO::delete($id);
        unset($_SESSION["usuario"]);
        header("Location: index.php");
    }

    public static function excluirusuario() {
        $id = $_GET["id"];
        GrupoDAO::deletebyiddono($id);
        UsuarioDAO::delete($id);
        UsuarioGrupoDAO::deletebyidusuario($id);
        MensagemDAO::deletebyidusuario($id);
        self::listartodos();
    }

    public static function sair() {
        unset($_SESSION["usuario"]);
        header("Location: index.php");
    }

    public static function limitaracesso() {
        if ($_SESSION["usuario"]->getAdmin() == 0) {
            header("Location: index.php");
        }
    }

}
