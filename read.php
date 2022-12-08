<?php
require "header.php";
require 'database.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
} else {
    $pdo = DataBase::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM orcamento where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    DataBase::desconectar();
}
?>

<section class="container">
    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well" style="text-align:center;">Mecânica 2.0 - Informações do Orçamento</h3>
            </div>
            <div class="container">
                <div class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Cliente:</label>
                        <div class="controls form-control">
                            <label class="carousel-inner">
                                <?php echo $data['nomeCliente']; ?>
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Data:</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['dataCadastro']; ?>
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Hora:</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['horaCadastro']; ?>
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Vendedor:</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['nomeVendedor']; ?>
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Telefone:</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['telefone']; ?>
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Descricao:</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo $data['descricao']; ?>
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Valor:</label>
                        <div class="controls form-control disabled">
                            <label class="carousel-inner">
                                <?php echo "R$ ".$data['precoOrcamento']; ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-actions">
                        <a type="btn" class="btn btn-success" onclick="imprimir()">Imprimir</a>    
                        <a href="index.php" type="btn" class="btn btn-secondary my-md-3">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function imprimir(){
            window.print();
        }
    </script>
</section>
<?php
require('footer.php');
?>
