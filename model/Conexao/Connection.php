<?php
class Connection {
    private function __construct() {}

    public static function open($banco) {
        $bancoDeDados = null;
        if (file_exists($banco . ".ini")) {
            $bancoDeDados = parse_ini_file($banco . ".ini");
            // print_r($bancoDeDados);
        } else {
            echo "Banco de Dados: '{$banco}' não encontrado <br>";
        }

        $type = isset($bancoDeDados['type']) ? $bancoDeDados['type'] : null;
        $localhost = isset($bancoDeDados['localhost']) ? $bancoDeDados['localhost'] : null;
        $dbName = isset($bancoDeDados['dbName']) ? $bancoDeDados['dbName'] : null;
        $user = isset($bancoDeDados['user']) ? $bancoDeDados['user'] : null;
        $pass = isset($bancoDeDados['pass']) ? $bancoDeDados['pass'] : null;

        switch ($type) {
            case 'mysql':
                $port = '3306';
                $conexao = new PDO("{$type}:host={$localhost};port={$port};dbname={$dbName}", $user, $pass);
                return $conexao;
                // break;
            default:
                echo "Não funcionou";
                break;
        }
        return null;
    }
}
?>