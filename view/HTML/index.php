<?php
    require_once '../../model/desingPatterns/Espeto.php';
    require_once '../../control/Cadastrar.php';
    require_once '../../model/desingPatterns/Transaction.php';
    require_once '../../model/Conexao/Connection.php';
try {
        
    Transaction::open('Dados');

    $espeto = new Espeto();
    $data = $espeto->select(Cadastrar::TABLENAME);

    Transaction::close();

} catch (Exception $e) {
    echo 'O erro é: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Basic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="imagemLogo">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Ariel Luiz Biondo</title>
</head>
<body>        
    <nav class="nav">
            <ul class="nav-ul">
                <img src="" class="logo-cabeçalho">
                <li>
                    <a href="#">PREÇOS</a>
                </li>
                <li>
                    <a href="../HTML/Cadastar.html">CADASTRAR</a>
                </li>
                <li>
                    <a href="../HTML/Formatar.html">FORMATAR</a>
                </li>
            </ul>
        </nav>
        <section class="header-inicial">
            <div>
                <h1 class="tituiloIndex">Espetinhos do tio <br>Ariel Biondo.</h1><br>
                <p class="paragrafoIndex">Deixe sua barriga feliz, a balaça feliz,  <br>
                    e a privada triste. Fique de bom humor!</p>
                    <br><br>
                <a href="https://wa.me/5566996302844">
                    <button class="botaoIndex">Contato</button>
                </a>
            </div>
        </section>

        <section class="header-segundo">
            <center><h1 class="h1-header-segundo">Preços Dos Espetinhos De Churrasco.</h1></center>
            <br>
            <center><hr width="300px" color="black" size="2px"></center>
            <br>
            <center><p class="p-header-segundo">Temos sabor, para todos os sabores. Com preços para todos os gostos.<br> Com carne da melhor 
                qualidade, todas da minha fazenda. Venha me dar mais dinheiro!</p></center>
            <br><br><br>

            <div class="produtos-container">
                <?php foreach ($data as $resultado){ ?>
                    <div class="produtosAmostra">
                        <div class="div-produto-vendendo">
                            <img src="../Imagens/Espeto-carne.webp" alt="imagem de espeto" width="200px" height="300px">
                            <hr class="divider">
                            <h3><?php echo $resultado['nomeEspeto']; ?></h3>
                            <p><?php echo $resultado['descricao']; ?></p>
                            <p>R$ <?php echo $resultado['valor']; ?></p>
                            <a href="comprar.php?comprar=<?php echo $resultado['idCadastroEspetinho']; ?>" id="comprar" class="comprar-btn">COMPRAR</a>
                        </div>
                    </div>
                <?php }?>
            </div>   

        </section>
        <section>
            <center>
                <footer>
                    <h3>
                        <h3>Ariel Luiz Biondo</h3>
                    </h3>
                    <hr width="60px" color="black" size="2px">
                    <br>
                    <p class="fim">Direitos reservados.</p>
                </footer>
            </center>
        </section>
</body>
</html>