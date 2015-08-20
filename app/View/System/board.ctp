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
                        <span class="info-box-number"><?= $tarefas_ativas ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-thumbs-o-up"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Concluídas</span>
                        <span class="info-box-number"><?= $tarefas_concluidas ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-frown-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Canceladas</span>
                        <span class="info-box-number"><?= $tarefas_canceladas ?></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-group"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Clientes Cadastrados</span>
                        <span class="info-box-number"><?= $clientes ?></span>
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
                            <?php if (count($ordens_servicos) == 0): ?>
                                <div>
                                    <h2>Nenhuma ordem de serviço encontrada. Para gerar a nova ordem de serviço, <?= $this->Html->link("clique aqui", array("controller" => "ordem_servico", "action" => "add")) ?>.</h2>
                                </div>
                            <?php else: ?>
                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>Número</th>
                                            <th>Cliente</th>
                                            <th>Serviço</th>
                                            <th>Prazo de Entrega</th>
                                            <th>Prioridade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ordens_servicos as $ordem_servico): ?>
                                            <tr>
                                                <td><?= $this->Html->link($this->Format->zeroPad($ordem_servico["OrdemServico"]["id"]), array("controller" => "ordem_servico", "action" => "documento", $ordem_servico["OrdemServico"]["id"])) ?></td>
                                                <td><abbr title="<?= $ordem_servico['Cliente']['nome_fantasia'] ?>"><?= $ordem_servico["Cliente"]["razao_social"] ?></td>
                                                <td><?= $ordem_servico["OrdemServico"]["servico"] ?></td>
                                                <td><?= $this->Date->format($ordem_servico["OrdemServico"]["prazo"]) ?></td>
                                                <td><?= $this->Business->priorityText($ordem_servico["OrdemServico"]["prioridade"]) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div><!-- /.table-responsive -->
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <?php if ($this->Membership->handleRole("ADICIONAR_ORDEM_SERVICO")): ?>
                            <?= $this->Html->link("Gerar Nova Ordem", array("controller" => "ordem_servico", "action" => "add"), array("class" => "btn btn-sm btn-info btn-flat pull-left")) ?>
                        <?php endif; ?>
                        <?php if ($this->Membership->handleRole("LISTA_ORDEM_SERVICO")): ?>
                            <?= $this->Html->link("Visualizar Todas as Ordens", array("controller" => "ordem_servico"), array("class" => "btn btn-sm btn-default btn-flat pull-right")) ?>
                        <?php endif; ?>
                    </div><!-- /.box-footer -->
                </div>
            </div>
        </div>
    </section>
</div>