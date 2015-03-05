<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Pesquisa de Ordem de Serviço</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-briefcase"></i>Ordem de Serviço</a></li>
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
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="exampleInputEmail1">Nome</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-xs-4">
                                    <label for="exampleInputEmail1">E-mail</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class=" col-xs-4">
                                    <label for="exampleInputEmail1">Cidade</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div style="min-height: 15px">

                            </div>
                            <div style="text-align: right;">
                                <button id="btnNovo" class="btn btn-success" onclick="<?= 'window.location = \'' . $this->Url->make('cliente', 'add') . '\'' ?>">Novo</button>
                                <button class="btn btn-primary">Buscar</button>
                            </div>
                            <div style="min-height: 30px">

                            </div>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Documento Fiscal</th>
                                        <th>Tipo</th>
                                        <th>E-mail</th>
                                        <th>Localidade</th>
                                        <th>Ativo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Globex Utilidades S/A</td>
                                        <td>97.248.628/0001-42</td>
                                        <td>PJ</td>
                                        <td>edgar_romero@pontofrio.com.br</td>
                                        <td>Rio de Janeiro - RJ</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Colégio Santa Maria</td>
                                        <td>71.491.384/0001-30</td>
                                        <td>PJ</td>
                                        <td>direcao@colegiosantamaria.com.br</td>
                                        <td>São João de Meriti - RJ</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mariana Carvaho Lima</td>
                                        <td>388.307.969-30</td>
                                        <td>PF</td>
                                        <td>marianalima@gmail.com</td>
                                        <td>Santa Rita da Sapucaí - MG</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Silvana Lopes</td>
                                        <td>827.241.876-28</td>
                                        <td>PF</td>
                                        <td>silopes@yahoo.com.br</td>
                                        <td>Niterói - RJ</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Globex Utilidades S/A</td>
                                        <td>97.248.628/0001-42</td>
                                        <td>PJ</td>
                                        <td>edgar_romero@pontofrio.com.br</td>
                                        <td>Rio de Janeiro - RJ</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Globex Utilidades S/A</td>
                                        <td>97.248.628/0001-42</td>
                                        <td>PJ</td>
                                        <td>edgar_romero@pontofrio.com.br</td>
                                        <td>Rio de Janeiro - RJ</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Globex Utilidades S/A</td>
                                        <td>97.248.628/0001-42</td>
                                        <td>PJ</td>
                                        <td>edgar_romero@pontofrio.com.br</td>
                                        <td>Rio de Janeiro - RJ</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Globex Utilidades S/A</td>
                                        <td>97.248.628/0001-42</td>
                                        <td>PJ</td>
                                        <td>edgar_romero@pontofrio.com.br</td>
                                        <td>Rio de Janeiro - RJ</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Globex Utilidades S/A</td>
                                        <td>97.248.628/0001-42</td>
                                        <td>PJ</td>
                                        <td>edgar_romero@pontofrio.com.br</td>
                                        <td>Rio de Janeiro - RJ</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Globex Utilidades S/A</td>
                                        <td>97.248.628/0001-42</td>
                                        <td>PJ</td>
                                        <td>edgar_romero@pontofrio.com.br</td>
                                        <td>Rio de Janeiro - RJ</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Globex Utilidades S/A</td>
                                        <td>97.248.628/0001-42</td>
                                        <td>PJ</td>
                                        <td>edgar_romero@pontofrio.com.br</td>
                                        <td>Rio de Janeiro - RJ</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Globex Utilidades S/A</td>
                                        <td>97.248.628/0001-42</td>
                                        <td>PJ</td>
                                        <td>edgar_romero@pontofrio.com.br</td>
                                        <td>Rio de Janeiro - RJ</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('cliente/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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