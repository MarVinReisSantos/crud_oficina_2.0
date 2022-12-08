<?php
require "header.php";
require 'database.php';

$id = null;
if(!empty($_GET['id'])){
    $id = $_REQUEST['id'];
}

if(null == $id){
    header("Location: index.php");
}

if(!empty($_POST)){

    $nomeClienteErro = null;
    $nomeVendedorErro = null;
    $telefoneErro = null;
    $descricaoErro = null;
    $precoOrcamentoErro = null;

    $nomeCliente = $_POST['nomeCliente'];
    $nomeVendedor = $_POST['nomeVendedor'];
    $telefone = $_POST['telefone'];
    $descricao = $_POST['descricao'];
    $precoOrcamento = $_POST['precoOrcamento'];

    //Validação
    $validacao = true;
    if (empty($nomeCliente)) {
        $nomeClienteErro = 'Por favor digite o nome do cliente!';
        $validacao = false;
    }

    if (empty($nomeVendedor)) {
        $$nomeVendedorErro = 'Por favor digite o nome do vendedor!';
        $validacao = false;
    }

    if (empty($telefone)) {
        $telefoneErro = 'Por favor digite o telefone!';
        $validacao = false;
    }

    if (empty($descricao)) {
        $descricaoErro = 'Por favor digite a descrição do serviço!';
        $validacao = false;
    }

    if (empty($precoOrcamento)) {
        $precoOrcamentoErro = 'Por favor digite o valor do serviço!';
        $validacao = false;
    }
    
    if ($validacao) {
        $pdo = DataBase::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE orcamento  set nomeCliente = ?, nomeVendedor = ?, telefone = ?, descricao = ?, precoOrcamento = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nomeCliente, $nomeVendedor, $telefone, $descricao, $precoOrcamento, $id));
        DataBase::desconectar();
        header("Location: index.php");
    }
}else {
    $pdo = DataBase::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM orcamento where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nomeCliente = $data['nomeCliente'];
    $nomeVendedor = $data['nomeVendedor'];
    $telefone = $data['telefone'];
    $descricao = $data['descricao'];
    $precoOrcamento = $data['precoOrcamento'];
    DataBase::desconectar();
}
?>
<section class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well" style="text-align:center;">Mecânica 2.0 - Atualizar Orçamento</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="update.php?id=<?php echo $id ?>" method="post">
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
                            <textarea maxlength="500" style="resize:none; height:200px" class="form-control" name="descricao" id="descricao" type="text" placeholder="descricao"><?php echo $descricao ?><?php if (!empty($descricaoErro)): ?><span class="text-danger"><?php echo $descricaoErro; ?></span><?php endif; ?>
                            </textarea>
                    </div>
                    <div class="mb-3 <?php echo !empty($precoOrcamentoErro) ? 'error ' : ''; ?>">
                        <label class="form-label" for="precoOrcamento">Valor: R$ </label>
                        <input size="35"  name="precoOrcamento" id="precoOrcamento" type="number" placeholder="Valor"
                                value="<?php echo !empty($precoOrcamento) ? $precoOrcamento : ''; ?>">
                        <?php if (!empty($precoOrcamentoErro)): ?>
                            <span class="text-danger"><?php echo $precoOrcamentoErro; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Atualizar</button>
                        <a href="index.php" type="btn" class="btn btn-secondary my-md-1">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
require('footer.php');
?>