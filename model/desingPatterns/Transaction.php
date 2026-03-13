<?php
require_once __DIR__ . '/../desingPatterns/Record.php';
require_once __DIR__ . '/../Conexao/Connection.php';
class Transaction {
    private static $conexao;
    private static $bancoDeDados = 'Dados';
    private static $caminhoBanco = '../../model/Conexao';

    public static function open() {
        self::$conexao = Connection::open(self::$caminhoBanco . '/' . self::$bancoDeDados);
        self::$conexao->beginTransaction();
    }

    public static function close() {
        if (self::$conexao) {
            self::$conexao->commit();
            self::$conexao = null;
        }
    }

    public static function rollback() {
        if (self::$conexao) {
            self::$conexao->rollBack();
            self::$conexao = NULL;
        }
    }

    public static function get() {
        if (self::$conexao) {
            return self::$conexao;
        }
    }
}
?>