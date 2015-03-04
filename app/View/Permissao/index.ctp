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
                                        <th style="width: 75%">Nome</th>
                                        <th>Ativo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Administrador</td>
                                        <td>Sim</td>

                                    </tr>
                                    <tr>
                                        <td>Gerente</td>
                                        <td>Sim</td>
                                    <tr>
                                        <td>Operacional</td>
                                        <td>Sim</td>
                                    </tr>
                                    <tr>
                                        <td>RH</td>
                                        <td>Não</td>
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