<?= $this->Session->flash() ?>
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
                            <?php
                            echo $this->Form->create("Usuario", array(
                                "url" => array(
                                    "controller" => "usuario",
                                    "action" => "index"
                                ),
                                "role" => "form"));
                            ?>
                            <div class="row">
                                <div class="col-xs-3">
                                    <?= $this->Form->label("nome", "Nome") ?><br/>
                                    <?= $this->Form->text("nome", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                                <div class=" col-xs-3">
                                    <?= $this->Form->label("nickname", "Usuário") ?><br/>
                                    <?= $this->Form->text("nickname", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                                <div class=" col-xs-3">
                                    <?= $this->Form->label("email", "E-mail") ?><br/>
                                    <?= $this->Form->text("email", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                                <div class=" col-xs-3">
                                    <?= $this->Form->label("mostra", "Mostrar") ?><br/>
                                    <?= $this->Form->select("mostra", $combo_mostra, array("class" => "form-control", "style" => "width: 100%", "empty" => false)) ?>
                                </div>
                            </div>
                            <div style="min-height: 15px">

                            </div>
                            <div style="text-align: right;">
                                <button type="button" id="btnNovo" class="btn btn-success" onclick="<?= 'window.location = \'' . $this->Url->make('usuario', 'add') . '\'' ?>">Novo</button>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                            <?php echo $this->Form->end(); ?>
                            <div style="min-height: 30px">

                            </div>
                            <?php if (count($usuarios) == 0): ?>
                                <div>
                                    <h2>Nenhum usuário encontrado.</h2>
                                </div>
                            <?php else: ?>
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
                                        <?php foreach ($usuarios as $usuario): ?>
                                            <tr>
                                                <td><?= $usuario["Usuario"]["nome"] ?></td>
                                                <td><?= $usuario["Usuario"]["nickname"] ?></td>
                                                <td><?= $usuario["Usuario"]["email"] ?></td>
                                                <td><?= $usuario["Usuario"]["ativo"] ? "Sim" : "Não" ?></td>
                                                <td>
                                                    <a href="<?= $this->Url->relative('usuario/edit/' . $usuario["Usuario"]["id"]) ?>" class="btn btn-bitbucket" title="Editar">
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
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>