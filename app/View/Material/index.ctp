<?= $this->Session->flash() ?>
<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Lista de Materiais</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-gear"></i>Outros</a></li>
            <li><a href="#"><i class="fa fa-puzzle-piece"></i>Materiais</a></li>
            <li class="active"><a href="#"><i class="fa fa-search"></i>Busca</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div id="wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <div style="text-align: right;">
                                <button id="btnNovo" class="btn btn-success" onclick="<?= 'window.location = \'' . $this->Url->make('material', 'add') . '\'' ?>">Novo</button>
                            </div>
                            <div style="min-height: 30px">

                            </div>
                            <?php if ($qtd_materiais == 0): ?>
                                <div>
                                    <h2>Nenhum material cadastrado encontrado. Para cadastrar seu primeiro material, <?= $this->Html->link("clique aqui", array("controller" => "material", "action" => "add")) ?>.</h2>
                                </div>
                            <?php else: ?>
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Descrição</th>
                                            <th>Fabricante</th>
                                            <th style="width: 9%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($materiais as $material): ?>
                                            <tr>
                                                <td><?= $material["Material"]["descricao"] ?></td>
                                                <td><?= $material["Material"]["fabricante"] ?></td>
                                                <td>
                                                    <a href="<?= $this->Url->makeParams('material', 'edit', $material["Material"]["id"]) ?>" class="btn btn-bitbucket" title="Editar">
                                                        <i class="fa fa-edit">
                                                        </i>
                                                    </a>
                                                    <a class="btn btn-google-plus" href="#" onclick="excluir(<?= $equipamento["Material"]["id"] ?>)" title="Excluir">
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
                    <?= $this->element("pagination", array("qtd_total" => $qtd_materiais, "name" => "materiais")) ?>
                </div>
            </div>
        </div>
    </section>
</div>