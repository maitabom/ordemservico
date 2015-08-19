<?php

/**
 * Classe de manutenção de acesso dos componentes e de tela.
 * @author valentim
 */
class MembershipHelper extends AppHelper {

    public $helpers = array("Session");

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
    }

    /**
     * Faz tratamento de permissões de tela para usuário.
     * @param string $function Chave da função
     * @param mixed $userID ID o nickname do usuario
     * @return boolean Se o usuário possui a permissão de acessar o componente.
     * @throws InternalErrorException O método de validação de componentes, está chamando uma função inválida.
     */
    public function handleRole($function, $userID = null) {

        if (!isset($userID)) {
            $userID = $this->getUser();
        }

        if (!$this->isFunction($function)) {
            throw new InternalErrorException("O método de validação de componentes, está chamando uma função inválida.");
        }

        $funcoes = ($this->Session->check("USER_FUNCTIONS")) ? $this->Session->read("USER_FUNCTIONS") : $this->getFunctionsUser($userID);
        $autorizado = false;

        foreach ($funcoes as $fn) {
            if ($fn["fn"]["chave"] == $function) {
                $autorizado = true;
                break;
            }
        }

        return $autorizado;
    }

    /**
     * Obtém o usuário corrente logado do sistema.
     * @return int ID do usuário;
     */
    private function getUser() {
        return $this->Session->read("UsuarioID");
    }

    /**
     * Verifica se a chave selecionada é de uma função existente
     * @param type $function Chave da função.
     * @return boolean A função é válida
     */
    private function isFunction($function) {
        $roles = $this->actionRoles();
        $valido = false;

        foreach ($roles as $key => $value) {
            if ($function == $key) {
                $valido = true;
            }
        }

        return $valido;
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

        CakeSession::write("USER_FUNCTIONS", $fs);

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
