<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Painel do Sistema</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-gear"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tarefas Ativas</span>
                        <span class="info-box-number">35</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-thumbs-o-up"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Concluídas em 7 dias</span>
                        <span class="info-box-number">12</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-frown-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Canceladas em 7 dias</span>
                        <span class="info-box-number">4</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-group"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Clientes Atendidos</span>
                        <span class="info-box-number">40</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ordens de Serviço Recentes</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>Número</th>
                                        <th>Cliente</th>
                                        <th>Serviço</th>
                                        <th>Prazo de Entrega</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $this->Html->link("007781", array("controller" => "ordem_servico", "action" => "documento", 23471)) ?></td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>25/07/2015</td>
                                    </tr>
                                    <tr>
                                        <td><?= $this->Html->link("007782", array("controller" => "ordem_servico", "action" => "documento", 23471)) ?></td>
                                        <td>Restaurante Super Lanche</td>
                                        <td>Adesivo - Preços para cardápio</td>
                                        <td>25/05/2015</td>
                                    </tr>
                                    <tr>
                                        <td><?= $this->Html->link("007783", array("controller" => "ordem_servico", "action" => "documento", 23471)) ?></td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>25/02/2015</td>
                                    </tr>
                                    <tr>
                                        <td><?= $this->Html->link("007784", array("controller" => "ordem_servico", "action" => "documento", 23471)) ?></td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>25/02/2015</td>
                                    </tr>
                                    <tr>
                                        <td><?= $this->Html->link("007785", array("controller" => "ordem_servico", "action" => "documento", 23471)) ?></td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>25/02/2015</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <?= $this->Html->link("Gerar Nova Ordem", array("controller" => "ordem_servico", "action" => "add"), array("class" => "btn btn-sm btn-info btn-flat pull-left")) ?>
                        <?= $this->Html->link("Visualizar Todas as Ordens", array("controller" => "ordem_servico"), array("class" => "btn btn-sm btn-default btn-flat pull-right")) ?>
                    </div><!-- /.box-footer -->
                </div>
            </div>

        </div>
    </section>
</div>