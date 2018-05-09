<?php

require_once("Conexao.php");
require_once("UsuarioGrupo.php");

class UsuarioGrupoDAO {

    public static function insert(UsuarioGrupo $ug) {
        $con = Conexao::connect();
        $idusuario = $ug->getIdusuario();
        $idgrupo = $ug->getIdgrupo();

        $comando = "INSERT usuario_grupo (idusuario, idgrupo)";
        $comando .= "VALUES ('$idusuario','$idgrupo')";

        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        }
        Conexao::close();
    }

    public static function update(UsuarioGrupo $ug) {
        $con = Conexao::connect();

        $idusuario = $ug->getIdusuario();
        $idgrupo = $ug->getIdgrupo();

        $comando = " UPDATE usuario_grupo ";
        $comando .= " SET idusuario = '$idusuario'";
        $comando .= " WHERE idgrupo = $idgrupo ";

        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        }

        Conexao::close();
    }

    public static function deletebyidgrupo($id) {
        $con = Conexao::connect();

        $comando = " DELETE FROM usuario_grupo ";
        $comando .= " WHERE idgrupo = $id ";

        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        }

        Conexao::close();
    }

    public static function deletebyidusuario($id) {
        $con = Conexao::connect();

        $comando = " DELETE FROM usuario_grupo ";
        $comando .= " WHERE idusuario = $id ";

        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        }

        Conexao::close();
    }

    public static function getAll() {
        $con = Conexao::connect();

        $comando = " SELECT * FROM usuario_grupo ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsUsuarioGrupo = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umUsuarioGrupo = new UsuarioGrupo($reg["idusuario"], $reg["idgrupo"]);
                array_push($todosOsUsuarioGrupo, $umUsuarioGrupo);
            }
            Conexao::close();
            return $todosOsUsuarioGrupo;
        }
        Conexao::close();
        return null;
    }

    public static function getByIdUser($id) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM usuario_grupo ";
        $comando .= " WHERE idusuario = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsUsuariosGrupos = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umUsuarioGrupo = new UsuarioGrupo($reg["idusuario"], $reg["idgrupo"]);
                array_push($todosOsUsuariosGrupos, $umUsuarioGrupo);
            }
            return $todosOsUsuariosGrupos;
        }
        return null;
    }

    public static function getUsuariosById($id) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM usuario_grupo ";
        $comando .= " WHERE idgrupo = $id";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsUsuariosGrupos = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umUsuarioGrupo = new UsuarioGrupo($reg["idusuario"], $reg["idgrupo"]);
                array_push($todosOsUsuariosGrupos, $umUsuarioGrupo);
            }
            return $todosOsUsuariosGrupos;
        }
        return null;
    }

}

?>