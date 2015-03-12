<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP OrdemServicoController
 * @author valentim
 */
class OrdemServicoController extends AppController {

    public function index() {

    }

    public function add() {

    }

    public function templates() {

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
