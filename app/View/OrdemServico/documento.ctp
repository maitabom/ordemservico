<?= $this->Session->flash() ?>
<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Ordem de Serviço <small>#<?= $this->Format->zeroPad($id) ?></small></h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-files-o"></i>Ordem de Serviço</a></li>
            <li class="active"><a href="#"><i class="fa fa-eye"></i>Visualizar Ordem de Serviço</a></li>
        </ol>
    </section>
    <section class="invoice">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-globe"></i> Moreth e Lopes
                    <small class="pull-right">Data: <?= $this->Date->format($ordem_servico["OrdemServico"]["data_criacao"], true) ?></small>
                </h2>
            </div><!-- /.col -->
            <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                    <big>Cliente</big>
                    <address>
                        <strong><?= $cliente["Cliente"]["razao_social"] ?></strong><br>
                        <?= $cliente["Cliente"]["endereco"] ?> - <?= $cliente["Cliente"]["bairro"] ?><br>
                        <?= $cliente["Cliente"]["cidade"] ?> - <?= $cliente["Cliente"]["uf"] ?><br>
                        Telefone: <?= $this->Format->phone($cliente["Cliente"]["telefone"]) ?><br/>
                        Email: <?= $cliente["Cliente"]["email"] ?>
                    </address>
                </div>
                <div class="col-sm-6 invoice-col">
                    <big><b>Ordem de Produção #<?= $this->Format->zeroPad($id) ?></b><br/></big>
                    <br/>
                    <b>Modo de Entrega:</b> <?= $modo_entrega["ModoEntrega"]["nome"] ?><br/>
                    <b>Prazo de Entrega:</b> <?= $this->Date->format($ordem_servico["OrdemServico"]["prazo"]) ?><br/>
                    <b>Contato do Cliente:</b> <?= $ordem_servico["OrdemServico"]["contato_cliente"] ?><br/>
                    <b>Criado Por:</b> <?= $responsavel["Usuario"]["nome"] ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr style=""/>
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>
                                <b>Serviço</b><br/>
                                <span><?= $ordem_servico["OrdemServico"]["servico"] ?></span>
                            </td>
                            <td>
                                <b>Material</b><br/>
                                <span><?= $ordem_servico["OrdemServico"]["material"] ?></span>
                            </td>
                            <td>
                                <b>Acabamento</b><br/>
                                <span><?= $ordem_servico["OrdemServico"]["acabamento"] ?></span>
                            </td>
                            <td>
                                <b>Equipamento Para Saída</b><br/>
                                <span><?= $equipamento["Equipamento"]["nome"] ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Formato</b><br/>
                                <span><?= $ordem_servico["OrdemServico"]["formato"] ?></span>
                            </td>
                            <td>
                                <b>Formato Final</b><br/>
                                <span><?= $ordem_servico["OrdemServico"]["formato_final"] ?></span>
                            </td>
                            <td>
                                <b>Quantidade Produção</b><br/>
                                <span><?= $ordem_servico["OrdemServico"]["quantidade_producao"] ?></span>
                            </td>
                            <td>
                                <b>Quantidade Cliente</b><br/>
                                <span><?= $ordem_servico["OrdemServico"]["quantidade_cliente"] ?></span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 invoice-col">
                    <b>Observações</b><br/>
                    <span><?= $ordem_servico["OrdemServico"]["observacoes"] ?></span>
                </div>
                <div class="col-sm-6 invoice-col">
                    <b>Arquivo para produção</b><br/>
                    <span><?= $ordem_servico["OrdemServico"]["arquivo"] ?></span>
                </div>
            </div>
            <div class="row" style="min-height: 30px;">

            </div>
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="<?= $this->Url->makeParams('ordem_servico', 'imprimir', $id) ?> " target="_blank" class="btn btn-success pull-right"><i class="fa fa-print"></i> Imprimir</a>
                    <a href="<?= $this->Url->make('ordem_servico') ?>" class="btn btn-primary pull-right" style="margin-right: 5px">Voltar</a>
                </div>
            </div>
    </section>
</div>