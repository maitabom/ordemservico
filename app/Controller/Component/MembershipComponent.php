<?php

/**
 * Componente de controle de acesso por meio de controller
 * @author valentim
 */
class MembershipComponent extends Component {

    public $components = array("Session");

    /**
     * Faz tratamento de permissões de tela para usuário, por meio de um controle ou de ação.
     * @param array $url Endereço por meio de controller e action informado.
     * @param mixed $userID ID ou nickname do usuário.
     * @return bool Se o mesmo tem permissão de acessar a tela.
     */
    public function handleRole($url, $userID) {
        $funcao = $this->getFunction($url);
        $autorizado = false;

        if ($funcao != null) {

            $funcoes = ($this->Session->check("USER_FUNCTIONS")) ? $this->Session->read("USER_FUNCTIONS") : $this->getFunctionsUser($userID);

            foreach ($funcoes as $fn) {
                if ($fn["fn"]["chave"] == $funcao) {
                    $autorizado = true;
                    break;
                }
            }
        } else {
            $autorizado = true;
        }

        return $autorizado;
    }

    /**
     * Obtém a função por meio do endereço informado.
     * @param array $url Endereço por meio de controller e action informado.
     * @return string Função relacionada ou nulo, caso não a encontre.
     */
    private function getFunction($url) {
        $roles = $this->actionRoles();
        $function = null;

        foreach ($roles as $key => $value) {
            if (($url["controller"] == $value["controller"]) && ($url["action"] == $value["action"])) {
                $function = $key;
            }
        }

        return $function;
    }

    /**
     * Obtém as funções de acordo com usuário
     * @param mixed $userID ID ou nickname do usuário.
     * @return array Lista de funções permitidas do usuário.
     */
    private function getFunctionsUser($userID) {
        $userModel = ClassRegistry::init("Usuario");
        $roleModel = ClassRegistry::init("Permissao");

        $usuario = $userModel->find("first", array(
            "conditions" => array(
                "OR" => array(
                    "Usuario.nickname" => $userID,
                    "Usuario.id" => $userID
                )
            )
        ));

        $roleID = $usuario["Usuario"]["grupo"];

        $query = "select fn.nome, fn.chave ";
        $query.= "from funcoes fn ";
        $query.= "inner join funcoes_grupos fg ";
        $query.= "on fn.id = fg.funcoes_id ";
        $query.= "where fg.grupos_id = $roleID; ";

        $fs = $roleModel->query($query);

        $this->Session->write("USER_FUNCTIONS", $fs);

        return $fs;
    }

    /**
     * Gera uma lista de funções por controllers e actions
     * @return array Lista de funções por controllers e actions
     */
    private function actionRoles() {
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
