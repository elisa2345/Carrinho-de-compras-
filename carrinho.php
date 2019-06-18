<?php
session_start(); // Avisando o PHP que vamos trabalhar com sessões

// Adicionar ao carrinho
if(isset($_GET['adicionar'])){
    $temp = array("produto" => "Celular Motorola",
        "preco" => 1000.00,
        "quantidade" => 1,
        "total" => 1000.00);

    $_SESSION['carrinho'][] = $temp;
}

// Referência a variável "sessão carrinho"
// Na variável local "carrinho"
$carrinho = $_SESSION['carrinho'];

// Obtendo a quantidade de produtos que estão no carrinho
$total_produtos = count($carrinho);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrinho de compras</title>
</head>
<body>
    <div id="corpo">
        <h1>Produtos no carrinho</h1>
        <table>
            <thead>
                <tr>
                    <th>Produtos</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!--Percorrendo o array de produtos
                    com a estrutura for-->

                    <?php for($i=0; $i <=$total_produtos; $i++): ?>
                    <tr>
                        <td><?= $carrinho[$i]['produto'] ?></td>
                        <td><?= $carrinho[$i]['qnt'] ?></td>
                        <td><?= $carrinho[$i]['preco'] ?></td>
                        <td><?= $carrinho[$i]['total'] ?></td>
                    </tr>
                    <?php endfor; ?>
            </tbody>
        </table>
    </div>
</body>
</html>