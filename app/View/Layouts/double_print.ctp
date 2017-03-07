<html>
    <head>
        <meta charset="UTF-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <title>Ordem de Serviço</title>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?= $this->Url->relative('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- jQuery 2.1.3 -->
        <script src="<?= $this->Url->relative('plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- Theme style -->
        <link href="<?= $this->Url->relative('css/AdminLTE.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= $this->Url->relative('css/print.css') ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
            *{
                font-size: small;
            }

            #cut{
                border: dimgrey dashed 1px;
                margin: 0px;
                padding: 0px;
            }

            h5{
                float: right;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <section class="invoice">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="invoice-header">
                            Moreth e Lopes
                            <small class="pull-right">Data: <?= $this->Date->format($ordem_servico["OrdemServico"]["data_criacao"], true) ?></small>
                        </h2>
                    </div><!-- /.col -->
                </div>
                <div class="row invoice-info">
                    <div class="col-sm-6 invoice-col">
                        <h4>Ordem de Produção</h4>
                    </div>
                    <div class="col-sm-6 invoice-col">
                        <h5>Produção</h5>
                    </div>
                </div>
                <?= $this->fetch('content'); ?>
            </section>
            <hr id="cut">
            <section class="invoice">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="invoice-header">
                            Moreth e Lopes
                            <small class="pull-right">Data: <?= $this->Date->format($ordem_servico["OrdemServico"]["data_criacao"], true) ?></small>
                        </h2>
                    </div><!-- /.col -->
                </div>
                <div class="row invoice-info">
                    <div class="col-sm-6 invoice-col">
                        <h4>Ordem de Produção</h4>
                    </div>
                    <div class="col-sm-6 invoice-col">
                        <h5>Impressão Digital</h5>
                    </div>
                </div>
                <?= $this->fetch('content'); ?>
            </section>
        </div>
        <script src="<?= $this->Url->relative('js/app.min.js') ?>" type="text/javascript"></script>
    </body>
</html>