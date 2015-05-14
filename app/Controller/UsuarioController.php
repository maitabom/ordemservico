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
        parent::beforeFilter();
    }

    public function index() {
        $title = "Lista de Usuários";
        $this->set("title_for_layout", $title);
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

    public function save() {

        if ($this->request->is('post')) {

            $data = $this->request->data;
            $mensagem = "";

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

        //TODO: Implementar o cadastro de permissões
        $permissoes = $this->Permissao->find('list', array('fields' => array('id', 'nome')));

        $this->set("title_for_layout", $title);
        $this->set("id_usuario", $id);
        $this->set("estados", $estados);
        $this->set("permissoes", $permissoes);
    }

}
