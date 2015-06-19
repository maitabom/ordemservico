<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP EquipamentoController
 * @author valentim
 */
class EquipamentoController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Equipamento');
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
        $title = ($id > 0) ? "Editar Equipamento" : "Novo Equipamento";

        $this->set("title_for_layout", $title);
        $this->set("id_equipamento", $id);
    }

}
