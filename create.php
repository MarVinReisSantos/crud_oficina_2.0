<?php
require "header.php";
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeClienteErro = null;
    $nomeVendedorErro = null;
    $telefoneErro = null;
    $descricaoErro = null;
    $precoOrcamentoErro = null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        
        if (!empty($_POST['nomeCliente'])) {
            $nomeCliente = $_POST['nomeCliente'];
        } else {
            $nomeClienteErro = 'Por favor digite o nome do cliente!';
            $validacao = False;
        }


        if (!empty($_POST['nomeVendedor'])) {
            $nomeVendedor = $_POST['nomeVendedor'];
        } else {
            $nomeVendedorErro = 'Por favor digite o nome do vendedor!';
            $validacao = False;
        }


        if (!empty($_POST['telefone'])) {
            $telefone = $_POST['telefone'];
        } else {
            $telefoneErro = 'Por favor digite o telefone!';
            $validacao = False;
        }

        if (!empty($_POST['descricao'])) {
            $descricao = $_POST['descricao'];
        } else {
            $descricaoErro = 'Por favor digite a descrição do serviço!';
            $validacao = False;
        }

        if (!empty($_POST['precoOrcamento'])) {
            $precoOrcamento = $_POST['precoOrcamento'];
        } else {
            $precoOrcamentoErro = 'Por favor digite o valor do serviço!';
            $validacao = False;
        }
    }
    
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
    $hora = date('H:i');

    //Inserindo as informações no Banco de Dados:
    if ($validacao) {
        $pdo = DataBase::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO orcamento (nomeCliente, dataCadastro, horaCadastro, nomeVendedor, telefone, descricao, precoOrcamento) VALUES(?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nomeCliente, $data, $hora, $nomeVendedor, $telefone, $descricao, $precoOrcamento));
        DataBase::desconectar();
        header("Location: index.php");
    }
}
?>

<section class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header center">
                <h3 class="well" style="text-align:center;">Mecânica 2.0 - Adicionar Orçamento</h3>
            </div>
            <div class="card-body">
                <form class="orcamento_corpo_form" action="create.php" method="post">
                    <div class="mb-3  <?php echo !empty($nomeClienteErro) ? 'error ' : ''; ?>">
                        <label class="form-label" for="nomeCliente">Nome do Cliente:</label>
                        <input size="50" maxlength="50" class="form-control" id="nomeCliente" name="nomeCliente" type="text" placeholder="Nome do Cliente"
                            value="<?php echo !empty($nomeCliente) ? $nomeCliente : ''; ?>">
                        <?php if (!empty($nomeClienteErro)): ?>
                            <span class="text-danger"><?php echo $nomeClienteErro; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3 <?php echo !empty($nomeVendedorErro) ? 'error ' : ''; ?>">
                        <label class="form-label" for="nomeVendedor">Nome do Vendedor:</label>
                            <input size="50" maxlength="50" class="form-control" name="nomeVendedor" id="nomeVendedor" type="text" placeholder="Nome do Vendedor"
                                    value="<?php echo !empty($nomeVendedor) ? $nomeVendedor : ''; ?>">
                            <?php if (!empty($nomeVendedorErro)): ?>
                                <span class="text-danger"><?php echo $nomeVendedorErro; ?></span>
                            <?php endif; ?>
                    </div>
                    <div class="mb-3 <?php echo !empty($telefoneErro) ? 'error ' : ''; ?>">
                        <label class="form-label" for="telefone">Telefone:</label>
                        <input size="35" maxlength="11" class="form-control" name="telefone" id="telefone" type="number" placeholder="Telefone"
                                value="<?php echo !empty($telefone) ? $telefone : ''; ?>">
                        <?php if (!empty($telefoneErro)): ?>
                            <span class="text-danger"><?php echo $telefoneErro; ?></span>
                        <?php endif; ?>
                    </div>   
                    <div class="mb-3 <?php echo !empty($descricaoErro) ? 'error ' : ''; ?>">
                        <label class="form-label" for="descricao">Descriçao do Serviço:</label>
                            <textarea maxlength="500" style="resize:none; height:200px" class="form-control" name="descricao" id="descricao" type="text" placeholder="descricao"
                                    value="<?php echo !empty($descricao) ? $descricao : ''; ?>"></textarea>
                            <?php if (!empty($descricaoErro)): ?>
                                <span class="text-danger"><?php echo $descricaoErro; ?></span>
                            <?php endif; ?>
                    </div>
                    <div class="mb-3 <?php echo !empty($precoOrcamentoErro) ? 'error ' : ''; ?>">
                        <label class="form-label" for="precoOrcamento">Valor: R$ </label>
                        <input size="35"  name="precoOrcamento" id="precoOrcamento" type="number" placeholder="Valor"
                                value="<?php echo !empty($precoOrcamento) ? $precoOrcamento : ''; ?>">
                        <?php if (!empty($precoOrcamentoErro)): ?>
                            <span class="text-danger"><?php echo $precoOrcamentoErro; ?></span>
                        <?php endif; ?>
                    </div> 
                    <div class="form-actions"><br/>
                        <button type="submit" class="btn btn-success">Adicionar</button>
                        <a href="index.php" type="btn" class="btn btn-secondary">Voltar</a>
                    </div>    
                </form>
            </div>
        </div>
    </div>
</section>
<?php
require('footer.php');
?>
