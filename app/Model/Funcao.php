<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP Funcao
 * @author valentim
 */
class Funcao extends AppModel {

    public $name = "Funcao";
    public $useTable = "funcoes";
    public $hasAndBelongsToMany = array(
        "Permissao" => array(
            "className" => "Permissao",
            "joinTable" => "funcoes_grupos",
            "foreignKey" => "grupos_id",
            "associationForeignKey" => "funcoes_id"
        )
    );

}
