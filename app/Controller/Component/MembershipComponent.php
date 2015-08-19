<?php

/**
 * Componente de controle de acesso por meio de controller
 * @author valentim
 */
class MembershipComponent extends Component {

    public $components = array();

    public function actionRoles() {
        $roles = [
            "LISTA_USUARIOS" => ["controller" => "usuario", "action" => "index"],
            "ADICIONAR_USUARIOS" => ["controller" => "usuario", "action" => "add"],
            "EDITAR_USUARIOS" => ["controller" => "usuario", "action" => "edit"],
            "EXCLUIR_USUARIOS" => ["controller" => "usuario", "action" => "delete"],
            "LISTA_PERMISSOES" => ["controller" => "permissao", "action" => "index"],
            "ADICIONAR_PERMISSOES" => ["controller" => "permissao", "action" => "add"],
            "EDITAR_PERMISSOES" => ["controller" => "permissao", "action" => "edit"],
            "EXCLUIR_PERMISSOES" => ["controller" => "permissao", "action" => "delete"],
            "LISTA_CLIENTES" => ["controller" => "cliente", "action" => "index"],
            "ADICIONAR_CLIENTES" => ["controller" => "cliente", "action" => "add"],
            "EDITAR_CLIENTES" => ["controller" => "cliente", "action" => "edit"],
            "EXCLUIR_CLIENTES" => ["controller" => "cliente", "action" => "delete"],
            "LISTA_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "index"],
            "ADICIONAR_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "add"],
            "EDITAR_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "edit"],
            "VISUALIZAR_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "documento"],
            "CANCELAR_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "cancelar"],
            "CONCLUIR_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "concluir"],
            "LISTA_TAREFAS" => ["controller" => "ordem_servico", "action" => "prioridades"],
            "LISTA_MODELO_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "templates"],
            "CADASTRAR_MODELO_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "template_create"],
            "EDITAR_MODELO_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "template_edit"],
            "EXCLUIR_MODELO_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "delete"],
            "LISTA_EQUIPAMENTOS" => ["controller" => "equipamento", "action" => "index"],
            "CADASTRAR_EQUIPAMENTOS" => ["controller" => "equipamento", "action" => "add"],
            "EDITAR_EQUIPAMENTOS" => ["controller" => "equipamento", "action" => "edit"],
            "EXCLUIR_EQUIPAMENTOS" => ["controller" => "equipamento", "action" => "delete"]
        ];

        return $roles;
    }

}
