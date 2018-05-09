<?php

require_once("Conexao.php");
require_once("Usuario.php");

class UsuarioDAO {

    public static function autenticar($email, $senha) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM usuario ";
        $comando .= " WHERE email = '$email' and senha = '$senha'";
        //echo $comando;
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            if ($reg != null) {
                $umUsuario = new Usuario($reg["nome"], $reg["datanasc"], $reg["email"], $reg["senha"], $reg["admin"], $reg["id"]);
                Conexao::close();
                return $umUsuario;
            }
        }

        Conexao::close();
        return null;
    }

    public static function insert(Usuario $usuario) {
        $con = Conexao::connect();
        $nome = $usuario->getNome();
        $datanasc = $usuario->getDatanasc();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        $comando = "INSERT usuario (nome, email, senha, datanasc, admin)";
        $comando .= "VALUES ('$nome','$email','$senha', '$datanasc', '0')";
        //echo $comando;
        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        } else {
            echo "<script>Usuario cadastrado!</script>";
        }
        Conexao::close();
    }

    public static function update(Usuario $usuario) {
        $con = Conexao::connect();

        $idusuario = $usuario->getIdusuario();
        $nome = $usuario->getNome();
        $datanasc = $usuario->getDatanasc();
        $senha = $usuario->getSenha();
        $email = $usuario->getEmail();

        if ($senha == "") {
            $comando = " UPDATE usuario ";
            $comando .= " SET nome = '$nome', datanasc = '$datanasc', email = '$email'";
            $comando .= " WHERE id = $idusuario ";
        } else {
            $comando = " UPDATE usuario ";
            $comando .= " SET nome = '$nome', datanasc = '$datanasc', email = '$email', senha = '$senha' ";
            $comando .= " WHERE id = $idusuario ";
        }

        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        }

        Conexao::close();
    }

    public static function delete($idusuario) {
        $con = Conexao::connect();

        $comando = " DELETE FROM usuario ";
        $comando .= " WHERE id = $idusuario";

        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        }

        Conexao::close();
    }

    public static function getAll() {
        $con = Conexao::connect();
        $id = $_SESSION['usuario']->getIdusuario();
        $comando = "SELECT * FROM usuario WHERE id <> '$id'";
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsUsuarios = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umUsuario = new Usuario($reg["nome"], $reg["datanasc"], $reg["email"], $reg["senha"], $reg["admin"], $reg["id"]);
                array_push($todosOsUsuarios, $umUsuario);
            }
            Conexao::close();
            return $todosOsUsuarios;
        }
        Conexao::close();
        return null;
    }

    public static function getById($idusuario) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM usuario ";
        $comando .= " WHERE id = $idusuario";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            $umUsuario = new Usuario($reg["nome"], $reg["datanasc"], $reg["email"], $reg["senha"], $reg["admin"], $reg["id"]);
            return $umUsuario;
        }

        Conexao::close();
        return null;
    }

    public static function getUserOldByIdgroup($id) {

        $con = Conexao::connect();

        $comando = "SELECT * FROM usuario WHERE id = SOME (";
        $comando .= "SELECT idusuario FROM usuario_grupo WHERE idgrupo = $id ";
        $comando .= ") ORDER BY datanasc ASC";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsMembros = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umUsuario = new Usuario($reg["nome"], $reg["datanasc"], $reg["email"], $reg["senha"], $reg["admin"], $reg["id"]);
                array_push($todosOsMembros, $umUsuario);
            }
            return $todosOsMembros;
        }

        return null;
    }

}

?>