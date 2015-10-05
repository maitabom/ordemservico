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

            $role = $this->getRole($url);

            if (!$role[$funcao]["public"]) {

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
        } else {
            $autorizado = true;
        }

        return $autorizado;
    }

    /**
     * Libera o acesso publico de uma determinada funçao.
     * @param type $url Endereço por meio de controller e action informado.
     * @return boolean Se o endereço e publico, retirando a necessidade de validaçao por sessao.
     */
    public function handlePublicRole($url) {
        $function = $this->getFunction($url);
        $role = $this->getRole($url);
        $autorizado = false;

        if ($role[$function]["public"]) {
            $autorizado = true;
        }

        return $autorizado;
    }

    /**
     * Obtém a função por meio do endereço informado.
     * @param array $url Endereço por meio de controller e action informado.
     * @param boolean $public Realiza a busca entre as funções públicas.
     * @return string Função relacionada ou nulo, caso não a encontre.
     */
    private function getFunction($url) {
        $roles = $this->actionRoles();
        $function = null;

        foreach ($roles as $key => $value) {
            if (($url["controller"] == $value["controller"]) && ($url["action"] == $value["action"])) {
                $function = $key;
                break;
            }
        }

        return $function;
    }

    private function getRole($url) {
        $roles = $this->actionRoles();
        $role = null;

        foreach ($roles as $key => $value) {
            if (($url["controller"] == $value["controller"]) && ($url["action"] == $value["action"])) {
                $role = [$key => $value];
                break;
            }
        }

        return $role;
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
            "LISTA_USUARIOS" => ["controller" => "usuario", "action" => "index", "public" => false],
            "ADICIONAR_USUARIOS" => ["controller" => "usuario", "action" => "add", "public" => false],
            "EDITAR_USUARIOS" => ["controller" => "usuario", "action" => "edit", "public" => false],
            "EXCLUIR_USUARIOS" => ["controller" => "usuario", "action" => "delete", "public" => false],
            "LISTA_PERMISSOES" => ["controller" => "permissao", "action" => "index", "public" => false],
            "ADICIONAR_PERMISSOES" => ["controller" => "permissao", "action" => "add", "public" => false],
            "EDITAR_PERMISSOES" => ["controller" => "permissao", "action" => "edit", "public" => false],
            "EXCLUIR_PERMISSOES" => ["controller" => "permissao", "action" => "delete", "public" => false],
            "LISTA_CLIENTES" => ["controller" => "cliente", "action" => "index", "public" => false],
            "ADICIONAR_CLIENTES" => ["controller" => "cliente", "action" => "add", "public" => false],
            "EDITAR_CLIENTES" => ["controller" => "cliente", "action" => "edit", "public" => false],
            "EXCLUIR_CLIENTES" => ["controller" => "cliente", "action" => "delete", "public" => false],
            "LISTA_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "index", "public" => false],
            "ADICIONAR_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "add", "public" => false],
            "EDITAR_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "edit", "public" => false],
            "VISUALIZAR_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "documento", "public" => false],
            "CANCELAR_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "cancelar", "public" => false],
            "CONCLUIR_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "concluir", "public" => false],
            "LISTA_TAREFAS" => ["controller" => "ordem_servico", "action" => "prioridades", "public" => true],
            "LISTA_MODELO_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "templates", "public" => false],
            "CADASTRAR_MODELO_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "template_create", "public" => false],
            "EDITAR_MODELO_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "template_edit", "public" => false],
            "EXCLUIR_MODELO_ORDEM_SERVICO" => ["controller" => "ordem_servico", "action" => "delete", "public" => false],
            "LISTA_EQUIPAMENTOS" => ["controller" => "equipamento", "action" => "index", "public" => false],
            "CADASTRAR_EQUIPAMENTOS" => ["controller" => "equipamento", "action" => "add", "public" => false],
            "EDITAR_EQUIPAMENTOS" => ["controller" => "equipamento", "action" => "edit", "public" => false],
            "EXCLUIR_EQUIPAMENTOS" => ["controller" => "equipamento", "action" => "delete", "public" => false],
            "LISTAR_MATERIAIS" => ["controller" => "material", "action" => "index", "public" => false],
            "CADASTRAR_MATERIAIS" => ["controller" => "material", "action" => "add", "public" => false],
            "EDITAR_MATERIAIS" => ["controller" => "material", "action" => "edit", "public" => false],
            "EXCLUIR_MATERIAIS" => ["controller" => "material", "action" => "delete", "public" => false]
        ];

        return $roles;
    }

}
