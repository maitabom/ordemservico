<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="treeview">
                <a href="<?= $this->Url->relative('/painel') ?>">
                    <i class="fa fa-dashboard"></i> <span>Painel</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Usuários</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= $this->Url->make('usuario') ?>"><i class="fa fa-user"></i>Cadastro de Usuários</a></li>
                    <li><a href="<?= $this->Url->make('permissao') ?>"><i class="fa fa-shield"></i>Permissões</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span>Clientes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= $this->Url->make('cliente') ?>"><i class="fa fa-circle-o"></i> Cadastro de Clientes</a></li>
                    <li><a href="<?= $this->Url->make('cliente', 'add') ?>"><i class="fa fa-plus-circle"></i> Novo Cliente</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Ordem de Serviço</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= $this->Url->make('ordem_servico', 'add') ?>"><i class="fa fa-plus-circle"></i> Gerar Ordem de Serviço</a></li>
                    <li><a href="<?= $this->Url->make('ordem_servico') ?>"><i class="fa fa-search"></i> Buscar</a></li>
                    <li><a href="<?= $this->Url->make('ordem_servico', 'templates') ?>"><i class="fa fa-bookmark"></i> Templates</a></li>
                    <li><a href="<?= $this->Url->make('ordem_servico', 'prioridades') ?>"><i class="fa fa-bars"></i> Lista de Tarefas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>Outros</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= $this->Url->make('equipamento') ?>"><i class="fa fa-print"></i> Equipamentos</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>