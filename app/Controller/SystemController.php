<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP SystemController
 * @author valentim
 */
class SystemController extends AppController {

    public function login() {
        $title = "Controle de Acesso";
        $this->layout = "empty";
        $this->set("title_for_layout", $title);
    }

    public function logon() {
        $this->redirect(array("action" => "board"));
    }

    public function logoff() {
        $this->redirect(array("action" => "login"));
    }

    public function board() {
        $title = "Painel";
        $this->set("title_for_layout", $title);
    }

}
