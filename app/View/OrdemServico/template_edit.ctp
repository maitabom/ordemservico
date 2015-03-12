<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar Modelo de Ordem de Serviço <small><?= $id ?></small></h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-files-o"></i>Ordem de Serviço</a></li>
            <li><a href="<?= $this->Url->make('templates') ?>"><i class="fa fa-bookmark"></i>Templates</a></li>
            <li class="active"><a href="#"><i class="fa fa-edit"></i>Editar Modelo de Ordem de Serviço</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box">
                    <form action="documento" role="form">
                        <div class="box-body">
                            <div class="form-group col-xs-12">
                                <label for="exampleInputEmail1">Cliente</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="exampleInputEmail1">Serviço</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="exampleInputPassword1">Material</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputPassword1">Formato</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputPassword1">Formato Final</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputPassword1">Quantidade Produção</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputPassword1">Quantidade Cliente</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">Acabamento</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">Equipamento Para Saída</label>
                                <select class="form-control">
                                    <option value=""></option>
                                    <option value="AC">CG 130 LX</option>
                                    <option value="AC">HP Deskjet</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">Modo de Entrega</label>
                                <select class="form-control">
                                    <option value=""></option>
                                    <option value="AC">Sedex</option>
                                    <option value="AC">PAC</option>
                                    <option value="AC">Transportadora</option>
                                    <option value="AC">Motoboy</option>
                                    <option value="AC">Cliente vem buscar</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="exampleInputEmail1">Contato do Cliente</label>
                                <input type="text" class="form-control">
                            </div>

                            <div style="text-align: right;">
                                <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('ordem_servico', 'templates') ?>'" type="button" class="btn btn-primary">Voltar</button>
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