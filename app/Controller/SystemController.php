<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP SystemController
 * @author valentim
 */
class SystemController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Usuario');
        $this->loadModel('OrdemServico');
        $this->loadModel('Cliente');
        parent::beforeFilter();
    }

    public function login() {
        if ($this->isAuthorized()) {

            $usuario = $this->Session->read("Usuario");

            if ($usuario["Usuario"]["verificar"] == true) {
                $this->Session->destroy();
                $this->redirect(array("action" => "login"));
            } else {
                $this->redirect(array("action" => "board"));
            }
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
                        $this->Session->destroy();
                        $this->redirectLogin("O usuário encontra-se inativo para o sistema.");
                    }

                    if ($retorno["Permissao"]["ativo"] == false) {
                        $this->Session->destroy();
                        $this->redirectLogin("O usuário encontra-se em um grupo de usuário inativo.");
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

    public function forget() {
        $title = "Esqueci Minha Senha";

        $this->layout = "empty";
        $this->set("title_for_layout", $title);
    }

    public function remember($id) {
        if ($this->request->is('post')) {
            $email = $this->request->data["Usuario"]["email"];
            $retorno = $this->Usuario->find("first", array("conditions" => array("Usuario.email" => $email)));

            if (empty($retorno)) {
                $this->Session->setFlash("Não existe usuário com e-mail cadastrado.");
            } else {
                $idUsuario = $retorno["Usuario"]["id"];
                $token = $this->Tokin->createToken($idUsuario, "lembrarsenha");

                $header = array(
                    "name" => $this->nameSystem,
                    "from" => "noreply@mthlopes.com.br",
                    "to" => $email,
                    "subject" => "Ordem de Serviço - Lembrete de Senha"
                );

                $params = array(
                    "nome" => $retorno["Usuario"]["nome"],
                    "token" => $token
                );

                $this->Sender->foo();

                if ($this->Sender->sendEmailTemplate($header, "lembrarsenha", $params)) {
                    $this->Session->setFlash("A mensagem foi enviada com sucesso!");
                } else {
                    $this->Session->setFlash("Ocorreu um erro ao enviar a mensagem");
                }
            }

            $this->redirect(array("action" => "forget"));
        } else {
            $idUsuario = base64_decode($id);
            $usuario = $this->Usuario->find("first", array("conditions" => array("Usuario.id" => $idUsuario)));

            $this->Session->write("UsuarioID", $usuario["Usuario"]["id"]);
            $this->Session->write("UsuarioUsuario", $usuario["Usuario"]["nickname"]);
            $this->Session->write("UsuarioEmail", $usuario["Usuario"]["email"]);
            $this->Session->write("UsuarioNome", $usuario["Usuario"]["nome"]);
            $this->Session->write("UsuarioCargo", $usuario["Usuario"]["cargo"]);
            $this->Session->write("Usuario", $usuario);

            $this->Session->setFlash("Favor, troque sua senha");
            $this->redirect(array("action" => "password"));
        }
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
                        $mensagem = "Ocorreu um erro no sistema ao salvar o usuário.";
                        $this->Session->setFlash($mensagem);
                        $this->redirect(array("action" => "password"));
                    }
                }
            }
        }
    }

    public function board() {

        if ($this->isAuthorized()) {

            $options = array(
                "conditions" => array(
                    "OrdemServico.cancelado" => false,
                    "OrdemServico.concluido" => false
                ),
                "order" => array(
                    "OrdemServico.id" => "DESC"
                ),
                "limit" => 5
            );

            $options_ativos = array(
                "conditions" => array(
                    "OrdemServico.cancelado" => false,
                    "OrdemServico.concluido" => false
                ),
                "order" => array(
                    "OrdemServico.id" => "DESC"
                )
            );

            $options_concluidos = array(
                "conditions" => array(
                    "OrdemServico.concluido" => true
                ),
                "order" => array(
                    "OrdemServico.id" => "DESC"
                )
            );

            $options_cancelados = array(
                "conditions" => array(
                    "OrdemServico.cancelado" => true
                ),
                "order" => array(
                    "OrdemServico.id" => "DESC"
                )
            );

            $ordem_servico = $this->OrdemServico->find("all", $options);
            $qtd_ordens = $this->OrdemServico->find("count", $options_ativos);
            $qtd_ordens_concluidas = $this->OrdemServico->find("count", $options_concluidos);
            $qtd_ordens_canceladas = $this->OrdemServico->find("count", $options_cancelados);
            $qtd_clientes = $this->Cliente->find("count");

            $title = "Painel";

            $this->set("title_for_layout", $title);
            $this->set("ordens_servicos", $ordem_servico);
            $this->set("tarefas_ativas", $qtd_ordens);
            $this->set("tarefas_concluidas", $qtd_ordens_concluidas);
            $this->set("tarefas_canceladas", $qtd_ordens_canceladas);
            $this->set("clientes", $qtd_clientes);
        } else {
            $this->Session->setFlash("A sessão do usuário foi expirada.");
            $this->redirect(array("action" => "login"));
        }
    }

}
