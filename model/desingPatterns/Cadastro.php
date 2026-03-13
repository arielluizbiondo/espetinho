<?php
require_once '../../model/desingPatterns/Transaction.php';
require_once '../../model/desingPatterns/Espeto.php';
require_once '../../model/desingPatterns/Record.php';
require_once '../../control/Cadastrar.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        Transaction::open('Dados');

        $espeto = new Espeto();
        $espeto->nomeEspeto = $_POST['nomeEspeto'];
        $espeto->descricao = $_POST['descricao'];
        $espeto->valor = $_POST['valor'];
        $espeto->quantidade = $_POST['quantidade'];

        $espeto->insert(Cadastrar::TABLENAME);        

        Transaction::close();
        header('Location: http://localhost:8080/ATIVIDADEESPETINHO/view/HTML/Cadastar.html');
        exit();
    }
} catch (Exception $e) {
    echo 'O erro é: ' . $e->getMessage();
}

?>
