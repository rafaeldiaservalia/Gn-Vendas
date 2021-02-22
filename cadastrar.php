<?php
require_once ('classes/Produtos.php');
$nome = $_POST['nome'];
$valor = $_POST['valor'];
if (empty($nome) || empty($valor)) {
    echo '<script type="text/javascript">
            alert("Preencha todos os dados!");
            window.location.href="cadastraProdutos.php";
        </script>';
    echo ('Preencha todos os dados');
} else {
    $valorSemPonto = str_replace('.', '', $valor); // remove o ponto
    $valorTrocaVirgulaPonto = str_replace(',', '.', $valorSemPonto); // troca ponto por virgula
    $valorFomatado = $valorTrocaVirgulaPonto;
    if (isset($nome) && $nome == "" && isset($valor) && $valor == "") {
        echo 'vazio';
    }
    if ($valorFomatado >= 5) {
        $produto = new Produtos();
        $produto->cadastrarProduto($nome,$valorFomatado);
        echo '
            <script type="text/javascript">
                alert("Produto cadastrado com sucesso!");
                window.location.href="index.php";
        </script>';
        echo ('Produto cadastrado com sucesso!');
    } else {
        echo '
        <script type="text/javascript">
            alert("O valor do produto deve ser maior ou igual a R$ 5,00");
            window.location.href="cadastraProdutos.php";
        </script>';
        echo ('O valor do produto deve ser maior ou igual a R$ 5,00!');
    }
}


    
