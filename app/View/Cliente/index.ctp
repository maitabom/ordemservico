<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Lista de Usuários</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i>Usuários</a></li>
            <li class="active"><a href="#"><i class="fa fa-user"></i>Cadastro de Usuários</a></li>
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
                                <div class="col-xs-3">
                                    <label for="exampleInputEmail1">Nome</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class=" col-xs-3">
                                    <label for="exampleInputEmail1">Nick</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class=" col-xs-3">
                                    <label for="exampleInputEmail1">E-mail</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class=" col-xs-3">
                                    <label for="exampleInputEmail1">Exibir</label><br/>
                                    <select class="form-control">
                                        <option>Todos</option>
                                        <option>Somente ativos</option>
                                        <option>Somente os inativos</option>
                                    </select>
                                </div>
                            </div>
                            <div style="min-height: 15px">

                            </div>
                            <div style="text-align: right;">
                                <button id="btnNovo" class="btn btn-success" onclick="<?= 'window.location = \'' . $this->Url->make('usuario', 'add') . '\'' ?>">Novo</button>
                                <button class="btn btn-primary">Buscar</button>
                            </div>
                            <div style="min-height: 30px">

                            </div>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 40%">Nome</th>
                                        <th style="width: 20%">Nick</th>
                                        <th style="width: 25%">E-mail</th>
                                        <th>Ativo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Magno Alves</td>
                                        <td>malves</td>
                                        <td>magno.alves@gmail.com</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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
                                        <td>Roberto Justus</td>
                                        <td>roberto_justus</td>
                                        <td>rjustus@hilton.com</td>
                                        <td>Não</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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
                                        <td>Samara Morgan</td>
                                        <td>samara</td>
                                        <td>samarasevendays@yahoo.com.br</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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
                                        <td>Patrícia Coelho</td>
                                        <td>paty</td>
                                        <td>patricia.coelho@globo.com</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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
                                        <td>Aline Ferreira</td>
                                        <td>aferreira</td>
                                        <td>aferreira@yahoo.com</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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
                                        <td>Flávia Botelho</td>
                                        <td>fbotelho</td>
                                        <td>flavinha@gmail.com</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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
                                        <td>Gabriel Batista</td>
                                        <td>biel.batista</td>
                                        <td>bielbatista@gmail.com</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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
                                        <td>Hugo Ramos</td>
                                        <td>hramos</td>
                                        <td>hugoramos@gmail.com</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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
                                        <td>Cíntia Cavalcante</td>
                                        <td>cintia</td>
                                        <td>cinta@into.gov.br</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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
                                        <td>Silas Fernando</td>
                                        <td>mestresilas</td>
                                        <td>silas@hospitalbalbino.com.br</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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
                                        <td>Antônio Bernardo</td>
                                        <td>abernardo</td>
                                        <td>abernardo@ig.com.br</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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
                                        <td>Fernanda Carvalho</td>
                                        <td>fecarvalho</td>
                                        <td>fecarvalho@gmail.com</td>
                                        <td>Sim</td>
                                        <td>
                                            <a href="<?= $this->Url->relative('usuario/edit/1') ?>" class="btn btn-bitbucket" title="Editar">
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