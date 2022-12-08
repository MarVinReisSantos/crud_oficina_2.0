# Processo Seletivo Codificar - Projeto CRUD Oficina 2.0 em PHP

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
- Na pasta databaseSQL há a tabela orcamento_modelo e a tabela orcamento_populado no qual foi inserido dados falsos para teste das funcionalidades do projeto. 
- Executar a query orcamento_populado.sql ou importar o arquivo no phpMyAdmin para criar a table necessária.
- Editar o arquivo **database.php** 

```
$dbNome = 'nomeDaTable' 
$dbHost = 'nomeDoDominioOuIP:Porta' 
$dbUsuario = 'usuarioDoMysql' 
$dbSenha 'senhaDoUsuario'

```

## Imagem da tela Index:
![Resultado final da atividade](https://github.com/MarVinReisSantos/crud_oficina_2.0/blob/main/docs/final-index.png?raw=true)
## Imagem da tela Index com Filtro Cliente:

## Imagem da tela Index com Filtro Vendedor:

## Imagem da tela Index com Filtro de período de datas:

## Sugestões de Melhorias para o projeto:
- Sistema de login e logout no crud;
- Nível de acesso ao sistema diferente na conta vendedor e Gerente;
- Cadastro de novas contas de vendedores na conta Gerente;
- Remoção de contas de vendedores desligados da empresa na conta Gerente;
- Implementação de API para envio do orçamento para e-mail do cliente.
