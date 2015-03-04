<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title_for_layout ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i>Usuários</a></li>
            <li class="active"><a href="<?= $this->Url->relative('/usuario') ?>"><i class="fa fa-user"></i>Cadastro de Usuários</a></li>
            <?php if ($id_usuario > 0): ?>
                <li class="active"><a href="#"><i class="fa fa-edit"></i>Edição do Usuário</a></li>
            <?php else: ?>
                <li class="active"><a href="#"><i class="fa fa-plus-circle"></i>Novo Usuário</a></li>
            <?php endif; ?>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box">
                    <form action="#" role="form">
                        <div class="box-body">
                            <div class="form-group col-xs-12">
                                <label for="exampleInputEmail1">Nome</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="exampleInputPassword1">Endereço</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputPassword1">Bairro</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputPassword1">Cidade</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputPassword1">Estado</label>
                                <select class="form-control">
                                    <option value=""></option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>

                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputPassword1">CEP</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">Telefone</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">Celular</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">Cargo</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">Setor</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">Nickname</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">Senha</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">Confirme a Senha</label>
                                <input type="password" class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="exampleInputEmail1">Grupo de Usuários</label>
                                <select class="form-control" style="width: 30%">
                                    <option></option>
                                    <option>Administrativo</option>
                                    <option>Gerente</option>
                                    <option>Operacional</option>
                                    <option>Financeiro</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12">
                                <label>Outras Opções</label><br/>
                                <input type="checkbox" class="checkbox-inline"/>Ativo
                            </div>
                            <div style="text-align: right;">
                                <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('usuario') ?>'" type="button" class="btn btn-primary">Voltar</button>
                                <button type="reset" class="btn btn-primary">Limpar</button>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>