<script type="text/javascript">
    function excluir(id) {
        $("#usuario_excluir").dialog("open");
        $("#questionParameter").val(id);
    }
</script>
<?= $this->Session->flash() ?>
<?= $this->element('menu'); ?>
<?=
$this->element("question", array(
    "name" => "usuario_excluir",
    "form_name" => "frm_usuario_excluir",
    "message" => "Deseja excluir o usuário?",
    "action" => array(
        "controller" => "usuario",
        "action" => "delete"),
    "buttons" => array(
        "ok" => "Sim",
        "cancel" => "Não"
    )
))
?>
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
                                <?php if ($this->Membership->handleRole("ADICIONAR_USUARIOS")): ?>
                                    <button type="button" id="btnNovo" class="btn btn-success" onclick="<?= 'window.location = \'' . $this->Url->make('usuario', 'add') . '\'' ?>">Novo</button>
                                <?php endif; ?>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                            <?php echo $this->Form->end(); ?>
                            <div style="min-height: 30px">

                            </div>
                            <?php if ($qtd_usuarios == 0): ?>
                                <div>
                                    <h2>Nenhum usuário encontrado.</h2>
                                </div>
                            <?php else: ?>
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Login</th>
                                            <th>E-mail</th>
                                            <th>Grupo</th>
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
                                                <td><?= $usuario["Permissao"]["nome"] ?></td>
                                                <td><?= $usuario["Usuario"]["ativo"] ? "Sim" : "Não" ?></td>
                                                <td>
                                                    <?php if ($this->Membership->handleRole("EDITAR_USUARIOS")): ?>
                                                        <a href="<?= $this->Url->relative('usuario/edit/' . $usuario["Usuario"]["id"]) ?>" class="btn btn-bitbucket" title="Editar">
                                                            <i class="fa fa-edit">
                                                            </i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($this->Membership->handleRole("EXCLUIR_USUARIOS")): ?>
                                                        <a class="btn btn-google-plus" href="#" onclick="excluir(<?= $usuario["Usuario"]["id"] ?>)" title="Excluir">
                                                            <i class="fa fa-trash">
                                                            </i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?= $this->element("pagination", array("qtd_total" => $qtd_usuarios, "name" => "clientes")) ?>
                </div>
            </div>
        </div>
    </section>
</div>