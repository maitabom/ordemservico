<?= $this->element('menu'); ?>
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
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="exampleInputEmail1">Número</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-xs-4">
                                    <label for="exampleInputEmail1">Cliente</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class=" col-xs-4">
                                    <label for="exampleInputEmail1">Serviço</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class=" col-xs-6">
                                    <label for="exampleInputEmail1">Data de Emissão</label><br/>
                                    de <input type="text" class="form-control" id="exampleInputEmail1">
                                    à <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class=" col-xs-6">
                                    <label for="exampleInputEmail1">Prazo de Entrega</label><br/>
                                    de <input type="text" class="form-control" id="exampleInputEmail1">
                                    à <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div style="min-height: 15px">

                            </div>
                            <div style="text-align: right;">
                                <button id="btnNovo" class="btn btn-success" onclick="<?= 'window.location = \'' . $this->Url->make('ordem_servico', 'add') . '\'' ?>">Novo</button>
                                <button class="btn btn-primary">Buscar</button>
                            </div>
                            <div style="min-height: 30px">

                            </div>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Número</th>
                                        <th>Cliente</th>
                                        <th>Serviço</th>
                                        <th>Data Emissão</th>
                                        <th>Prazo de Entrega</th>
                                        <th style="width: 14%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>007781</td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>21/02/2015</td>
                                        <td>25/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', '11114') ?>" class="btn btn-tumblr" title="Visualizar">
                                                <i class="fa fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>007782</td>
                                        <td>Restaurante Super Lanche</td>
                                        <td>Adesivo - Preços para cardápio</td>
                                        <td>21/02/2015</td>
                                        <td>25/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', '11114') ?>" class="btn btn-tumblr" title="Visualizar">
                                                <i class="fa fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>007781</td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>21/02/2015</td>
                                        <td>25/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', '11114') ?>" class="btn btn-tumblr" title="Visualizar">
                                                <i class="fa fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>007781</td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>21/02/2015</td>
                                        <td>25/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', '11114') ?>" class="btn btn-tumblr" title="Visualizar">
                                                <i class="fa fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>007781</td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>21/02/2015</td>
                                        <td>25/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', '11114') ?>" class="btn btn-tumblr" title="Visualizar">
                                                <i class="fa fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>007781</td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>21/02/2015</td>
                                        <td>25/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', '11114') ?>" class="btn btn-tumblr" title="Visualizar">
                                                <i class="fa fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>007781</td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>21/02/2015</td>
                                        <td>25/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', '11114') ?>" class="btn btn-tumblr" title="Visualizar">
                                                <i class="fa fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>007781</td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>21/02/2015</td>
                                        <td>25/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', '11114') ?>" class="btn btn-tumblr" title="Visualizar">
                                                <i class="fa fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>007781</td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>21/02/2015</td>
                                        <td>25/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', '11114') ?>" class="btn btn-tumblr" title="Visualizar">
                                                <i class="fa fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>007781</td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>21/02/2015</td>
                                        <td>25/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', '11114') ?>" class="btn btn-tumblr" title="Visualizar">
                                                <i class="fa fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>007781</td>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>21/02/2015</td>
                                        <td>25/02/2015</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'documento', '11114') ?>" class="btn btn-tumblr" title="Visualizar">
                                                <i class="fa fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>