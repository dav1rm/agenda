<?php

require_once("Conexao.php");
require_once("Mensagem.php");

class MensagemDAO {

    public static function insert(Mensagem $mensagem) {
        $con = Conexao::connect();
        $idusuario = $mensagem->getIdusuario();
        $iddestino = $mensagem->getIddestino();
        $texto = $mensagem->getTexto();
        $grupo = $mensagem->getGrupo();

        $comando = "INSERT into mensagem (idusuario, iddestino, texto, grupo)";
        $comando .= "VALUES ('$idusuario','$iddestino','$texto', '$grupo')";

        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        } else {
            echo "<script>Mensagem enviada!</script>";
        }
        Conexao::close();
    }

    public static function getAll() {
        $con = Conexao::connect();

        $comando = " SELECT * FROM mensagem ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todasAsMensagens = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umaMensagem = new Mensagem($reg["idusuario"], $reg["iddestino"], $reg["texto"], $reg["data"], $reg["grupo"]);
                array_push($todasAsMensagens, $umaMensagem);
            }
            Conexao::close();
            return $todasAsMensagens;
        }
        Conexao::close();
        return null;
    }

    public static function getById($id, $iduser) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM mensagem ";
        $comando .= " WHERE (iddestino = $id AND idusuario = $iduser) OR (iddestino = $iduser AND idusuario = $id)";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todasAsMensagens = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umaMensagem = new Mensagem($reg["idusuario"], $reg["iddestino"], $reg["texto"], $reg["data"], $reg["grupo"]);
                array_push($todasAsMensagens, $umaMensagem);
            }
            Conexao::close();
            return $todasAsMensagens;
        }

        Conexao::close();
        return null;
    }

    public static function getByIdgrupo($idgrupo) {

        $con = Conexao::connect();

        $comando = "SELECT * FROM mensagem ";
        $comando .= "WHERE grupo = $idgrupo ";
        $comando .= "ORDER BY data ASC";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todasAsMensagens = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umaMensagem = new Mensagem($reg["idusuario"], $reg["iddestino"], $reg["texto"], $reg["data"], $reg["grupo"]);
                array_push($todasAsMensagens, $umaMensagem);
            }
            Conexao::close();
            return $todasAsMensagens;
        }

        Conexao::close();
        return null;
    }

    public static function delete($id, $iduser) {

        $con = Conexao::connect();

        $comando = " DELETE FROM mensagem ";
        $comando .= " WHERE (iddestino = $id AND idusuario = $iduser) OR (iddestino = $iduser AND idusuario = $id)";
        //echo $comando;
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        }

        Conexao::close();
        return null;
    }
    public static function deletebyIdgrupo($idgrupo) {

        $con = Conexao::connect();

        $comando = " DELETE FROM mensagem ";
        $comando .= " WHERE grupo = $idgrupo";
        //echo $comando;
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        }

        Conexao::close();
        return null;
    }
        public static function deletebyIdUsuario($id) {

        $con = Conexao::connect();

        $comando = " DELETE FROM mensagem ";
        $comando .= " WHERE idusuario = $id";
        //echo $comando;
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        }

        Conexao::close();
        return null;
    }
}
