<!DOCTYPE html>
<fieldset>
<?php
 session_start();
 if(isset($_SESSION['id'])==0 and isset($_SESSION['nome'])==0){
  echo "<script> window.location='login.php'</script>";
}else{
  $nome=$_SESSION['nome'];
  echo "<legend><div id='po'><b>Usuário: $nome <a href='logout.php'>Sair</a></b></div></legend>";
}
?>
<html>
<head>
<style>
.zebraUm{
  background-color: #ADD8E6;
}.zebraDois{
 background-color: #C0C0C0;
}
  fieldset{
    margin-top: 5%;
    margin-left: 30%;
    width:40%;

    background-color: #ADD8E6;
    border:2px #333 solid;
}

#h{
  margin-left: 30%;
  margin-right: 36.5%;
}
table{
  margin-left: 30%;
}
#tabela tr {
  border:1px solid #CCC;
}

#tabela td {
  width:70px;
  height:20px;
}
#tabela th{
  width:70px;
  height:20px;

}
#pl{
  font-size: 20px;
  background-color: #9CC;
  margin-left: -2%;
}
#pj{
  margin-left: -2%;
  margin-top: 3%;
}
#po{
  background-color: white;
  border:2px #333 solid; 
}
</style>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
   $('table tbody tr:odd').addClass('zebraUm');
   $('table tbody tr:even').addClass('zebraDois');
});


</script>

<script type="text/javascript" src="jquery-3.2.1.js"></script>
 <script src="jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $(function(){
        $("#valor").maskMoney({symbol:'R$ ', showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
    })});
</script>
</head>
<body>

<div id="pl"> <b>Cadastro de Produto</b></div>  
  
  <form  action ="evento.php?cadastro=true" method = "post" >
   
    <div id="pj">
      <label><b>Produto</b></label><br>
      <input type="text"  maxlength="10" size="50" name="produto" required >

      <br>
      <label><b>Preço</b></label><br>
      <input type="text" id="valor" size="50" name="preco" required ><br>
        
      <br><button type="submit">Cadastrar</button>
    </div>

</fieldset>
    
  </form>
</div>
   
        
     <br> 
     <?php
    $data = date('d-m-Y');
    $data .= ' '.date('H:i:s');

echo "<div id='h'>LISTA DE PRODUTOS - $data<hr></div>"
?>
     <table border="2" id="tabela">
 <thead>
  
<tr>
  <th>Id</th>
  <th>Produto</th>
  <th>Preço</th>
  <th>Funcionário</th>
  <th>Alterar</th>
  <th>Excluir</th>
</tr>

</thead>
<style type="text/css">

tbody tr:hover{background-color:#555;color:white};

 
</style>

    	<?php
            include_once "conexao.php";
            $sql = "select p.codigo, p.nome as np, p.preco, c.nome as nf from funcionario as c join produto as p on
            c.id_funcionario=p.id_funcionario";
            $result = mysql_query($sql,$con);
            if($result){
            while($linha = mysql_fetch_array($result)){
?>
<b>
<tbody id="horario">
       <tr>
           <td id='p3'> <?php  echo $linha['codigo'];?></td>
           <td> <?php echo $linha['np'];?></td>
           <td id='p4'> <?php echo $linha['preco'];?></td>
           <td> <?php echo $linha['nf'];?></td>       
           <td> <?php echo "<a id='p1' href = editar.php?editar=".$linha['codigo']." >editar </a>";?></td>
           <td> <?php echo "<a id='p2' href = evento.php?deletar=".$linha['codigo'].">excluir</a>";?></td>
       </tr>
</tbody>
</b>
<?php
          }//fim do while
          }//fim do if  
          mysql_close($con);
?>
</table> 

</body>
</html>
