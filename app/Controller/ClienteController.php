<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP ClienteController
 * @author valentim
 */
class ClienteController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Cliente');
        parent::beforeFilter();
    }

    public function index() {
        $clientes = $this->Cliente->find('all');
        $title = "Lista de Clientes";

        $this->set("title_for_layout", $title);
        $this->set("clientes", $clientes);
    }

    public function add() {
        $this->redirect(array("action" => "cadastro", 0));
    }

    public function edit($id) {
        $this->redirect(array("action" => "cadastro", $id));
    }

    public function cadastro($id) {
        $title = ($id > 0) ? "Editar Cliente" : "Novo Cliente";
        $estados = $this->Geo->listaUf();
        $tipos_pessoas = ["F" => "Pessoa Física", "J" => "Pessoa Jurídica"];

        if ($id > 0) {
            $this->request->data = $this->Cliente->read(null, $id);
        }

        $this->set("title_for_layout", $title);
        $this->set("id_cliente", $id);
        $this->set("estados", $estados);
        $this->set("tipos_cliente", $tipos_pessoas);
    }

    public function save() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $mensagem = "";

            $data["Cliente"]["cep"] = $this->clearMask($data["Cliente"]["cep"]);
            $data["Cliente"]["telefone"] = $this->clearMask($data["Cliente"]["telefone"]);
            $data["Cliente"]["celular"] = $this->clearMask($data["Cliente"]["celular"]);
            $data["Cliente"]["documento_fiscal"] = $this->clearMask($data["Cliente"]["documento_fiscal"]);

            try {
                $this->Cliente->save($data);
                $this->Dialog->alert("O cliente foi salvo com sucesso!");

                $id = $this->Cliente->id;
                $this->redirect(array("action" => "cadastro", $id));
            } catch (Exception $ex) {
                $mensagem = "Ocorreu um erro no sistema ao salvar o cliente.";
                $this->Dialog->error($mensagem, $ex->getMessage());
                $this->redirect(array("action" => "cadastro", $data["Cliente"]["id"]));
            }
        }
    }

}
