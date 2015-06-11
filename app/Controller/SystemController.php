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
                $this->redirectLogin("É obrigatório informar os dados de acesso.");
            } else {

                $retorno = $this->Usuario->find("first", array(
                    "conditions" => array(
                        "Usuario.nickname" => $login,
                        "Usuario.senha" => $senha
                )));

                if (!empty($retorno)) {
                    if ($retorno["Usuario"]["ativo"] == false) {
                        $this->redirectLogin("O usuário encontra-se inativo para o sistema.");
                    }

                    $this->Session->write("UsuarioID", $retorno["Usuario"]["id"]);
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
                    $this->redirectLogin("Os dados de acesso estão invalidos.");
                }
            }
        }
    }

    public function logoff() {
        $this->Session->destroy();
        $this->redirect(array("action" => "login"));
    }

    public function password() {
        $title = "Mudar a Senha";

        $this->layout = "empty";
        $this->set("title_for_layout", $title);
    }

    public function confirmy() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $senha = $data["Usuario"]["senha"];
            $senha_confirma = $data["Usuario"]["senha-confirma"];

            if ($senha == "" || $senha_confirma == "") {
                $this->Session->setFlash("É obrigatório informar a senha.");
                $this->redirect(array("action" => "password"));
            } else {

                $id_usuario = $this->Session->read("UsuarioID");
                $pivot = $this->Usuario->read(null, $id_usuario);

                if ($pivot["Usuario"]["senha"] == $senha) {
                    $this->Session->setFlash("A nova senha deve ser diferente da senha atual.");
                    $this->redirect(array("action" => "password"));
                } else {

                    $query = "";

                    try {
                        $query = "update usuarios set ";
                        $query.= "senha = '$senha', ";
                        $query.= "verificar = 0 ";
                        $query.= "where id = $id_usuario; ";

                        $this->Usuario->query($query);
                        $this->Session->destroy();
                        $this->Session->setFlash("A senha foi alterada com sucesso.");

                        $this->redirect(array("action" => "login"));
                    } catch (Exception $ex) {
                        $mensagem = "Ocorreu um erro no sistema ao salvar o usuário.<br/>" . $ex->getMessage() . "<br/>" . $query;
                        $this->Session->setFlash($mensagem);
                        $this->redirect(array("action" => "password"));
                    }
                }
            }
        }
    }

    public function board() {
        $title = "Painel";
        $this->set("title_for_layout", $title);
    }

}
