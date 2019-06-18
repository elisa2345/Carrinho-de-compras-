<?php
session_start(); // Avisando o PHP que esta página trabalha com sessões

/**
 * Verifico se a variável de ações existe, para então verificar qual ação o usuário ordenou
 */
 if(isset($_GET['acao_carrinho'])) {

    switch($_GET['acao_carrinho']) {

        case 'limpar': // Na URL do navegador: carrinho.acoes.php?acao_carrinho=limpar
            $_SESSION['carrinho'] = array(); // Ao definir o carrinho como array novamente, limpamos ele
        break;

        case 'add': // Adiciona um produto ao carrinho
            // Pegando as variáveis da URL com os dados do produto (Isso não é o ideal, apenas didático)
            $produto = $_GET['carr_produto'];
            $preco = $_GET['carr_preco'];
            $qnt = $_GET['carr_qnt'];
            $total = $preco * $qnt;

            $dados_produtos_a_ser_add = array("produto" => $produto, "preco" => $preco, "quantidade" => $qnt,
                    "total" => $total);

            $_SESSION['carrinho'][] = $dados_produtos_a_ser_add; // Adicionando os dados estruturados do produto
        break;

        case 'remover':
            $item_carrinho = $_GET['item'] // Pegando qual item o usuário quer remover.

                if (isset($_SESSION['carrinho'][$item_carrinho])){} // Verifica se o item realmente existe
                    unset($_SESSION['carrinho'][$item_carrinho]); // Se existir, destroi o item
                } 
            break;

        case 'atualiza-qnt':
                $item_carrinho = $_GET['item'] // Pegando qual item o usuário quer atualizar a qnt

            if(isset($_SESSION['carrinho'][$item_carrinho])) { //Verificando se o item existe
                $qnt = (int) $_GET['carr_qnt']; // Pegando a quantidade que ele deseja
                $total = $_SESSION['carrinho'][$tem_carrinho]['preco'] * $qnt; // Atualizando o total

                $_SESSION['carrinho'][$item_carrinho]['quantidade'] = $qnt; // Definindo novamente a quantidade
                $_SESSION['carrinho'][$item_carrinho]['total'] = $total; // Definindo o novo total
            }

        break;
    } // Fim do Switch
 } // Fim do IF do isset
?>