<!DOCTYPE html>
<html>
    <head>
        <title>Gn-Vendas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"href="css/estilo.css">
        <script src="js/formatacao.js"></script>     
    </head>
    <body>
        <div class="topnav">
        <?php
            include_once 'menu.php';
        ?>
        </div>
        <div class="content">
            <h2>Gn-Vendas</h2>
            <h3>Informações da Compra</h3>        
            <table> 
                <tr>
                    <th>Nome do Produto</th>
                    <th>Valor do Produto</th>
                </tr>
                <?php
                    require_once ('classes/Produtos.php');
                    $codigo = $_GET['cod'];
                    $produto = new Produtos();
                    $resultados = $produto->listarProduto($codigo);
                    $dados = $resultados->fetch();
                ?>
                <tr>
                    <td><?php echo $dados['nome'] ?></td>
                    <td><?php echo 'R$ '. number_format($dados['valor'], 2, ',', '.'); ?></td>
                </tr>
            </table>
            <h3>Preencha os dados abaixo</h3>
            <form action="efetivarCompra.php" method ="post">
                Nome:
                <input type="text" name="nome" required="required"></br></br>
                Sobrenome:
                <input type="text" name="sobrenome" required="required"></br></br>
                CPF:
                <input type="text" name="cpf" id="cpf" onkeyup="mascaraCpf();" maxlength="11" required="required"></br></br>
                Telefone:
                <input type="text" id="telefone" name="telefone" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" /> 
                <input type="hidden" name="idProduto" value="<?php echo $codigo; ?>">
                <input type="hidden" name="produto" value="<?php echo $dados['nome']; ?>">
                <input type="hidden" name="valor" value="<?php echo $dados['valor']; ?>">
                <input class="botao" type="submit" name="submit" value="Comprar">
            </form>
        </div>
        <div class="footer">
            <p>Gn-Vendas <?php echo date("Y") ?> - Todos os direitos reservados</p>
        </div>
    </body>
</html>

