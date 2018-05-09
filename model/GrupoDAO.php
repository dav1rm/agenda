<?php

require_once("Conexao.php");
require_once("Grupo.php");

class GrupoDAO {

    public static function insert(Grupo $grupo) {
        $con = Conexao::connect();
        $nome = $grupo->getNome();
        $idDono = $grupo->getIdDono();

        $comando = "INSERT into grupo (nome, iddono)";
        $comando .= "VALUES ('$nome','$idDono')";

        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        }
    }

    public static function update(Grupo $grupo) {
        $con = Conexao::connect();

        $id = $grupo->getId();
        $nome = $grupo->getNome();

        $comando = " UPDATE grupo ";
        $comando .= " SET nome = '$nome'";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        }
    }

    public static function delete($id) {
        $con = Conexao::connect();

        $comando = " DELETE FROM grupo ";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        }
    }

    public static function getAll() {
        $con = Conexao::connect();

        $comando = " SELECT * FROM grupo ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsGrupos = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umGrupo = new Grupo($reg["nome"], $reg["iddono"], $reg["id"]);
                array_push($todosOsGrupos, $umGrupo);
            }
            return $todosOsGrupos;
        }
        return null;
    }

    public static function getById($id) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM grupo ";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            $grupo = new Grupo($reg["nome"], $reg["iddono"], $reg["id"]);
            return $grupo;
        }

        return null;
    }

        public static function deletebyiddono($id) {
        $con = Conexao::connect();

        $comando = " DELETE FROM grupo ";
        $comando .= " WHERE iddono = $id ";

        $resultado = mysqli_query($con, $comando);
        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        }
    }

    

}

?>