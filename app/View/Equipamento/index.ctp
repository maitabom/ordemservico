<?= $this->element('menu'); ?>
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
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Fabricante</th>
                                        <th>Modelo</th>
                                        <th>Data de Aquisição</th>
                                        <th style="width: 14%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Impressora Jato de Tinta HP Deskjet</td>
                                        <td>HP</td>
                                        <td>3251</td>
                                        <td>21/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('equipamento', 'edit', 1) ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>