<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/xhtml1-loose.dtd">
<html>
<head>
<title>Whois do Andr&eacute; v 1.0</title>
<!--
	Exemplo de como aplicar a classe de busca de dominios
//-->
<style type="text/css">
* {
	margin:0;
	padding:0;
}
body {
	background:#FFF;
	color:#000;
	border:0;
	font:78% Georgia,Garamond,"Times New Roman","MS Serif","New York",serif;
}
h1 {
  margin:0;
  padding:0;
  text-align:center;
 }
#box {
	width:500px;
	margin:auto auto auto auto;
	text-align:center;
}
.texto {
	border:1px solid #c1c1c1;
	padding:4px;
}	

#resp {
	width:500px;
	margin:auto auto auto auto;
}	

 </style>
 </head>
 <body>
 <h1>Whois do Andr&eacute;</h1>
	<div id="box">
	 <form action="" method="post">
	 <input type="text" name="url" class="texto"><br /><br />
	 <input type="submit" name="Ok">
	 </form>	
	</div>
<br />

<?php 
if(isset($_POST['Ok'])) {
	include_once("whois_do_andre.php");
?>
<div id="resp">
<h1>Resposta</h1>
<?php
	$busca = new dominio;
	$busca->checa_dominio($_POST['url']);
	$busca->whois();
}
?>
</div>
 </body>
