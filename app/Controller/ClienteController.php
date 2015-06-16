<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP ClienteController
 * @author valentim
 */
class ClienteController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Cliente');
        $this->loadModel('OrdemServico');
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

    public function delete() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $data["question"]["parameter"];

            $marcado = $this->Cliente->read(null, $id);
            $nome = $marcado["Cliente"]["razao_social"];

            $servicos = $this->OrdemServico->find('count', array(
                "conditions" => array(
                    "OrdemServico.id_cliente" => $id
                )
            ));

            if ($servicos > 0) {
                $mensagem = "Ocorreu um erro no sistema ao excluir um cliente.";
                $detalhe = ($servicos == 1) ? "Existe $servicos serviço associado ao cliente $nome." : "Existem $servicos serviços associados ao cliente $nome.";

                $this->Dialog->error($mensagem, $detalhe);
                $this->redirect(array("action" => "index"));
            } else {
                try {
                    $this->Cliente->id = $id;
                    $this->Cliente->delete();

                    $this->Dialog->alert("O cliente $nome foi excluido do sucesso!");
                    $this->redirect(array("action" => "index"));
                } catch (Exception $ex) {
                    $mensagem = "Ocorreu um erro no sistema ao excluir o cliente.";
                    $this->Dialog->error($mensagem, $ex->getMessage());
                    $this->redirect(array("action" => "index"));
                }
            }
        }
    }

}
