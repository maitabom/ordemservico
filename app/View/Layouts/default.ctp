<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>

        <title>
            Sistema de Ordem de Serviço :: <?php echo $this->fetch('title'); ?>
        </title>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?= $this->Url->relative('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?= $this->Url->relative('css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= $this->Url->relative('css/complementar.css') ?>" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?= $this->Url->relative('css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?= $this->Url->relative('plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?= $this->Url->relative('plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?= $this->Url->relative('plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?= $this->Url->relative('plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?= $this->Url->relative('plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?= $this->Url->relative('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="<?= $this->Url->relative('plugins/datatables/dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css" />

        <!-- jQuery 2.1.3 -->
        <script src="<?= $this->Url->relative('plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- jQuery UI -->
        <script src="<?= $this->Url->relative('plugins/jQueryUI/jquery-ui.js') ?>"></script>
        <link href="<?= $this->Url->relative('plugins/jQueryUI/jquery-ui.css') ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <div id="container">
            <div class="wrapper">
                <header class="main-header">

                    <?= $this->Html->link("Moreth e Lopes", array("controller" => "system", "action" => "board"), array("class" => "logo")) ?>

                    <nav class="navbar navbar-static-top" role="navigation">
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="<?= $this->Url->relative('img/avatar6.png') ?>" class="user-image" alt="User Image"/>
                                        <span class="hidden-xs"><?= $this->Session->read("UsuarioNome") ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img src="<?= $this->Url->relative('img/avatar6.png') ?>" class="img-circle" alt="User Image" />
                                            <p>
                                                <b><?= $this->Session->read("UsuarioNome") ?></b><br/>
                                                <small> <?= $this->Session->read("UsuarioCargo") ?></small>
                                            </p>
                                            <div style="width: 10px"></div>
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <?= $this->Html->link("Perfil", "/perfil/samara", array("class" => "btn btn-default btn-flat")) ?>
                                            </div>
                                            <div class="pull-right">
                                                <?= $this->Html->link("Sair", array("controller" => "system", "action" => "logoff"), array("class" => "btn btn-default btn-flat")) ?>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <?= $this->fetch('content'); ?>
                <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 1.0
                    </div>
                    <strong>Copyright &copy; 2015 Moreth e Lopes</strong> Todos os direitos reservados.
                </footer>
            </div>
        </div>

        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?= $this->Url->relative('bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="<?= $this->Url->relative('plugins/slimScroll/jquery.slimScroll.min.js') ?>" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?= $this->Url->relative('plugins/fastclick/fastclick.min.js') ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?= $this->Url->relative('js/app.min.js') ?>" type="text/javascript"></script>
        <script src="<?= $this->Url->relative('js/vanilla-masker.js') ?>" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?= $this->Url->relative('plugins/datatables/jquery.dataTables.js') ?>" type="text/javascript"></script>
        <script src="<?= $this->Url->relative('plugins/datatables/dataTables.bootstrap.js') ?>" type="text/javascript"></script>
        <!--DATEPICKER-->
        <script src="<?= $this->Url->relative('plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
        <script src="<?= $this->Url->relative('plugins/datepicker/locales/bootstrap-datepicker.pt-BR.js') ?>" type="text/javascript"></script>
    </body>
</html>
