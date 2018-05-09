<?php

class Conexao {

    private static $mycon;

    public static function connect($host = "localhost", $user = "root", $pass = "jaesd96", $database = "agenda") {

        $con = mysqli_connect($host, $user, $pass);
        if (!$con) {
            die("Erro de conexão: " . mysqli_error($con));
        } else {
            self::$mycon = $con;
            //echo "Conexão estabelecida com sucesso!";
        }

        $db = mysqli_select_db(self::$mycon, $database);
        if (!$db) {
            die("<br/>Erro de selecionar base de dados: " . mysqli_error($con));
        } else {
            //echo "<br/>Banco selecionado com sucesso!";
        }

        return self::$mycon;
    }

    public static function close() {
        mysqli_close(self::$mycon);
    }

    public static function lastId() {
        return mysqli_insert_id(self::$mycon);
    }

}

?>
