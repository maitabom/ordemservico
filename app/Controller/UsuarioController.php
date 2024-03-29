<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP UsuarioController
 * @author valentim
 */
class UsuarioController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Usuario');
        $this->loadModel('Permissao');
        $this->controlAuth();
        parent::beforeFilter();
    }

    public function index() {

        $conditions = array();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $mostrar = $data["Usuario"]["mostra"];

            $conditions["Usuario.nome LIKE"] = "%" . $data["Usuario"]["nome"] . "%";
            $conditions["Usuario.nickname LIKE"] = "%" . $data["Usuario"]["nickname"] . "%";
            $conditions["Usuario.email LIKE"] = "%" . $data["Usuario"]["email"] . "%";

            if ($mostrar != "T") {
                $conditions["Usuario.ativo"] = ($mostrar == "A") ? "1" : "0";
            }

            $this->Session->write("BUSCA_USUARIOS", $conditions);
        } else {
            $conditions = $this->Session->read("BUSCA_USUARIOS");
        }

        $options = array(
            "conditions" => $conditions,
            "order" => array(
                "Usuario.nome" => "ASC"
            ),
            "limit" => $this->limit_pagination
        );

        $this->paginate = $options;
        $usuarios = $this->paginate("Usuario");
        $qtd_usuarios = $this->Usuario->find("count", array("conditions" => $conditions));

        $combo_mostra = ["T" => "Todos", "A" => "Somente ativos", "I" => "Somente inativos"];

        $title = "Lista de Usuários";
        $this->set("title_for_layout", $title);
        $this->set("combo_mostra", $combo_mostra);
        $this->set("usuarios", $usuarios);
        $this->set("qtd_usuarios", $qtd_usuarios);
    }

    public function busca() {
        $this->Session->delete("BUSCA_USUARIOS");
        $this->redirect(array("action" => "index"));
    }

    public function perfil($user) {

        $usuario = $this->Usuario->find("first", array(
            "conditions" => array(
                "Usuario.nickname" => $user
            )
        ));

        $estados = $this->Geo->listaUf();

        $this->set("usuario", $usuario);
        $this->set("nick", $user);
        $this->set("estados", $estados);
    }

    public function add() {
        $this->redirect(array("action" => "cadastro", 0));
    }

    public function edit($id) {
        $this->redirect(array("action" => "cadastro", $id));
    }

    public function password($id) {
        $title = "Alterar Senha";
        $usuario = $this->Usuario->read(null, $id);

        $this->set("title_for_layout", $title);
        $this->set("id_usuario", $id);
        $this->set("usuario", $usuario);
        $this->set("senha_atual", $usuario["Usuario"]["senha"]);
        $this->set("nickname", $usuario["Usuario"]["nickname"]);
    }

    public function editar($id) {
        $title = "Edição do Usuário";
        $usuario = $this->Usuario->read(null, $id);
        $estados = $this->Geo->listaUf();
        $permissoes = $this->Permissao->find('list', array(
            'fields' => array('id', 'nome'),
            "conditions" => array(
                "Permissao.ativo" => true
            )
        ));

        $this->request->data = $usuario;

        $this->set("title_for_layout", $title);
        $this->set("id_usuario", $id);
        $this->set("estados", $estados);
        $this->set("permissoes", $permissoes);
        $this->set("nickname", $usuario["Usuario"]["nickname"]);
    }

    public function delete() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $data["question"]["parameter"];

            $marcado = $this->Usuario->read(null, $id);
            $nome = $marcado["Usuario"]["nome"];

            try {
                $this->Usuario->id = $id;
                $this->Usuario->delete();

                $this->Dialog->alert("O usuário $nome foi excluido do sucesso!");
                $this->redirect(array("action" => "index"));
            } catch (Exception $ex) {
                $mensagem = "Ocorreu um erro no sistema ao excluir o usuário.";
                $this->Dialog->error($mensagem, $ex->getMessage());
                $this->redirect(array("action" => "index"));
            }
        }
    }

    public function save() {
        if ($this->request->is('post') || $this->request->is('put')) {

            $data = $this->request->data;
            $mensagem = "";

            $data["Usuario"]["cep"] = $this->Format->clearMask($data["Usuario"]["cep"]);
            $data["Usuario"]["telefone"] = $this->Format->clearMask($data["Usuario"]["telefone"]);
            $data["Usuario"]["celular"] = $this->Format->clearMask($data["Usuario"]["celular"]);

            $destino = unserialize($data["Usuario"]["destino"]);

            try {

                $pivot = $this->Usuario->findById($data["Usuario"]["id"]);

                if ($this->request->is('put') && ($pivot["Usuario"]["nickname"] != $data["Usuario"]["nickname"])) {
                    $un = $this->Usuario->find("count", array(
                        "conditions" => array(
                            "Usuario.nickname" => $data["Usuario"]["nickname"]
                        )
                    ));

                    if ($un > 0) {
                        throw new Exception("Existe um usuário com o nick escolhido.");
                    }
                }

                $this->Usuario->save($data);
                $this->Dialog->alert("O usuário foi salvo com sucesso.");

                if ($this->request->is('put')) {
                    $this->redirect($destino);
                } else if ($this->request->is('post')) {
                    $id = $this->Usuario->id;
                    $this->redirect(array("action" => "cadastro", $id));
                }
            } catch (Exception $ex) {
                $mensagem = "Ocorreu um erro no sistema ao salvar o usuário.";
                $this->Dialog->error($mensagem, $ex->getMessage());
                $this->redirect(array("action" => "cadastro", $data["Usuario"]["id"]));
            }
        }
    }

    public function cadastro($id) {
        $title = ($id > 0) ? "Edição do Usuário" : "Novo Usuário";
        $estados = $this->Geo->listaUf();
        $permissoes = $this->Permissao->find('list', array(
            'fields' => array('id', 'nome'),
            "conditions" => array(
                "Permissao.ativo" => true
            )
        ));

        if ($id > 0) {
            $this->request->data = $this->Usuario->read(null, $id);
        }

        $this->set("title_for_layout", $title);
        $this->set("id_usuario", $id);
        $this->set("estados", $estados);
        $this->set("permissoes", $permissoes);
    }

    public function change() {
        try {
            $data = $this->request->data;
            $id = $data["Usuario"]["id"];
            $senha = $data["Usuario"]["senha_nova"];

            $this->Usuario->id = $id;
            $this->Usuario->saveField("senha", $senha);

            $this->Dialog->alert("A senha foi alterada com sucesso.");
            $this->redirect(array("action" => "perfil", $this->Session->read("UsuarioUsuario")));
        } catch (Exception $ex) {
            $mensagem = "Ocorreu um erro no sistema ao salvar o usuário.";
            $this->Dialog->error($mensagem, $ex->getMessage());
            $this->redirect(array("action" => "perfil", $this->Session->read("UsuarioUsuario")));
        }
    }

}
