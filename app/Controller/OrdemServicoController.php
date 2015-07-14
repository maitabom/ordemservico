<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP OrdemServicoController
 * @author valentim
 */
class OrdemServicoController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Cliente');
        $this->loadModel('OrdemServico');
        $this->loadModel('Equipamento');
        $this->controlAuth();
        parent::beforeFilter();
    }

    public function index() {

    }

    public function add() {

    }

    public function edit($id) {
        $this->set("id", $id);
    }

    public function templates() {

    }

    public function template_edit($id) {
        $this->set("id", $id);
    }

    public function prioridades() {

    }

    public function documento($id) {
        $this->set("id", $id);
    }

    public function imprimir($id) {
        $this->layout = "print";
        $this->set("id", $id);
    }

}
