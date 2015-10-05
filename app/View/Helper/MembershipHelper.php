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

            if ($userID == null) {
                return false;
            }
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
     * Executa todo o processo de validação de menu, verificando se o mesmo usuário tem ou não a permissão de acessar o item do menu.
     * @param string $chave Chave do menu do sistema.
     * @param mixed $userID ID o nickname do usuario
     * @return boolean Se o usuário possui ou não a permissão de acessar o sistema.
     */
    public function handleMenu($chave, $userID = null) {

        if (!isset($userID)) {
            $userID = $this->getUser();
        }

        $menu = $this->actionsMenu();

        for ($i = 0; $i < count($menu); $i++) {
            if (array_key_exists("items", $menu[$i])) {
                $menu[$i]["active"] = $this->isAllItemsSubmenus($menu[$i]["items"]);
            }
        }

        $item = $this->getItemMenu($menu, $chave);
        return $item["active"];
    }

    /**
     * Retorna uma coleção do menu.
     * @return array Árvore de coleção de menu.
     */
    public function viewMenu() {
        $menu = $this->actionsMenu();

        for ($i = 0; $i < count($menu); $i++) {
            if (array_key_exists("items", $menu[$i])) {
                $menu[$i]["active"] = $this->isAllItemsSubmenus($menu[$i]["items"]);
            }
        }

        return $menu;
    }

    /**
     * Retorna um item de menu.
     * @param string $chave Chave do menu
     * @return array Item do menu.
     */
    public function getMenu($chave) {
        $menu = $this->actionsMenu();

        for ($i = 0; $i < count($menu); $i++) {
            if (array_key_exists("items", $menu[$i])) {
                $menu[$i]["active"] = $this->isAllItemsSubmenus($menu[$i]["items"]);
            }
        }

        $item = $this->getItemMenu($menu, $chave);

        return $item;
    }

    /**
     * Verifica se todos itens do submenu estão ativos
     * @param type $submenu Coleção de submenus
     * @return boolean Se todo os itens do submenus estão ativos.
     */
    private function isAllItemsSubmenus($submenu) {
        $ativo = false;

        foreach ($submenu as $item) {
            if ($item["active"] == true) {
                $ativo = true;
            }
        }

        return $ativo;
    }

    /**
     * Obtém o item de menu
     * @param array $menu Coleção de itens de menu.
     * @param string $chave Chave de busca de itens de menu.
     * @return array Item de menu.
     */
    private function getItemMenu($menu, $chave) {
        $it = null;

        foreach ($menu as $item) {
            if (array_key_exists("items", $item)) {
                $it = $this->getItemMenu($item["items"], $chave);

                if ($it != null) {
                    break;
                }
            }

            if ($item["chave"] == $chave) {
                $it = $item;
                break;
            }
        }

        return $it;
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
            "EXCLUIR_EQUIPAMENTOS" => ["controller" => "equipamento", "action" => "delete"],
            "LISTAR_MATERIAIS" => ["controller" => "material", "action" => "index"],
            "CADASTRAR_MATERIAIS" => ["controller" => "material", "action" => "add"],
            "EDITAR_MATERIAIS" => ["controller" => "material", "action" => "edit"],
            "EXCLUIR_MATERIAIS" => ["controller" => "material", "action" => "delete"]
        ];

        return $roles;
    }

    /**
     * Retorna uma árvore de menu com validação lógica.
     * @return array Árvore de itens de menu.
     */
    private function actionsMenu() {
        $menu = [
            [
                "chave" => "PAINEL",
                "active" => true,
                "function" => null,
            ],
            [
                "chave" => "USUARIOS",
                "active" => true,
                "function" => null,
                "items" => [
                    [
                        "chave" => "CADASTRO_USUARIO",
                        "active" => $this->handleRole("LISTA_USUARIOS"),
                        "function" => "LISTA_USUARIOS"
                    ],
                    [
                        "chave" => "CADASTRO_PERMISSAO",
                        "active" => $this->handleRole("LISTA_PERMISSOES"),
                        "function" => "LISTA_PERMISSOES"
                    ]
                ]
            ],
            [
                "chave" => "CLIENTES",
                "active" => true,
                "function" => null,
                "items" => [
                    [
                        "chave" => "CADASTRO_CLIENTE",
                        "active" => $this->handleRole("LISTA_CLIENTES"),
                        "function" => "LISTA_CLIENTES"
                    ],
                    [
                        "chave" => "ADICIONAR_CLIENTE",
                        "active" => $this->handleRole("ADICIONAR_CLIENTES"),
                        "function" => "ADICIONAR_CLIENTES"
                    ]
                ]
            ],
            [
                "chave" => "ORDEM_SERVICO",
                "active" => true,
                "function" => null,
                "items" => [
                    [
                        "chave" => "GERAR_ORDEM_SERVICO",
                        "active" => $this->handleRole("ADICIONAR_ORDEM_SERVICO"),
                        "function" => "ADICIONAR_ORDEM_SERVICO"
                    ],
                    [
                        "chave" => "BUSCAR_ORDEM_SERVICO",
                        "active" => $this->handleRole("LISTA_ORDEM_SERVICO"),
                        "function" => "LISTA_ORDEM_SERVICO"
                    ],
                    [
                        "chave" => "TEMPLATES_ORDEM_SERVICO",
                        "active" => $this->handleRole("LISTA_MODELO_ORDEM_SERVICO"),
                        "function" => "LISTA_MODELO_ORDEM_SERVICO"
                    ],
                    [
                        "chave" => "LISTA_PRIORIDADES",
                        "active" => $this->handleRole("LISTA_TAREFAS"),
                        "function" => "LISTA_TAREFAS"
                    ]
                ]
            ],
            [
                "chave" => "OUTROS",
                "active" => true,
                "function" => null,
                "items" => [
                    [
                        "chave" => "EQUIPAMENTOS",
                        "active" => $this->handleRole("LISTA_EQUIPAMENTOS"),
                        "function" => "LISTA_EQUIPAMENTOS"
                    ],
                    [
                        "chave" => "MATERIAIS",
                        "active" => $this->handleRole("LISTAR_MATERIAIS"),
                        "function" => "LISTAR_MATERIAIS"
                    ]
                ]
            ]
        ];

        return $menu;
    }

}
