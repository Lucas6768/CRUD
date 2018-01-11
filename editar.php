<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<script type="text/javascript" src="jquery-3.2.1.js"></script>
 <script src="jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $(function(){
        $("#valor").maskMoney({symbol:'R$ ', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
    })});
</script>
<style type="text/css">
  #p1{
    margin-top: 4%;
    margin-left: 30%;
    font-size: 19px;
  }#tl{
      background-color:#9CC;
      font-size: 25px;

      margin-left:  0%;
      
      }
    #tb{
      background-color: #ADD8E6;
      margin-right: 50%;
      margin-left:  0%;
      
      }fieldset{

        margin-left: 30%;
    width:30%;
    background-color: #ADD8E6;
    border:2px #333 solid;
      }
</style>
</head>
	

<body>
<?php
    include_once 'conexao.php';
    $sql='select * from produto where codigo='.$_GET['editar'];
    $result=mysql_query($sql,$con);
    $linha=mysql_fetch_array($result);
    ?>

  <form <?php echo "<form action= 'evento.php?editar=".$linha['codigo']."'method='post'>";?>>

    <?php
 session_start();
 if(isset($_SESSION['id'])==0 and isset($_SESSION['nome'])==0){
  echo "<script> window.location='login.php'</script>";
}else{
  $nome=$_SESSION['nome'];
  echo "<div id='p1'>Usuário: $nome <a href='login.php'>Sair</a></div><br>";
}
?>
  <fieldset>    <div id="tl">Formulário de atualização de produto</div>
   <div id="tb">
        Produto<br>
         <input type="text" maxlength="8" size="30px" name="produto" value="<?php echo $linha['nome'];?>" required><p></p>
        Preço<br>
         <input type="text" id="valor" size="30px" name="preco" value="<?php echo $linha['preco'];?>" required><p></p>
        
      <button type="submit">Editar</button>
    </div>
   </fieldset>

  </form>

</body>
</html>

