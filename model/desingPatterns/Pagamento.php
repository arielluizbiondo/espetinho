<?php

require_once '../../model/desingPatterns/Transaction.php';
require_once '../../model/desingPatterns/Espeto.php';
require_once '../desingPatterns/Record.php';
require_once '../../control/Pagar.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        Transaction::open('Dados');

        $espeto = new Espeto();
        $espeto->formaDePagamento = $_POST['formaDePagamento'];
        $espeto->Endereco = $_POST['Endereco'];
        $espeto->NumeroCartao = $_POST['NumeroCartao'];
        $espeto->senha = $_POST['senha'];
        var_dump($espeto->getData());

        $espeto->insert(Pagar::TABLENAME);        

        Transaction::close();
        header('Location: http://localhost:8080/ATIVIDADEESPETINHO/view/HTML/index.php');
        
        exit();
    }
} catch (Exception $e) {
    echo 'O erro é: ' . $e->getMessage();
}

?>