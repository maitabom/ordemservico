<script type="text/javascript">
    function excluir(id) {
        $("#ordem_servico_excluir").dialog("open");
        $("#questionParameter").val(id);
    }

    $(function () {

        VMasker(document.querySelector("#OrdemServicoNumero")).maskNumber();
        VMasker(document.querySelector("#OrdemServicoDataEmissaoInicio")).maskPattern("99/99/9999");
        VMasker(document.querySelector("#OrdemServicoDataEmissaoFim")).maskPattern("99/99/9999");
        VMasker(document.querySelector("#OrdemServicoPrazoInicio")).maskPattern("99/99/9999");
        VMasker(document.querySelector("#OrdemServicoPrazoFim")).maskPattern("99/99/9999");

        $("#OrdemServicoDataEmissaoInicio").datepicker({
            format: "dd/mm/yyyy",
            todayBtn: "linked",
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true
        });

        $("#OrdemServicoDataEmissaoFim").datepicker({
            format: "dd/mm/yyyy",
            todayBtn: "linked",
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true
        });

        $("#OrdemServicoPrazoInicio").datepicker({
            format: "dd/mm/yyyy",
            todayBtn: "linked",
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true
        });

        $("#OrdemServicoPrazoFim").datepicker({
            format: "dd/mm/yyyy",
            todayBtn: "linked",
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true
        });
    });
</script>
<?= $this->Session->flash() ?>
<?= $this->element('menu'); ?>
<?=
$this->element("question", array(
    "name" => "ordem_servico_excluir",
    "form_name" => "frm_servico_excluir",
    "message" => "Deseja cancelar esta ordem de serviço?",
    "action" => array(
        "controller" => "ordem_servico",
        "action" => "cancelar"),
    "callback" => array(
        "controller" => "ordem_servico",
        "action" => "index"),
    "buttons" => array(
        "ok" => "Sim",
        "cancel" => "Não"
    )
))
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Pesquisa de Ordem de Serviço</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-files-o"></i>Ordem de Serviço</a></li>
            <li class="active"><a href="#"><i class="fa fa-search"></i>Busca</a></li>
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
                            echo $this->Form->create("OrdemServico", array(
                                "url" => array(
                                    "controller" => "ordem_servico",
                                    "action" => "index"
                                ),
                                "role" => "form"));
                            ?>
                            <div class="row">
                                <div class="col-xs-4">
                                    <?= $this->Form->label("numero", "Número") ?><br/>
                                    <?= $this->Form->text("numero", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->label("cliente", "Cliente") ?><br/>
                                    <?= $this->Form->text("cliente", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                                <div class=" col-xs-4">
                                    <?= $this->Form->label("servico", "Serviço") ?><br/>
                                    <?= $this->Form->text("servico", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                            </div>
                            <div style="min-height: 15px">

                            </div>
                            <div class="row">
                                <div class=" col-xs-4">
                                    <?= $this->Form->label("data_emissao", "Data de Emissão") ?><br/>
                                    de <?= $this->Form->text("data_emissao_inicio", array("class" => "form-control", "style" => "width: 100px")) ?>
                                    à <?= $this->Form->text("data_emissao_fim", array("class" => "form-control", "style" => "width: 100px")) ?>
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->label("data_emissao", "Prazo") ?><br/>
                                    de <?= $this->Form->text("prazo_inicio", array("class" => "form-control", "style" => "width: 100px")) ?>
                                    à <?= $this->Form->text("prazo_fim", array("class" => "form-control", "style" => "width: 100px")) ?>
                                </div>
                                <div class="col-xs-4">
                                    <?= $this->Form->label("mostrar", "Mostrar") ?><br/>
                                    <?= $this->Form->select("mostrar", $status_ordens, array("empty" => false, "class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                            </div>
                            <div style="min-height: 15px">

                            </div>
                            <div style="text-align: right;">
                                <button type="button" id="btnNovo" class="btn btn-success" onclick="<?= 'window.location = \'' . $this->Url->make('ordem_servico', 'add') . '\'' ?>">Novo</button>
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
                                            <th>Número</th>
                                            <th>Cliente</th>
                                            <th>Serviço</th>
                                            <th>Data Emissão</th>
                                            <th>Prazo de Entrega</th>
                                            <th>Prioridade</th>
                                            <th style="width: 14%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ordens_servicos as $ordem_servico): ?>
                                            <tr>
                                                <td><?= $this->Format->zeroPad($ordem_servico["OrdemServico"]["id"]) ?></td>
                                                <td><abbr title="<?= $ordem_servico['Cliente']['nome_fantasia'] ?>"><?= $ordem_servico["Cliente"]["razao_social"] ?></abbr></td>
                                                <td><?= $ordem_servico["OrdemServico"]["servico"] ?></td>
                                                <td><?= $this->Date->format($ordem_servico["OrdemServico"]["data_criacao"]) ?></td>
                                                <td><?= $this->Date->format($ordem_servico["OrdemServico"]["prazo"]) ?></td>
                                                <td><?= $this->Business->priorityText($ordem_servico["OrdemServico"]["prioridade"]) ?></td>
                                                <td>
                                                    <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', $ordem_servico["OrdemServico"]["id"]) ?>" class="btn btn-bitbucket" title="Editar">
                                                        <i class="fa fa-edit">
                                                        </i>
                                                    </a>
                                                    <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', $ordem_servico["OrdemServico"]["id"]) ?>" class="btn btn-tumblr" title="Visualizar">
                                                        <i class="fa fa-eye">
                                                        </i>
                                                    </a>
                                                    <a class="btn btn-google-plus" href="#" onclick="excluir(<?= $ordem_servico['OrdemServico']['id'] ?>)" title="Cancelar">
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
                    <?=
                    $this->element("pagination", array(
                        "qtd_total" => $qtd_ordens,
                        "name" => "ordens de serviço",
                        "predicate" => "encontradas",
                        "singular" => "encontrada"))
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>