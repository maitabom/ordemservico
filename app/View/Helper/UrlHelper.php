<?php

/**
 * Classe que ajuda a montar urls de maneira prática.
 */
class UrlHelper extends AppHelper {

    public $helpers = array();
    public $protocol = "http://";
    public $base;

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);

        $this->base = $_SERVER['SERVER_NAME'];
    }

    /**
     * Torna o endereço URL relativo, buscando a base do link.
     * @param String $url Caminho de um endereço URL relativo
     * @return String Endereço URL relativo
     */
    public function relative($url) {
        return $this->assetUrl($url);
    }

    /**
     * Torna o endereço URL relativo, buscando a base e o host do link.
     * @param String $url Caminho de um endereço URL relativo
     * @return String Endereço URL absoluto
     */
    public function absolute($url) {
        $nurl = $this->protocol . $this->base . $this->assetUrl($url);
        return $nurl;
    }

    /**
     * Cria um link a partir de controller e ação.
     * @param String $controller Controller do sistema
     * @param String $action Ação relacionada ao controller
     * @return Object Url gerada a partir das informações dadas.
     */
    public function make($controller, $action = "") {

        $nurl = ($action == "") ? DS . $controller : DS . $controller . DS . $action;
        return $this->assetUrl($nurl);
    }

    /**
     * Cria um link absoluto a partir de controller e ação
     * @param String $controller Controller do sistema
     * @param String $action Ação relacionada ao controller
     * @return Object Url absoluto gerada a partir das informações dadas.
     */
    public function makeAbsolute($controller, $action = "") {

        $nurl = ($action == "") ? DS . $controller : DS . $controller . DS . $action;
        return $this->protocol . $this->base . $this->assetUrl($nurl);
    }

    /**
     * Cria um link a partir de controller, ação e parâmetro
     * @param String $controller Controller do sistema
     * @param String $action Ação relacionada ao controller
     * @return Object Url gerada a partir das informações dadas.
     */
    public function makeParams($controller, $action, $param) {

        $nurl = DS . $controller . DS . $action . DS . $param;
        return $this->assetUrl($nurl);
    }

}
