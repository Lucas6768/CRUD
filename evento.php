



<?php
session_start();
 if(isset($_SESSION['id'])==0 and isset($_SESSION['nome'])==0){
  echo "<script> window.location='login.php'</script>";
}else{
  $userId=$_SESSION['id'];
  $nome=$_SESSION['nome'];
}




 include_once'conexao.php';
 if(isset($_POST['produto']))$atrProduto = $_POST['produto'];
 if(isset($_POST['preco']))$atrPreco = $_POST['preco'];
 if(isset($_GET['cadastro']))
 {

 
$sql = sprintf("INSERT INTO `produto` SET `nome` = \"%s\", `preco` = \"%s\", `id_funcionario` = \"%d\";",
    $atrProduto,
    $atrPreco,
    $userId);

 mysql_query($sql,$con);
 echo "<script>alert('Produto cadastrado com sucesso!')</script>";
 }
 if(isset($_GET['deletar'])){
 $sql = "delete from produto where codigo = ".$_GET['deletar'];
 mysql_query($sql,$con);
 echo "<script>alert('Produto deletado com sucesso!')</script>";
 }
 if(isset($_GET['editar'])){
 $sql = "update produto set nome= '".$atrProduto."',preco='".$atrPreco."',id_funcionario=".$userId."  where codigo=".$_GET['editar'];
 echo "$sql";
 mysql_query($sql,$con);
 echo"<script> alert('Produto atualizado com sucesso')</script>";
 }
 echo"<script>window.location='index.php'</script>";