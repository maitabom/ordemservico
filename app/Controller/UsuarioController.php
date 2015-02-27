<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP UsuarioController
 * @author valentim
 */
class UsuarioController extends AppController {

    public function index() {

    }

    public function perfil($user) {
        $this->set("usuario", $user);
    }

}
