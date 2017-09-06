<!DOCTYPE html>
<html>

    <head>
        <title>Mini Sistema de Contato</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <?php include('includes/style.php') ?>
    </head>

    <body>
        <!-- WRAPPER -->
        <div id="wrapper">
            <!-- NAVBAR -->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="brand">
                    <a><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
                </div>
                <div class="container-fluid">
                    <div class="navbar-btn">
                        <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                    </div>

                </div>
            </nav>
            <!-- END NAVBAR -->
            <!-- LEFT SIDEBAR -->
            <div id="sidebar-nav" class="sidebar">
                <div class="sidebar-scroll">
                    <nav>
                        <ul class="nav">
                            <li><a href="index.php" class="menu active"><i class="fa fa-home"></i> <span>Home</span></a></li>
                            <li>
                                <a href="#subPages" id="pages" data-toggle="collapse" class="menu collapsed"><i class="fa fa-users"></i> <span>Contato</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="subPages" class="collapse ">
                                    <ul class="nav">
                                        <li><a data-menu="novo" href="javascript:;" class="opcao">Novo</a></li>
                                        <li><a data-menu="lista" href="javascript:;" class="opcao">Listar</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- END LEFT SIDEBAR -->
            <!-- MAIN -->
            <div class="main">
                <!-- MAIN CONTENT -->
                <div class="main-content">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-md-12">

                                <?php include('view/lista.php') ?>

                                <?php include('view/novo.php') ?>

                            </div>
                        </div>


                    </div>
                </div>
                <!-- END MAIN CONTENT -->
            </div>
            <!-- END MAIN -->
            <div class="clearfix"></div>

            <?php include('includes/modal.php') ?>


        </div>
        <!-- END WRAPPER -->

        <?php include('includes/script.php') ?>

    </body>

</html>
