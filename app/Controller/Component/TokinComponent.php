<?php

/**
 * CakePHP Componente que gerencia o sistema de segurança de tokens ao se comunicar com sistemas externos.
 * @author valentim
 */
class TokinComponent extends Component {

    public $components = array();

    /**
     * Gera um novo token a ser utilizado.
     * @param int $idUsuario Código do usuário do sistema.
     * @param string $produto Produto, classe ou modelo relacionado ao token.
     * @return string Chave única de token gerada.
     */
    public function createToken($idUsuario, $produto = NULL) {
        $tokenModel = ClassRegistry::init("Token");
        $char = $tokenModel->find("count");
        $char = sha1($char++);

        $query = "insert into tokens (chave, usuario, produto, datacriacao, ativo, resolvido) "
                . "values ('$char', $idUsuario, '$produto', NOW(), 1, 0)";

        $tokenModel->query($query);
        return $char;
    }

    /**
     * Marca o token como resolvido, ou seja, quando consegue ter o retorno esperado da comunicação externa.
     * @param string $chave Chave do token a ser marcada como resolvido.
     */
    public function markResolved($chave) {
        $tokenModel = ClassRegistry::init("Token");

        $query = "update tokens set "
                . "ativo = 0, "
                . "resolvido = 1 "
                . "where chave = '$chave' ";

        $tokenModel->query($query);
    }

    /**
     * Marca o token como não resolvido, ou seja, quando não consegue ter o retorno esperado da comunicação externa.
     * @param string $chave Chave do token a ser marcada como não resolvido.
     */
    public function markUnresolved($chave) {
        $tokenModel = ClassRegistry::init("Token");

        $query = "update tokens set "
                . "ativo = 0, "
                . "resolvido = 0 "
                . "where chave = '$chave' ";

        $tokenModel->query($query);
    }

    public function getInterval($dataInicial) {

        $dataAtual = date("Y-m-d H:i:s");

        $udi = strtotime($dataInicial);
        $udf = strtotime($dataAtual);

        $intervalo = ($udf - $udi) / 3600;

        return $intervalo;
    }

}
