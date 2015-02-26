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

    }

    public function logoff() {
        
    }

}
