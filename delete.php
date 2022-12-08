<?php
require 'database.php';
require "header.php";

$id = 0;

if(!empty($_GET['id'])){
    $id = $_REQUEST['id'];
}

if(!empty($_POST)){
    $id = $_POST['id'];

    $pdo = DataBase::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM orcamento where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    DataBase::desconectar();
    header("Location: index.php");
}
?>
<section class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3 class="well">Excluir Orçamento</h3>
        </div>
        <form class="form-horizontal" action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>" />
            <div class="alert alert-danger"> Deseja excluir o orçamento?
            </div>
            <div class="form actions">
                <button type="submit" class="btn btn-danger">Sim</button>
                <a href="index.php" type="btn" class="btn btn-secondary">Não</a>
            </div>
        </form>
    </div>
</section>
<?php
    require('footer.php');
?>
