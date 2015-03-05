<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP ClienteController
 * @author valentim
 */
class ClienteController extends AppController {

    public function index() {

    }

    public function add() {
        $this->redirect(array("action" => "cadastro", 0));
    }

    public function edit($id) {
        $this->redirect(array("action" => "cadastro", $id));
    }

    public function cadastro($id) {
        $title = ($id > 0) ? "Editar Cliente" : "Novo Cliente";
        $this->set("title_for_layout", $title);
        $this->set("id_cliente", $id);
    }

}
