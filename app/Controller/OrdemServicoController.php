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
        $this->loadModel('OrdemServicoModelo');
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
            $mostrar = $data["OrdemServico"]["mostrar"];

            if ($numero != "") {
                $conditions["OrdemServico.id"] = $data["OrdemServico"]["numero"];
            }

            $conditions["OR"] = array(
                "Cliente.razao_social LIKE" => "%" . $data["OrdemServico"]["cliente"] . "%",
                "Cliente.nome_fantasia LIKE" => "%" . $data["OrdemServico"]["cliente"] . "%"
            );

            $conditions["OrdemServico.servico LIKE"] = "%" . $data["OrdemServico"]["servico"] . "%";

            if ($emissao_inicio != "" && $emissao_fim != "") {
                $conditions["OrdemServico.data_criacao >="] = $this->Date->formatDateDB($data["OrdemServico"]["data_emissao_inicio"]);
                $conditions["OrdemServico.data_criacao <="] = $this->Date->formatDateDB($data["OrdemServico"]["data_emissao_fim"]);
            }

            if ($prazo_inicio != "" && $prazo_fim != "") {
                $conditions["OrdemServico.prazo <="] = $this->Date->formatDateDB($data["OrdemServico"]["prazo_inicio"]);
                $conditions["OrdemServico.prazo >="] = $this->Date->formatDateDB($data["OrdemServico"]["prazo_fim"]);
            }

            switch ($mostrar) {
                case"A":
                    $conditions["OrdemServico.cancelado"] = false;
                    $conditions["OrdemServico.concluido"] = false;
                    break;
                case"C":
                    $conditions["OrdemServico.cancelado"] = true;
                    break;
                case"F":
                    $conditions["OrdemServico.concluido"] = true;
                    break;
            }
        } else {
            $conditions["OrdemServico.cancelado"] = false;
            $conditions["OrdemServico.concluido"] = false;
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
        $status_ordens = ["A" => "Ativos", "C" => "Cancelados", "F" => "Concluídos", "T" => "Todos"];
        $title = "Lista de Ordens de Serviço";

        $this->set("title_for_layout", $title);
        $this->set("ordens_servicos", $ordem_servico);
        $this->set("qtd_ordens", $qtd_ordens);
        $this->set("status_ordens", $status_ordens);
    }

    public function add() {
        $prioridades = [0 => "Baixa", 1 => "Média", 2 => "Alta"];
        $equipamentos = $this->Equipamento->find("list", array("fields" => ["id", "nome"]));
        $modo_entrega = $this->ModoEntrega->find("list", array(
            "fields" => [ "id", "nome"],
            "conditions" => array(
                "ModoEntrega.ativo" => true
            )
        ));

        $title = "Gerar Ordem de Serviço";

        $this->set("title_for_layout", $title);
        $this->set("equipamentos", $equipamentos);
        $this->set("modos_entregas", $modo_entrega);
        $this->set("prioridades", $prioridades);
    }

    public function edit($id) {
        $ordem_servico = $this->OrdemServico->read(null, $id);
        $ordem_servico["OrdemServico"]["prazo"] = $this->Date->formatDateView($ordem_servico["OrdemServico"]["prazo"]);

        $this->request->data = $ordem_servico;

        $prioridades = [0 => "Baixa", 1 => "Média", 2 => "Alta"];
        $equipamentos = $this->Equipamento->find("list", array("fields" => ["id", "nome"]));
        $modo_entrega = $this->ModoEntrega->find("list", array(
            "fields" => [ "id", "nome"],
            "conditions" => array(
                "ModoEntrega.ativo" => true
            )
        ));

        $title = "Editar Ordem de Serviço";

        $this->set("title_for_layout", $title);
        $this->set("id", $id);
        $this->set("nome_cliente", $ordem_servico["Cliente"]["razao_social"]);
        $this->set("equipamentos", $equipamentos);
        $this->set("modos_entregas", $modo_entrega);
        $this->set("prioridades", $prioridades);
        $this->set("cancelado", $ordem_servico["OrdemServico"]["cancelado"]);
        $this->set("concluido", $ordem_servico["OrdemServico"]["concluido"]);
    }

    public function templates() {

    }

    public function template_edit($id) {
        $this->set("id", $id);
    }

    public function template_create() {

        $data = $this->request->data;

        $modelo = array(
            "OrdemServicoModelo" => array(
                "id_cliente" => $data["OrdemServico"]["id_cliente"],
                "servico" => $data["OrdemServico"]["servico"],
                "material" => $data["OrdemServico"]["material"],
                "formato" => $data["OrdemServico"]["formato"],
                "formato_final" => $data["OrdemServico"]["formato_final"],
                "quantidade_producao" => $data["OrdemServico"]["quantidade_producao"],
                "quantidade_cliente" => $data["OrdemServico"]["quantidade_cliente"],
                "acabamento" => $data["OrdemServico"]["acabamento"],
                "data_criacao" => date("Y-m-d H:i:s"),
                "arquivo" => $data["OrdemServico"]["arquivo"],
                "equipamento" => $data["OrdemServico"]["equipamento"],
                "modo_entrega" => $data["OrdemServico"]["modo_entrega"],
                "contato_cliente" => $data["OrdemServico"]["modo_entrega"],
            )
        );

        if (isset($data["OrdemServico"]["id"])) {
            $modelo["ordem_servico_origem"] = $data["OrdemServico"]["id"];
        }

        try {
            $this->OrdemServicoModelo->save($modelo);
            $this->Dialog->alert("O modelo da ordem de serviço foi criado com sucesso!");
            $this->redirect(array("action" => "templates"));
        } catch (Exception $ex) {
            $mensagem = "Ocorreu um erro no sistema ao criar o modelo desta ordem de serviço.";

            $this->Dialog->error($mensagem, $ex->getMessage());
            $this->redirect(array("action" => "index"));
        }
    }

    public function prioridades() {
        $ordens_servico = $this->OrdemServico->find("all", array(
            "conditions" => array(
                "OrdemServico.cancelado" => false,
                "OrdemServico.concluido" => false,
            ), "order" => array(
                "OrdemServico.prioridade" => "DESC",
                "OrdemServico.id" => "DESC"
            )
        ));

        $title = "Lista de Prioridades";

        $this->set("title_for_layout", $title);
        $this->set("ordens_servico", $ordens_servico);
    }

    public function documento($id) {

        $ordem_servico = $this->OrdemServico->read(null, $id);

        $title = "Ordem de Serviço $id";

        $this->set("title_for_layout", $title);
        $this->set("id", $id);
        $this->set("ordem_servico", $ordem_servico);
    }

    public function imprimir($id) {
        $this->layout = "print";

        $ordem_servico = $this->OrdemServico->read(null, $id);
        $title = "Ordem de Serviço $id";

        $this->set("title_for_layout", $title);
        $this->set("id", $id);
        $this->set("ordem_servico", $ordem_servico);
    }

    public function save() {
        if ($this->request->is("post")) {
            $data = $this->request->data;
            $this->create($data);
        } else if ($this->request->is('put')) {
            $data = $this->request->data;
            $this->update($data);
        }
    }

    public function cancelar($id = null) {

        try {

            $data = $this->request->data;
            $destino = null;

            if ($this->request->is("post") || $this->request->is("put")) {
                $destino = unserialize($data["question"]["callback"]);

                if ($id == null) {
                    $id = $data["question"]["parameter"];
                }
            }

            $this->OrdemServico->id = $id;
            $this->OrdemServico->saveField("cancelado", true);

            if ($this->request->is("post") || $this->request->is("put")) {
                $this->Dialog->alert("A ordem de serviço foi cancelada com sucesso.");
                $this->redirect($destino);
            }
        } catch (Exception $ex) {
            $mensagem = "Ocorreu um erro no sistema ao atualizar a ordem de serviço.";

            $this->Dialog->error($mensagem, $ex->getMessage());
            $this->redirect(array("action" => "index"));
        }
    }

    public function concluir($id) {
        try {
            $data = $this->request->data;
            $destino = null;

            if ($this->request->is("post") || $this->request->is("put")) {
                $destino = unserialize($data["question"]["callback"]);
            }

            $this->OrdemServico->id = $id;
            $this->OrdemServico->saveField("concluido", true);

            if ($this->request->is("post") || $this->request->is("put")) {
                $this->Dialog->alert("A ordem de serviço foi concluida com sucesso.");
                $this->redirect($destino);
            }
        } catch (Exception $ex) {
            $mensagem = "Ocorreu um erro no sistema ao atualizar a ordem de serviço.";

            $this->Dialog->error($mensagem, $ex->getMessage());
            $this->redirect(array("action" => "index"));
        }
    }

    private function create($data) {
        $mensagem = "";

        $data["OrdemServico"]["prazo"] = $this->Date->formatDateDB($data["OrdemServico"]["prazo"]);

        $data["OrdemServico"]["data_criacao"] = date("Y-m-d H:i:s");
        $data["OrdemServico"]["concluido"] = false;
        $data["OrdemServico"]["cancelado"] = false;
        $data["OrdemServico"]["responsavel"] = $this->Session->read("UsuarioID");

        try {
            $this->OrdemServico->save($data);
            $this->Dialog->alert("A ordem de serviço foi gerada com sucesso!");

            $id = $this->OrdemServico->id;
            $this->redirect(array("action" => "documento", $id));
        } catch (Exception $ex) {
            $mensagem = "Ocorreu um erro no sistema ao gerar a nova ordem de serviço.";
            $this->Dialog->error($mensagem, $ex->getMessage());
            $this->redirect(array("action" => "add", $data["OrdemServico"]["id"]));
        }
    }

    private function update($data) {
        $mensagem = "";

        $data["OrdemServico"]["prazo"] = $this->Date->formatDateDB($data["OrdemServico"]["prazo"]);
        $data["OrdemServico"]["responsavel"] = $this->Session->read("UsuarioID");

        try {
            $this->OrdemServico->save($data);
            $this->Dialog->alert("A ordem de serviço foi atualizada com sucesso!");

            $id = $this->OrdemServico->id;
            $this->redirect(array("action" => "documento", $id));
        } catch (Exception $ex) {
            $mensagem = "Ocorreu um erro no sistema ao atualizar a ordem de serviço.";
            $this->Dialog->error($mensagem, $ex->getMessage());
            $this->redirect(array("action" => "edit", $data["OrdemServico"]["id"]));
        }
    }

}
