<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<style type="text/css">
		#tb{
			background-color:#9CC;
			font-size: 20px;

			margin-left:  -1%;
			
			}
		#tl{
			background-color: #ADD8E6;
			margin-left: -1%;

			
			}fieldset{
			margin-top: 5%;
			margin-left: 30%;
    width:40%;
    background-color: #ADD8E6;
    border:2px #333 solid;
			}
			
	</style>

</head>
<body>

<form method="post" action="">
<fieldset>
<div id="tb" ><b>Sistema Controle de Produtos</b></div>
<div id="tl">
	<br><b>Login</b>
	<br><input type="text" size="40" name="login" required>
	<br><b>Senha</b>
	<br><input type="password" size="40" name="senha" required minlength="8" maxlength="8" ><br><br>
 	<input type="submit" value="Entrar">
 </fieldset>
</form>
</div>
<?php
include_once "conexao.php";
if ((isset($_POST['login']))==0 and (isset($_POST['senha']))==0){

}else{
	$senha=$_POST['senha'];
	$login=$_POST['login'];


$sql="select * from funcionario where nome='$login' and senha='$senha'";
$result=mysql_query($sql,$con);
$res=mysql_num_rows($result);
if($res){
	$linha=mysql_fetch_array($result);
	session_start();
	$_SESSION['id']=$linha['id_funcionario'];
	$_SESSION['nome']=$linha['nome'];
	echo "<script> window.location=' index.php'</script>";		
}else{
    echo "<script>alert('Login ou Senha inválidos')</script>";
}
}
?>
</body>
</html>