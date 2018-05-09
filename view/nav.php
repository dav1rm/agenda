<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Agenda</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-gears fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="index.php?classe=Usuario&acao=recuperar&id=<?= $_SESSION['usuario']->getIdusuario(); ?>"><i class="fa fa-edit fa-fw"></i>Editar Conta</a>
                </li>
                <li><a href="index.php?classe=Usuario&acao=excluir&id=<?= $_SESSION['usuario']->getIdusuario(); ?>"><i class="fa fa-trash fa-fw"></i>Excluir Conta</a>
                </li>
                <li class="divider"></li>
                <li><a href="index.php?classe=Usuario&acao=sair"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

</nav>
