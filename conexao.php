<HTML>
<HEAD>
 <TITLE>Conexao</TITLE>
</HEAD>
<BODY>
<?php
  $host="localhost";
  $login="root";
  $senha="";
  $banco="controle_estoque";

  $con=mysql_connect($host,$login,$senha)or die("Erro ao conecta!".mysql_error());
  $sql="create database if not exists ".$banco;
  mysql_query($sql,$con);
  mysql_select_db($banco,$con);
  $sql = "create table if not exists funcionario(
  id_funcionario int(8) auto_increment,
  nome varchar(100) not null,
  senha varchar(50) not null,
  primary key(id_funcionario))";
  mysql_query($sql,$con);
  $sql="create table if not exists produto(codigo int(8) auto_increment,
  nome varchar(100) not null, preco varchar(15) not null, id_funcionario int(8) not null,
  primary key(codigo), foreign key(id_funcionario) references funcionario(id_funcionario))";
  mysql_query($sql);
?>

</BODY> 
</HTML>
