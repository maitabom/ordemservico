<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Templates de Ordem de Serviço</h1>
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
                            <div class="row">

                                <div class="col-xs-6">
                                    <label for="exampleInputEmail1">Cliente</label><br/>
                                    <input type="text" class="form-control" style="width: 100%">
                                </div>
                                <div class=" col-xs-6">
                                    <label for="exampleInputEmail1">Serviço</label><br/>
                                    <input type="text" class="form-control" style="width: 100%">
                                </div>

                            </div>
                            <div style="min-height: 15px">

                            </div>
                            <div style="text-align: right;">

                                <button class="btn btn-primary">Buscar</button>
                            </div>
                            <div style="min-height: 30px">

                            </div>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Serviço</th>
                                        <th style="width: 14%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'add', '11114') ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                <i class="fa fa-plus">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Restaurante Super Lanche</td>
                                        <td>Adesivo - Preços para cardápio</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'add', '11114') ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                <i class="fa fa-plus">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'add', '11114') ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                <i class="fa fa-plus">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'add', '11114') ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                <i class="fa fa-plus">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'add', '11114') ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                <i class="fa fa-plus">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'add', '11114') ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                <i class="fa fa-plus">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'add', '11114') ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                <i class="fa fa-plus">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'add', '11114') ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                <i class="fa fa-plus">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'add', '11114') ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                <i class="fa fa-plus">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'add', '11114') ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                <i class="fa fa-plus">
                                                </i>
                                            </a>
                                            <a class="btn btn-google-plus" title="Excluir">
                                                <i class="fa fa-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Pizzaria Flamengo</td>
                                        <td>Faixa Promocional - Anuncio</td>
                                        <td>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'template_edit', '11114') ?>" class="btn btn-bitbucket" title="Editar">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                            <a href="<?= $this->Url->makeParams('ordem_servico', 'add', '11114') ?>" class="btn btn-tumblr" title="Gerar nova ordem de serviço a partir deste modelo">
                                                <i class="fa fa-plus">
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