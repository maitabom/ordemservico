<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP OrdemServicoController
 * @author valentim
 */
class OrdemServicoController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Cliente');
        $this->loadModel('OrdemServico');
        $this->loadModel('Equipamento');
        $this->loadModel('ModoEntrega');
        $this->controlAuth();
        parent::beforeFilter();
    }

    public function index() {

    }

    public function add() {
        $equipamentos = $this->Equipamento->find("list", array("fields" => ["id", "nome"]));
        $modo_entrega = $this->ModoEntrega->find("list", array(
            "fields" => ["id", "nome"],
            "conditions" => array(
                "ModoEntrega.ativo" => true
            )
        ));

        $this->set("equipamentos", $equipamentos);
        $this->set("modos_entregas", $modo_entrega);
    }

    public function edit($id) {
        $this->set("id", $id);
    }

    public function templates() {

    }

    public function template_edit($id) {
        $this->set("id", $id);
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

    public function save() {
        if ($this->request->is("post")) {
            $data = $this->request->data;
            $this->create($data);
        }
    }

    private function create($data) {
        $mensagem = "";

        $data["OrdemServico"]["prazo"] = $this->formatDateDB($data["OrdemServico"]["prazo"]);

        $data["OrdemServico"]["data_criacao"] = date("Y-m-d H:i:s");
        $data["OrdemServico"]["prioridade"] = 1;
        $data["OrdemServico"]["concluido"] = false;
        $data["OrdemServico"]["responsavel"] = $this->Session->read("UsuarioID");

        try {
            $this->OrdemServico->save($data);
            $this->Dialog->alert("O cliente foi salvo com sucesso!");

            $id = $this->OrdemServico->id;
            $this->redirect(array("action" => "documento", $id));
        } catch (Exception $ex) {
            $mensagem = "Ocorreu um erro no sistema ao gerar a nova ordem de serviço.";
            $this->Dialog->error($mensagem, $ex->getMessage());
            $this->redirect(array("action" => "cadastro", $data["OrdemServico"]["id"]));
        }
    }

}
