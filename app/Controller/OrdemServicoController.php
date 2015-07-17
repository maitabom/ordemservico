<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP OrdemServicoController
 * @author valentim
 */
class OrdemServicoController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Cliente');
        $this->loadModel('Usuario');
        $this->loadModel('OrdemServico');
        $this->loadModel('Equipamento');
        $this->loadModel('ModoEntrega');
        $this->controlAuth();
        parent::beforeFilter();
    }

    public function index() {
        $conditions = array();

        if ($this->request->is("post")) {
            $data = $this->request->data;

            $numero = $data["OrdemServico"]["numero"];
            $emissao_inicio = $data["OrdemServico"]["data_emissao_inicio"];
            $emissao_fim = $data["OrdemServico"]["data_emissao_fim"];
            $prazo_inicio = $data["OrdemServico"]["prazo_inicio"];
            $prazo_fim = $data["OrdemServico"]["prazo_fim"];
            $cancelado = $data["OrdemServico"]["cancelado"];

            if ($numero != "") {
                $conditions["OrdemServico.id"] = $data["OrdemServico"]["numero"];
            }

            $conditions["OR"] = array(
                "Cliente.razao_social LIKE" => "%" . $data["OrdemServico"]["cliente"] . "%",
                "Cliente.nome_fantasia LIKE" => "%" . $data["OrdemServico"]["cliente"] . "%"
            );

            $conditions["OrdemServico.servico LIKE"] = "%" . $data["OrdemServico"]["servico"] . "%";

            if ($emissao_inicio != "" && $emissao_fim != "") {
                $conditions["OrdemServico.data_emissao >="] = $data["OrdemServico"]["data_emissao_inicio"];
                $conditions["OrdemServico.data_emissao <="] = $data["OrdemServico"]["data_emissao_fim"];
            }

            if ($prazo_inicio != "" && $prazo_fim != "") {
                $conditions["OrdemServico.prazo <="] = $data["OrdemServico"]["prazo_inicio"];
                $conditions["OrdemServico.prazo >="] = $data["OrdemServico"]["prazo_fim"];
            }

            $conditions["OrdemServico.cancelado"] = $cancelado;
        } else {
            $conditions["OrdemServico.cancelado"] = false;
        }

        $options = array(
            "conditions" => $conditions,
            "order" => array(
                "OrdemServico.id" => "DESC"
            ),
            "limit" => $this->limit_pagination
        );

        $this->paginate = $options;
        $ordem_servico = $this->paginate("OrdemServico");
        $qtd_ordens = $this->OrdemServico->find("count", array("conditions" => $conditions));
        $title = "Lista de Ordens de Serviço";

        $this->set("title_for_layout", $title);
        $this->set("ordens_servicos", $ordem_servico);
        $this->set("qtd_ordens", $qtd_ordens);
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

        $ordem_servico = $this->OrdemServico->read(null, $id);

        $this->set("id", $id);
        $this->set("ordem_servico", $ordem_servico);
    }

    public function imprimir($id) {
        $this->layout = "print";

        $ordem_servico = $this->OrdemServico->read(null, $id);

        $this->set("id", $id);
        $this->set("ordem_servico", $ordem_servico);
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
            $this->Dialog->alert("A ordem de serviço foi gerada com sucesso!");

            $id = $this->OrdemServico->id;
            $this->redirect(array("action" => "documento", $id));
        } catch (Exception $ex) {
            $mensagem = "Ocorreu um erro no sistema ao gerar a nova ordem de serviço.";
            $this->Dialog->error($mensagem, $ex->getMessage());
            $this->redirect(array("action" => "cadastro", $data["OrdemServico"]["id"]));
        }
    }

}
