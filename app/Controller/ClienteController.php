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
        $this->controlAuth();
        parent::beforeFilter();
    }

    public function index() {

        $conditions = array();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $mostrar = $data["Cliente"]["mostra"];
            $tipo_cliente = $data["Cliente"]["tipo_cliente"];
            $documento = $this->Format->clearMask($data["Cliente"]["documento_fiscal"]);
            $uf = $data["Cliente"]["uf"];

            $conditions["OR"] = array(
                "Cliente.razao_social LIKE" => "%" . $data["Cliente"]["nome"] . "%",
                "Cliente.nome_fantasia LIKE" => "%" . $data["Cliente"]["nome"] . "%"
            );

            $conditions["Cliente.email LIKE"] = "%" . $data["Cliente"]["email"] . "%";
            $conditions["Cliente.cidade LIKE"] = "%" . $data["Cliente"]["cidade"] . "%";

            if ($uf != "") {
                $conditions["Cliente.uf"] = $uf;
            }

            if ($documento != "") {
                $conditions["Cliente.documento_fiscal"] = $documento;
            }

            if ($tipo_cliente != "T") {
                $conditions["Cliente.tipo_cliente"] = $tipo_cliente;
            }

            if ($mostrar != "T") {
                $conditions["Cliente.ativo"] = ($mostrar == "A") ? 1 : 0;
            }
        }

        $options = array(
            "conditions" => $conditions,
            "order" => array(
                "Cliente.razao_social" => "ASC"
            ),
            "limit" => $this->limit_pagination
        );

        $this->paginate = $options;
        $clientes = $this->paginate("Cliente");
        $qtd_clientes = $this->Cliente->find("count", array("conditions" => $conditions));

        $title = "Lista de Clientes";
        $estados = $this->Geo->listaUf();
        $combo_mostra = ["T" => "Todos", "A" => "Somente ativos", "I" => "Somente inativos"];
        $tipos_pessoas = ["T" => "Todos", "F" => "Somnte Pessoa Física", "J" => "Somente Pessoa Jurídica"];

        $this->set("title_for_layout", $title);
        $this->set("qtd_clientes", $qtd_clientes);
        $this->set("clientes", $clientes);
        $this->set("combo_mostra", $combo_mostra);
        $this->set("estados", $estados);
        $this->set("tipos_cliente", $tipos_pessoas);
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

            $id_cliente = $data["Cliente"]["id"];

            $data["Cliente"]["cep"] = $this->Format->clearMask($data["Cliente"]["cep"]);
            $data["Cliente"]["telefone"] = $this->Format->clearMask($data["Cliente"]["telefone"]);
            $data["Cliente"]["celular"] = $this->Format->clearMask($data["Cliente"]["celular"]);
            $data["Cliente"]["documento_fiscal"] = $this->Format->clearMask($data["Cliente"]["documento_fiscal"]);

            if ($id_cliente == 0) {
                $data["Cliente"]["data_cadastro"] = date("Y-m-d H:i:s");
            } else {
                $data["Cliente"]["data_alteracao"] = date("Y-m-d H:i:s");
            }

            try {

                $cd = $this->Cliente->find("count", array(
                    "conditions" => array(
                        "Cliente.documento_fiscal" => $data["Cliente"]["documento_fiscal"]
                    )
                ));

                if ($cd > 0) {
                    throw new Exception("Não é permitido cadastrar dois clientes com mesmo documento fiscal.");
                }

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

    public function listar() {
        $this->layout = "ajax";
        $this->autoRender = false;
        $this->Cliente->recursive = -1;

        if ($this->request->is("ajax")) {
            $nome = $this->request->query("nome");

            $clientes = $this->Cliente->find("all", array(
                "fields" => ["id", "razao_social", "nome_fantasia"],
                "conditions" => array(
                    "OR" => array(
                        "Cliente.razao_social LIKE" => "%" . $nome . "%",
                        "Cliente.nome_fantasia LIKE" => "%" . $nome . "%"
                    )
                ),
                "order" => array(
                    "Cliente.razao_social" => "ASC",
                    "Cliente.nome_fantasia" => "ASC"
                )
            ));

            echo json_encode($clientes);
        }
    }

}
