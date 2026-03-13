<?php
    require_once '../../model/desingPatterns/Espeto.php';
    require_once '../../control/Cadastrar.php';
    require_once '../../model/desingPatterns/Transaction.php';
    require_once '../../model/Conexao/Connection.php';
    
    
    try {
        Transaction::open('Dados');
        $espeto = new Espeto();
        $data = $espeto->selectById($_GET['comprar']);
        // $quantidadeDeEspetinhos = isset($_POST['quantidadeDeEspetinhos']) ? $_POST['quantidadeDeEspetinhos'] : $data['valor'];
        // $ValorFinal = $quantidadeDeEspetinhos * $data['valor'];
        Transaction::close();
    } catch (Exception $e) {
        echo 'O erro é: ' . $e->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar</title>
    <link rel="stylesheet" href="../CSS/comprae.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section class="inical">
        <center>
            <br>
            <a href="../HTML/index.php"><img src="../Imagens/sinal-de-seta-de-trafego-close-up.jpg" height="30" ></a>
            <br>
            <h1>Compras de espetinhos</h1></center>
    </section>
    <br><br><br>
    <center>
        <div class="comprar">
            <h5 >RESUMO DA COMPRA.</h5>
            <hr>
            <p>TOTAL: R$ <?php echo $data['valor'];?></p>
            <p>FRETE:     Gratuito</p>
            <br>
            <a href="pagar.html">
                <button class="Botao">COMPRAR</button>
            </a>
        </div>
    </center>
    <br>
    <center><hr width="1000" color="black" size="4px"></center>
    <br>
    <center><h3>Seu carrinho</h3></center>
    <br>
    <center><hr width="1000" color="black" size="4px"></center>
    <br>
    <form action="../../control/Quantidade.php" method="post">
        <table class="table table-striped table-hover">
            <tr>
                <th colspan="2"><center>PRUDUTO</center></th>
                <th ><center>QUANTIDADE</center></th>
                <th><center>PREÇO</center></th>
                <th><center>TOTAL</center></th>
            </tr>
            <tr>
                <td><img src="../Imagens/Espeto-carne.webp" alt="imagem de espeto" height="100px"></td>
                <td><?php echo $data['nomeEspeto']; ?></td>
                <td><center><input type="number" name="quantidadeDeEspetinhos" width="2px"></center></td>
                <td><center>R$ <?php echo $data['valor']; ?></center></td>
                <td><center>R$ <?php echo $data['valor']; ?></center></td>
            </tr>
        </table>
    </form>
</body>
</html>
