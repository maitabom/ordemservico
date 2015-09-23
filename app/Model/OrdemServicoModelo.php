<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP OrdemServicoModelo
 * @author valentim
 */
class OrdemServicoModelo extends AppModel {

    public $name = "OrdemServicoModelo";
    public $useTable = "ordem_servico_modelo";
    public $belongsTo = array(
        "Cliente" => array(
            "className" => "Cliente",
            "foreignKey" => "id_cliente"
        ),
        "Equipamento" => array(
            "className" => "Equipamento",
            "foreignKey" => "equipamento"
        ),
        "ModoEntrega" => array(
            "className" => "ModoEntrega",
            "foreignKey" => "modo_entrega"
        ),
        "Material" => array(
            "className" => "Material",
            "foreignKey" => "material"
        )
    );

}
