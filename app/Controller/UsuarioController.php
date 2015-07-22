<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP UsuarioController
 * @author valentim
 */
class UsuarioController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Usuario');
        $this->loadModel('Permissao');
        $this->controlAuth();
        parent::beforeFilter();
    }

    public function index() {

        $conditions = array();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $mostrar = $data["Usuario"]["mostra"];

            $conditions["Usuario.nome LIKE"] = "%" . $data["Usuario"]["nome"] . "%";
            $conditions["Usuario.nickname LIKE"] = "%" . $data["Usuario"]["nickname"] . "%";
            $conditions["Usuario.email LIKE"] = "%" . $data["Usuario"]["email"] . "%";

            if ($mostrar != "T") {
                $conditions["Usuario.ativo"] = ($mostrar == "A") ? "1" : "0";
            }
        }

        $options = array(
            "conditions" => $conditions,
            "order" => array(
                "Usuario.nome" => "ASC"
            ),
            "limit" => $this->limit_pagination
        );

        $this->paginate = $options;
        $usuarios = $this->paginate("Usuario");
        $qtd_usuarios = $this->Usuario->find("count", array("conditions" => $conditions));

        $combo_mostra = ["T" => "Todos", "A" => "Somente ativos", "I" => "Somente inativos"];

        $title = "Lista de Usuários";
        $this->set("title_for_layout", $title);
        $this->set("combo_mostra", $combo_mostra);
        $this->set("usuarios", $usuarios);
        $this->set("qtd_usuarios", $qtd_usuarios);
    }

    public function perfil($user) {
        $this->set("usuario", $user);
    }

    public function add() {
        $this->redirect(array("action" => "cadastro", 0));
    }

    public function edit($id) {
        $this->redirect(array("action" => "cadastro", $id));
    }

    public function delete() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $data["question"]["parameter"];

            $marcado = $this->Usuario->read(null, $id);
            $nome = $marcado["Usuario"]["nome"];

            try {
                $this->Usuario->id = $id;
                $this->Usuario->delete();

                $this->Dialog->alert("O usuário $nome foi excluido do sucesso!");
                $this->redirect(array("action" => "index"));
            } catch (Exception $ex) {
                $mensagem = "Ocorreu um erro no sistema ao excluir o usuário.";
                $this->Dialog->error($mensagem, $ex->getMessage());
                $this->redirect(array("action" => "index"));
            }
        }
    }

    public function save() {
        if ($this->request->is('post') || $this->request->is('put')) {

            $data = $this->request->data;
            $mensagem = "";

            $data["Usuario"]["cep"] = $this->Format->clearMask($data["Usuario"]["cep"]);
            $data["Usuario"]["telefone"] = $this->Format->clearMask($data["Usuario"]["telefone"]);
            $data["Usuario"]["celular"] = $this->Format->clearMask($data["Usuario"]["celular"]);

            try {
                $this->Usuario->save($data);
                $this->Dialog->alert("O usuário foi salvo com sucesso.");
                $id = $this->Usuario->id;

                $this->redirect(array("action" => "cadastro", $id));
            } catch (Exception $ex) {
                $mensagem = "Ocorreu um erro no sistema ao salvar o usuário.";
                $this->Dialog->error($mensagem, $ex->getMessage());
                $this->redirect(array("action" => "cadastro", $data["Usuario"]["id"]));
            }
        }
    }

    public function cadastro($id) {
        $title = ($id > 0) ? "Edição do Usuário" : "Novo Usuário";
        $estados = $this->Geo->listaUf();
        $permissoes = $this->Permissao->find('list', array('fields' => array('id', 'nome')));

        if ($id > 0) {
            $this->request->data = $this->Usuario->read(null, $id);
        }

        $this->set("title_for_layout", $title);
        $this->set("id_usuario", $id);
        $this->set("estados", $estados);
        $this->set("permissoes", $permissoes);
    }

}
