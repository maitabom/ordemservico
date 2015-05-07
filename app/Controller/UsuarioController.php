<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP UsuarioController
 * @author valentim
 */
class UsuarioController extends AppController {

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

    public function cadastro($id) {
        $title = ($id > 0) ? "Edição do Usuário" : "Novo Usuário";
        $estados = $this->Geo->listaUf();

        //TODO: Implementar o cadastro de permissões
        $permissoes = ["1" => "Administrador", "2" => "Gerente", "3" => "Operacional"];

        $this->set("title_for_layout", $title);
        $this->set("id_usuario", $id);
        $this->set("estados", $estados);
        $this->set("permissoes", $permissoes);
    }

}
