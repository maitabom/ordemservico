<?= $this->element('menu'); ?>
<?= $this->Session->flash() ?>
<?=
$this->element("question", array(
    "name" => "ordem_servico_excluir",
    "form_name" => "frm_servico_excluir",
    "message" => "Deseja exclur o modelo da ordem de serviço?",
    "action" => array(
        "controller" => "ordem_servico",
        "action" => "template_delete"),
    "callback" => array(
        "controller" => "ordem_servico",
        "action" => "templates"),
    "buttons" => array(
        "ok" => "Sim",
        "cancel" => "Não"
    )
))
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Modelos de Ordem de Serviço</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-files-o"></i>Ordem de Serviço</a></li>
            <li class="active"><a href="#"><i class="fa fa-bookmark"></i>Templates</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Busca</h3>
                    </div>
                    <div class="box-body">
                        <div id="wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <?php
                            echo $this->Form->create("OrdemServicoModelo", array(
                                "url" => array(
                                    "controller" => "ordem_servico",
                                    "action" => "templates"
                                ),
                                "role" => "form"));
                            ?>
                            <div class="row">
                                <div class="col-xs-6">
                                    <?= $this->Form->label("cliente", "Cliente") ?><br/>
                                    <?= $this->Form->text("cliente", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                                <div class=" col-xs-6">
                                    <?= $this->Form->label("servico", "Serviço") ?><br/>
                                    <?= $this->Form->text("servico", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>

                            </div>
                            <div style="min-height: 15px">

                            </div>
                            <div style="text-align: right;">

                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                            <?php echo $this->Form->end(); ?>
                            <div style="min-height: 30px">

                            </div>
                            <?php if ($qtd_ordens == 0): ?>
                                <div>
                                    <h2>Nenhuma ordem de serviço encontrada. Para gerar a nova ordem de serviço, <?= $this->Html->link("clique aqui", array("controller" => "ordem_servico", "action" => "add")) ?>.</h2>
                                </div>
                            <?php else: ?>
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Serviço</th>
                                            <th style="width: 14%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ordens_servicos as $ordem_servico): ?>
                                            <tr>
                                                <td><abbr title="<?= $ordem_servico['Cliente']['nome_fantasia'] ?>"><?= $ordem_servico["Cliente"]["razao_social"] ?></abbr></td>
                                                <td><?= $ordem_servico["OrdemServicoModelo"]["servico"] ?></td>
                                                <td>
                                                    <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', $ordem_servico["Cliente"]["id"]) ?>" class="btn btn-bitbucket" title="Editar">
                                                        <i class="fa fa-edit">
                                                        </i>
                                                    </a>
                                                    <a href="<?= $this->Url->makeParams('ordem_servico', 'add', $ordem_servico["Cliente"]["id"]) ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                        <i class="fa fa-plus">
                                                        </i>
                                                    </a>
                                                    <a class="btn btn-google-plus" title="Excluir">
                                                        <i class="fa fa-trash">
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?= $this->element("pagination", array("qtd_total" => $qtd_ordens)) ?>
                </div>
            </div>
        </div>
    </section>
</div>