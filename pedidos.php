<!DOCTYPE html>
<html>
    <head>
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
        <h2>Pedidos</h2>
        <table border="1">
              <colgroup span="4" class="columns"></colgroup>
              
                  <?php
                    require_once 'classes/Compras.php';
                    $compra = new Compras();
                    $resultados = $compra->listarTodasCompras();          
                    if ($compra) {                     
                            echo '
                            <tr>
                                <th>Nome</th>
                                <th>Telefone</th> 
                                <th>Produto</th>
                                <th>Preço (R$)</th> 
                                <th>Pagar</th>
                            </tr>';
                            $msg = false;
                            while ($dados = $resultados->fetch()) {
                                echo '<tr>';
                                echo '<td>'.$dados['nome_cliente'].'</td>';
                                echo '<td>'.$dados['telefone_cliente'].'</td>';
                                echo '<td>'.$dados['nome'].'</td>';
                                echo '<td> R$ '. number_format($dados['valor'], 2, ',', '.') .'</td>';
                                echo '<td><a href="'.$dados['link_boleto'].'" target="_blank" class="button">Boleto</a></td>';
                                echo '</tr>';
                                $msg = true;
                            }
                            if ($msg == false) {
                                echo 'Nenhuma compra realizada!';
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