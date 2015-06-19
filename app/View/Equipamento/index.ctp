<?php
$opcao_paginacao_number = array("tag" => "li", "separator" => "", "currentTag" => "a");
$opcao_paginacao_extra = array("tag" => "li", "disabledTag" => "a");
?>
<script type="text/javascript">
    function excluir(id) {
        $("#equipamento_excluir").dialog("open");
        $("#questionParameter").val(id);
    }
</script>
<?= $this->Session->flash() ?>
<?= $this->element('menu'); ?>
<?=
$this->element("question", array(
    "name" => "equipamento_excluir",
    "form_name" => "frm_equipamento_excluir",
    "message" => "Deseja excluir o cliente? Certifique que não haja nenhum serviço associado a este cliente. Você pode deixar inativo, se desejar.",
    "action" => array(
        "controller" => "equipamento",
        "action" => "delete"),
    "buttons" => array(
        "ok" => "Sim",
        "cancel" => "Não"
    )
))
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Pesquisa de Equipamentos</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-gear"></i>Outros</a></li>
            <li><a href="#"><i class="fa fa-print"></i>Equipamentos</a></li>
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
                            <div style="text-align: right;">
                                <button id="btnNovo" class="btn btn-success" onclick="<?= 'window.location = \'' . $this->Url->make('equipamento', 'add') . '\'' ?>">Novo</button>
                            </div>
                            <div style="min-height: 30px">

                            </div>
                            <?php if ($qtd_equipamentos == 0): ?>
                                <div>
                                    <h2>Nenhum cliente cadastrado encontrado. Para cadastrar seu primeiro cliente, <?= $this->Html->link("clique aqui", array("controller" => "cliente", "action" => "add")) ?>.</h2>
                                </div>
                            <?php else: ?>
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Fabricante</th>
                                            <th>Modelo</th>
                                            <th>Data de Aquisição</th>
                                            <th>Ativo</th>
                                            <th style="width: 14%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($equipamentos as $equipamento): ?>
                                            <tr>
                                                <td><?= $equipamento["Equipamento"]["nome"] ?></td>
                                                <td><?= $equipamento["Equipamento"]["fabricante"] ?></td>
                                                <td><?= $equipamento["Equipamento"]["modelo"] ?></td>
                                                <td><?= $this->Date->format($equipamento["Equipamento"]["data_aquisicao"]) ?></td>
                                                <td><?= $equipamento["Equipamento"]["ativo"] ? "Sim" : "Não" ?></td>
                                                <td>
                                                    <a href="<?= $this->Url->makeParams('equipamento', 'edit', $equipamento["Equipamento"]["id"]) ?>" class="btn btn-bitbucket" title="Editar">
                                                        <i class="fa fa-edit">
                                                        </i>
                                                    </a>
                                                    <a class="btn btn-google-plus" title="Excluir">
                                                        <i class="fa fa-trash">
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <?php if ($qtd_equipamentos > 0): ?>
                            <?= $qtd_equipamentos ?> equipamentos encontrados.
                            <?php if ($qtd_equipamentos > $limit_pagination): ?>
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    <?= $this->Paginator->prev('«', $opcao_paginacao_extra) ?>
                                    <?= $this->Paginator->numbers($opcao_paginacao_number) ?>
                                    <?= $this->Paginator->next('»', $opcao_paginacao_extra) ?>
                                </ul>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>