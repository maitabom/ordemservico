<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP SystemController
 * @author valentim
 */
class SystemController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Usuario');
        parent::beforeFilter();
    }

    public function login() {
        if ($this->isAuthorized()) {
            $this->redirect(array("action" => "board"));
        } else {
            $nick = $this->Cookie->read("Usuario.nickname");
            $title = "Controle de Acesso";
            $this->layout = "empty";
            $this->set("title_for_layout", $title);
            $this->set("login", $nick);
        }
    }

    public function logon() {
        if ($this->request->is('post')) {
            $login = $this->request->data["Usuario"]["Usuario"];
            $senha = $this->request->data["Usuario"]["Senha"];
            $lembrar = $this->request->data["Usuario"]["Lembrar"];

            if ($login == "" || $senha == "") {
                $this->redirectLoginError("É obrigatório informar os dados de acesso.");
            } else {

                $retorno = $this->Usuario->find("first", array(
                    "conditions" => array(
                        "Usuario.nickname" => $login,
                        "Usuario.senha" => $senha
                )));

                if (!empty($retorno)) {
                    if ($retorno["Usuario"]["ativo"] == false) {
                        $this->redirectLoginError("O usuário encontra-se inativo para o sistema.");
                    }

                    $this->Session->write("UsuarioID", $retorno["Usuario"]["ID"]);
                    $this->Session->write("UsuarioUsuario", $login);
                    $this->Session->write("UsuarioEmail", $retorno["Usuario"]["email"]);
                    $this->Session->write("UsuarioNome", $retorno["Usuario"]["nome"]);
                    $this->Session->write("UsuarioCargo", $retorno["Usuario"]["cargo"]);
                    $this->Session->write("Usuario", $retorno);

                    if ($lembrar) {
                        $this->Cookie->write("Usuario.nickname", $retorno["Usuario"]["nickname"], false, "5 days");
                    }

                    if ($retorno["Usuario"]["verificar"] == true) {
                        $this->redirect(array("action" => "password"));
                    } else {
                        $this->redirect(array("action" => "board"));
                    }
                } else {
                    $this->redirectLoginError("Os dados de acesso estão invalidos.");
                }
            }
        }
    }

    public function logoff() {
        $this->Session->destroy();
        $this->redirect(array("action" => "login"));
    }

    public function password() {

    }

    public function board() {
        $title = "Painel";
        $this->set("title_for_layout", $title);
    }

}
