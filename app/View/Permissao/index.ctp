<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Lista de Permissões</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i>Usuários</a></li>
            <li class="active"><a href="#"><i class="fa fa-shield"></i>Permissões</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <div class="box-body">
                        <div id="wrapper" class="dataTables_wrapper form-inline" role="grid">

                            <div style="text-align: right;">
                                <button id="btnNovo" class="btn btn-success" onclick="<?= 'window.location = \'' . $this->Url->make('permissao', 'add') . '\'' ?>">Novo</button>
                            </div>
                            <div style="min-height: 30px">

                            </div>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 85%">Nome</th>
                                        <th>Ativo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($permissoes as $permissao): ?>
                                        <tr>
                                            <td><?= $permissao["Permissao"]["nome"] ?></td>
                                            <td><?= $permissao["Permissao"]["ativo"] ? "Sim" : "Não" ?></td>
                                            <td>
                                                <a href="<?= $this->Url->relative('permissao/edit/' . $permissao["Permissao"]["id"]) ?>" class="btn btn-bitbucket" title="Editar">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>