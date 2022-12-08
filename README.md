<h1 align="center">Processo Seletivo Codificar - Projeto CRUD Oficina 2.0 em PHP</h1>

## Ferramentas Bootstrap, PDO e MySQL

Desenvolvimento de um projeto CRUD (orçamentos da Oficina 2.0) utilizando o acesso a banco de dados com o MySQL e linguagem PHP.

## Assuntos Abordados no Desenvolvimento do Projeto:

- Banco de dados com o MySql;
- PDO (PHP Data Object);
- Uso de linguagens, como: JavaScript e CSS;
- Uso do XAMPP, pacote com os principais servidores web, como: Apache, Php, e Mysql;
- Uso do framework Bootstrap para realização de um layout bonito para o projeto.

## Configuração do Projeto:

- Configuração do XAMPP: Instalação e inicialização dos serviços Apache e MySQL.
- Na pasta databaseSQL têm a tabela orcamento_modelo e a tabela orcamento_populado na qual foi inserido dados falsos para testes. 
- Importar o arquivo orcamento_populado.sql no phpMyAdmin para criar a table necessária.
- Editar o arquivo **database.php** 

```
$dbNome = 'nomeDaTable' 
$dbHost = 'nomeDoDominioOuIP:Porta' 
$dbUsuario = 'usuarioDoMysql' 
$dbSenha 'senhaDoUsuario'

```
## Imagens das Telas do Programa:
### Index
![tela Index](https://github.com/MarVinReisSantos/crud_oficina_2.0/blob/main/docs/final-index.png?raw=true)

### Index com Filtro Cliente
![tela Index com Filtro Cliente](https://github.com/MarVinReisSantos/crud_oficina_2.0/blob/main/docs/final-index-filtro-cliente.png?raw=true)

### Index com Filtro Vendedor
![tela Index com Filtro Vendedor](https://github.com/MarVinReisSantos/crud_oficina_2.0/blob/main/docs/final-index-filtro-vendedor.png?raw=true)

### Index com Filtro de período de datas
![tela Index com Filtro de período de datas](https://github.com/MarVinReisSantos/crud_oficina_2.0/blob/main/docs/final-index-filtro-data.png?raw=true)

### Info
![tela Info](https://github.com/MarVinReisSantos/crud_oficina_2.0/blob/main/docs/final-info.png?raw=true)

### Delete
![tela Delete](https://github.com/MarVinReisSantos/crud_oficina_2.0/blob/main/docs/final-delete.png?raw=true)

### Update
![tela Update](https://github.com/MarVinReisSantos/crud_oficina_2.0/blob/main/docs/final-update.png?raw=true)

## Sugestões de Melhorias para o projeto:
- Sistema de login e logout no crud;
- Nível de acesso ao sistema diferente na conta vendedor e Gerente;
- Cadastro de novas contas de vendedores na conta Gerente;
- Remoção de contas de vendedores desligados da empresa na conta Gerente;
- Implementação de API para envio do orçamento para e-mail do cliente.
