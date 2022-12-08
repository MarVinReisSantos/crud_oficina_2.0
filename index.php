<?php
require "header.php";
include 'database.php';
?>
<section class="container">
    <div clas="span10 offset1">
        <div class="card">
            <div class="card-header center">
                <h3 class="well" style="text-align:center;">Mecânica 2.0 - Painel de Orçamentos</h3>
            </div>
        </div>  
        <div class="card-body">  
            <div class="d-flex justify-content-between py-md-3">
                <label for="tipos_filtro" id="label_tipos_Filtro">Filtro:
                    <select name="tipos_filtro" id="tipos_Filtro" onchange='trocaFiltro()'>
                        <option value="Nenhum">Nenhum</option>
                        <option value="Vendedor">Vendedor</option>
                        <option value="Cliente">Cliente</option>
                        <option value="Data">Data</option>             
                    </select>
                </label>
                <form class="form-horizontal" id="form-pesquisa" action="index.php" method="GET">
                    <label for="pesquisa" id="pesquisa-label"></label>
                </form>
                <div id="div-btn-show">
                    <a href="index.php" class="btn btn-primary float-right">Mostrar os Orçamentos</a>
                </div>
                <div class="div-btn-add">
                    <a href="create.php" class="btn btn-success float-right">Novo Orçamento</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pdo = DataBase::conectar();
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if (!empty($_GET)) {
                            if (!empty($_GET['Cliente'])){
                                $nome = $_GET['Cliente'];
                                
                                echo "<h3 style='text-align:center; color:#303037' class='py-md-3' >Busca por nome do cliente: ". $nome."</h3>";
                                
                                $sql = "SELECT * FROM orcamento WHERE nomeCliente='".$nome."' ORDER BY id DESC";
                                
                                foreach($pdo->query($sql)as $row){
                                    imprimirTabela($row);
                                }
                            }else if(!empty($_GET['Vendedor'])){
                                $nome = $_GET['Vendedor'];
                                
                                $sql = "SELECT * FROM orcamento WHERE nomeVendedor='".$nome."' ORDER BY id DESC";
                                
                                echo "<h3 style='text-align:center; color:#303037' class='py-md-3' >Busca por nome do vendedor: ". $nome."</h3>";
                                
                                foreach($pdo->query($sql)as $row){
                                    imprimirTabela($row);
                                }
                            }else if(!empty($_GET['DataInicial']) && !empty($_GET['DataFinal'])){
                                $dataInicial = $_GET['DataInicial'];
                                $dataFinal = $_GET['DataFinal'];
                                
                                echo "<h3 style='text-align:center; color:#303037' class='py-md-3' >Busca por período: ". implode('/', array_reverse(explode('-', $dataInicial)))." até ".implode('/', array_reverse(explode('-', $dataFinal)))."</h3>";
                                
                                $dataInicialNumero = number_format(str_replace("-", "", $dataInicial));
                                $dataFinalNumero = number_format(str_replace("-", "", $dataFinal));
                                
                                $sql = 'SELECT * FROM orcamento ORDER BY id DESC';

                                foreach($pdo->query($sql)as $row){
                                    $dataCadastradaNumero = number_format(str_replace("-", "", $row['dataCadastro']));
                                    if($dataCadastradaNumero>=$dataInicialNumero && $dataCadastradaNumero<=$dataFinalNumero){ 
                                        imprimirTabela($row);   
                                    }
                                }
                            }
                        }else{
                            $sql = 'SELECT * FROM orcamento ORDER BY id DESC';
                            foreach($pdo->query($sql)as $row){
                                imprimirTabela($row);
                            }
                        }
                    }

                    function imprimirTabela($row){
                        echo '<tr>';
                        echo '<th scope="row">'. $row['id'] . '</th>';
                        echo '<td>'. $row['nomeCliente'] . '</td>';
                        echo '<td>'. implode('/', array_reverse(explode('-', $row['dataCadastro']))). '</td>';
                        echo '<td>'. $row['horaCadastro'] . '</td>';
                        echo '<td>'. $row['nomeVendedor'] . '</td>';
                        echo '<td>'. $row['telefone'] . '</td>';
                        echo '<td>'. $row['descricao'] . '</td>';
                        echo '<td>R$ '.str_replace(".", ",",$row['precoOrcamento']).'</td>';
                        echo '<td width=300 align="center"> ';
                        echo '<a class="btn btn-primary" href="read.php?id='.$row['id'].'">Info</a>';
                        echo '<a class="btn btn-warning mx-md-1" href="update.php?id='.$row['id'].'">Atualizar</a>';
                        echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Excluir</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    DataBase::desconectar();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="./assets/js/filtro-pesquisa.js"></script>
<?php
require('footer.php');
?>
