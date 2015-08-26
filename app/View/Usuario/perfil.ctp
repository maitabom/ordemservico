<?= $this->element('menu'); ?>
<?= $this->Session->flash() ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Perfil de <?= $this->Format->firstName($usuario["Usuario"]["nome"]) ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i>Usuários</a></li>
            <li class="active"><a href="<?= $this->Url->relative('/usuario') ?>"><i class="fa fa-info-circle"></i>Perfil do Usuário</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-10" style="font-size: x-large">
                                <b>Usuario</b><br/>
                                <span><?= $usuario["Usuario"]["nickname"] ?></span>
                                <br/>
                                <b>Nome Completo</b><br/>
                                <span><?= $usuario["Usuario"]["nome"] ?></span>
                            </div>
                            <div class="col-xs-2">
                                <?=
                                $this->Html->image("avatar6.png", array(
                                    "height" => "150px",
                                    "width" => "150px"
                                ))
                                ?>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-xs-12">
                                <b>Endereço</b><br/>
                                <span><?= $usuario["Usuario"]["endereco"] ?></span>
                            </div>
                            <div class="col-xs-3">
                                <b>Bairro</b><br/>
                                <span><?= $usuario["Usuario"]["bairro"] ?></span>
                            </div>
                            <div class="col-xs-3">
                                <b>Cidade</b><br/>
                                <span><?= $usuario["Usuario"]["cidade"] ?></span>
                            </div>
                            <div class="col-xs-3">
                                <b>Estado</b><br/>
                                <span><?= $estados[$usuario["Usuario"]["uf"]] ?></span>
                            </div>
                            <div class="col-xs-3">
                                <b>CEP</b><br/>
                                <span><?= $this->Format->zipCode($usuario["Usuario"]["cep"]) ?></span>
                            </div>
                        </div>
                        <div style="height: 20px">

                        </div>
                        <div class="row">
                            <div class="col-xs-3">
                                <b>Telefone</b><br/>
                                <span><?= $this->Format->phone($usuario["Usuario"]["telefone"]) ?></span>
                            </div>
                            <div class="col-xs-3">
                                <b>Celular</b><br/>
                                <span><?= $this->Format->phone($usuario["Usuario"]["celular"]) ?></span>
                            </div>
                            <div class="col-xs-3">
                                <b>Cargo</b><br/>
                                <span><?= $usuario["Usuario"]["cargo"] ?></span>
                            </div>
                            <div class="col-xs-3">
                                <b>Setor</b><br/>
                                <span><?= $usuario["Usuario"]["setor"] ?></span>
                            </div>
                            <div class="col-xs-3">
                                <b>E-mail</b><br/>
                                <span><?= $this->Format->phone($usuario["Usuario"]["email"]) ?></span>
                            </div>
                            <div class="col-xs-3">
                                <b>Grupo de Usuários</b><br/>
                                <span><?= $this->Format->phone($usuario["Permissao"]["nome"]) ?></span>
                            </div>
                            <div class="col-xs-3">
                                <b>Ativo</b><br/>
                                <span><?= $usuario["Usuario"]["ativo"] ? "Sim" : "Não" ?></span>
                            </div>
                        </div>
                        <div style="height: 40px">

                        </div>
                        <?php if ($nick == $this->Session->read("UsuarioUsuario")): ?>
                            <div class="row" style="margin-right: 5px;">
                                <a href="<?= $this->Url->makeParams('usuario', 'password', $usuario["Usuario"]["id"]) ?>" class="btn btn-danger pull-right" style="margin-right: 5px"><i class="fa fa-lock"></i> Alterar Senha</a>
                                <a href="<?= $this->Url->makeParams('usuario', 'editar', $usuario["Usuario"]["id"]) ?>" class="btn btn-primary pull-right" style="margin-right: 5px"><i class="fa fa-edit"></i> Editar</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>