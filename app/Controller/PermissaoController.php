<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP PermissaoController
 * @author valentim
 */
class PermissaoController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Usuario');
        $this->loadModel('Permissao');
        $this->loadModel('Funcao');
        parent::beforeFilter();
    }

    public function index() {

    }

    public function add() {
        $this->redirect(array("action" => "cadastro", 0));
    }

    public function edit($id) {
        $this->redirect(array("action" => "cadastro", $id));
    }

    public function cadastro($id) {
        $title = ($id > 0) ? "Editar Permissão" : "Nova Permissão";
        $funcoes = $this->Funcao->find('all', array('fields' => array('nome', 'chave')));

        $this->set("title_for_layout", $title);
        $this->set("id_usuario", $id);
        $this->set("funcoes", $funcoes);
    }

}
