<?php

require_once "model/MensagemDAO.php";

class MensagemController {

    public static function escrever() {
        require_once "view/conversa.php";
    }

    public static function enviar() {
        $texto = $_POST['texto'];
        $idUsuario = $_SESSION['usuario']->getIdusuario();
        $idDestino = $_GET['id'];
        $mensagem = new Mensagem($idUsuario, $idDestino, $texto, '', '');
        MensagemDAO::insert($mensagem);
        self::abrirConversa();
    }

    public static function enviarparagrupo() {
        $idgrupo = $_GET['id'];
        $texto = $_POST['texto'];
        $idUsuario = $_SESSION['usuario']->getIdusuario();
        //$membros = UsuarioGrupoDAO::getUsuariosById($idgrupo);
        //foreach ($membros as $m){
            $mensagem = new Mensagem($idUsuario, $idgrupo, $texto, '', $idgrupo);
            MensagemDAO::insert($mensagem);
        //}
        self::abrirConversaGrupo();
    }

    public static function buscarConversaGrupo() {
        //UsuarioController::limitaracesso();
        $idgrupo = $_GET['id'];
        $mensagens = MensagemDAO::getByIdgrupo($idgrupo);
        //$membros = UsuarioGrupoDAO::getUsuariosById($idgrupo);
        return $mensagens;
    }
    public static function abrirConversaGrupo() {
        require_once 'view/grupo.php';
    }

    public static function buscarConversa() {
        //UsuarioController::limitaracesso();
        $mensagens = MensagemDAO::getById($_GET["id"], $_SESSION['usuario']->getIdusuario());
        return $mensagens;
    }

    public static function abrirConversa() {
        require_once 'view/conversa.php';
    }

    public static function excluir() {
        MensagemDAO::delete($_GET["id"], $_SESSION['usuario']->getIdusuario());
        header("Location: index.php");
    }

}
