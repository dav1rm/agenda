<div class="container">
    <?php
    if (isset($_GET["classe"]) && isset($_GET["acao"])) {
        $classe = $_GET["classe"] . 'Controller';
        $classe::$_GET["acao"]();
    } else {
        require_once 'view/inicio.php';
    }
    ?>
</div>