<!DOCTYPE html>
<html>
    <head>
    <title>Gn-Vendas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="css/estilo.css">
</head>
<body>
    <div class="topnav">
    <?php
        include_once 'menu.php';
    ?>
    </div>
    <div class="content">
        <h2>Produtos</h2>
        <table border="1">
              <colgroup span="4" class="columns"></colgroup>
              
                  <?php
                    require_once 'classes/Produtos.php';
                    $produto = new Produtos();
                    $resultados = $produto->listarTodosProdutos();           
                    if ($produto) {                     
                        echo '
                        <tr>
                            <th>Produto</th>
                            <th>Preço (R$)</th> 
                            <th></th>
                        </tr>';
                        $msg = false;   
                        while ($dados = $resultados->fetch()) {
                            echo '<tr>';
                            echo '<td>'.$dados['nome'].'</td>';
                            echo '<td> R$ '. number_format($dados['valor'], 2, ',', '.') .'</td>';
                            echo '<td><a href="compra.php?cod='.$dados['id'].'" class="button">Comprar</a></td>';
                            echo '</tr>';
                            $msg = true;    
                        }          
                        if ($msg == false) {
                             echo 'Nenhum produto cadastrado';
                        }
                    } else {
                        echo 'Erro!';
                    }
                  ?>
            </table>
    </div>
    <div class="footer">
        <p>Gn-Vendas <?php echo date("Y") ?> - Todos os direitos reservados</p>
    </div>
</body>
</html>