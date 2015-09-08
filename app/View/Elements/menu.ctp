<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <?php if ($this->Membership->handleMenu("PAINEL")): ?>
                <li class="treeview">
                    <a href="<?= $this->Url->relative('/painel') ?>">
                        <i class="fa fa-dashboard"></i> <span>Painel</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($this->Membership->handleMenu("USUARIOS")): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Usuários</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($this->Membership->handleMenu("CADASTRO_USUARIO")): ?>
                            <li><a href="<?= $this->Url->make('usuario') ?>"><i class="fa fa-user"></i>Cadastro de Usuários</a></li>
                        <?php endif; ?>
                        <?php if ($this->Membership->handleMenu("CADASTRO_PERMISSAO")): ?>
                            <li><a href="<?= $this->Url->make('permissao') ?>"><i class="fa fa-shield"></i>Permissões</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($this->Membership->handleMenu("CLIENTES")): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-briefcase"></i>
                        <span>Clientes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($this->Membership->handleMenu("CADASTRO_CLIENTE")): ?>
                            <li><a href="<?= $this->Url->make('cliente') ?>"><i class="fa fa-circle-o"></i> Cadastro de Clientes</a></li>
                        <?php endif; ?>
                        <?php if ($this->Membership->handleMenu("ADICIONAR_CLIENTE")): ?>
                            <li><a href="<?= $this->Url->make('cliente', 'add') ?>"><i class="fa fa-plus-circle"></i> Novo Cliente</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($this->Membership->handleMenu("ORDEM_SERVICO")): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Ordem de Serviço</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($this->Membership->handleMenu("GERAR_ORDEM_SERVICO")): ?>
                            <li><a href="<?= $this->Url->make('ordem_servico', 'add') ?>"><i class="fa fa-plus-circle"></i> Gerar Ordem de Serviço</a></li>
                        <?php endif; ?>
                        <?php if ($this->Membership->handleMenu("BUSCAR_ORDEM_SERVICO")): ?>
                            <li><a href="<?= $this->Url->make('ordem_servico') ?>"><i class="fa fa-search"></i> Buscar</a></li>
                        <?php endif; ?>
                        <?php if ($this->Membership->handleMenu("TEMPLATES_ORDEM_SERVICO")): ?>
                            <li><a href="<?= $this->Url->make('ordem_servico', 'templates') ?>"><i class="fa fa-bookmark"></i> Templates</a></li>
                        <?php endif; ?>
                        <?php if ($this->Membership->handleMenu("LISTA_PRIORIDADES")): ?>
                            <li><a href="<?= $this->Url->make('ordem_servico', 'prioridades') ?>"><i class="fa fa-bars"></i> Lista de Tarefas</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($this->Membership->handleMenu("OUTROS")): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-gear"></i>
                        <span>Outros</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($this->Membership->handleMenu("EQUIPAMENTOS")): ?>
                            <li><a href="<?= $this->Url->make('equipamento') ?>"><i class="fa fa-print"></i> Equipamentos</a></li>
                        <?php endif; ?>
                        <li><a href="<?= $this->Url->make('material') ?>"><i class="fa fa-puzzle-piece"></i> Materiais</a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>