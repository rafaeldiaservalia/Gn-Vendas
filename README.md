#__Gn-Vendas__

### Para usar esse sistema, siga os passo abaixo: ### 

1º - Baixar o projeto (todos os aquivos) para seu computador.

2º - Para testar no ambiente local (windows), você pode usar o ### WampServer###.

3º - Se você estive usando o WampServer, acesse o caminho ### c:\wamp ou c:\wamp64###, em seguida abra a pasta ###www###  e  crie uma pasta chamada: ### Gn-Vendas###  (sugestão) 

4º - Copie todos os arquivos do projeto (passo 1) para a pasta ###Gn-Vendas###  (passo 3)

Estrutura de pasta e arquivos depois de ralizados os passos anteriores:  
 
```
 -www         
    -Gn-Vendas
        +classes
        +config
        +css
        +js
        +vendor
        -cadastraProdutos.php
        -cadastrar.php
        -composer.json
        -composer.lock
        -compra.php
        -efitivarCompra.php
        -index.php
        -menu.php
        -pedidos.php
        -README

```

5º - Abra o ### http://localhost/phpmyadmin/### e crie um banco de dados chamado ### GN-VENDAS###  (sugestão) OU crie o banco de dados via prompt de comandos. ### 

6º - Selecione o banco de dados criado e crie as tabelas abaixo:
 
```
CREATE TABLE IF NOT EXISTS compras (
  compra_id int(11) NOT NULL AUTO_INCREMENT,
  nome_cliente varchar(100) NOT NULL,
  cpf_cliente varchar(11) NOT NULL,
  telefone_cliente varchar(15) NOT NULL,
  link_boleto varchar(250) NOT NULL,
  id_boleto int(11) NOT NULL,
  vencimento_boleto varchar(20) NOT NULL,
  produto_id int(11) NOT NULL,
  PRIMARY KEY (compra_id)
)

CREATE TABLE IF NOT EXISTS produtos (
  produto_id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  valor decimal(15,2) NOT NULL,
  PRIMARY KEY (produto_id)
)

ALTER TABLE pedidos ADD FOREIGN KEY (produto_id) REFERENCES compras (produto_id)
```

7º - Abra o arquivo Conexao.php que está na pasta config e modifique as informações de acordo com os dados de acesso ao seu banco de dados.

```
$db_host = "localhost";
$db_nome = "GN_VENDAS"; //nome do banco de dados
$db_usuario = "root"; //usuario do banco de dados
$db_senha = ""; //senha do usuario do banco de dados
$db_driver = "mysql";
```

8º - Abra o navegador de internet e digite ### http://localhost/Gn-Vendas/###  e teste o funcionamento sistema.


Versão 1.0
