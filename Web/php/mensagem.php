<!-- =========================================================================================================================== -->
<!-- Comunicação com o banco de dados -->
<!-- =========================================================================================================================== -->
<?php
	session_start();
	require_once "config.php";
?>
<!-- =========================================================================================================================== -->
<!-- Código HMTL -->
<!-- =========================================================================================================================== -->
<html>
	<head>
		<title> Nova Mensagem </title>
		<link rel="stylesheet" type="text/css" href="../css/mensagem.css">
		<meta charset="UTF-8">
	</head>
<body>
	<form method="POST" action="?go=enviar">
		<div id="sup">
			<img id="esquerda" src="../Imgs/pcom.jpg">
			<img id="direita" src="../Imgs/descr.jpg"> 
		</div>
<!-- =========================================================================================================================== -->
<!-- Botão Enviar -->
<!-- =========================================================================================================================== -->
	<div>
		<label>
			<a href="?go=enviar">
				<input id="botao" name="enviar" type="submit" value="Enviar">
			</a>
		</label>
	</div>
<!-- =========================================================================================================================== -->
<!-- Campo e-mail para o destinatario -->
<!-- =========================================================================================================================== -->
	<div id="para"> Para: </div> 
		<input type="email" name="email" size="40">
<!-- =========================================================================================================================== -->
<!-- Campo para digitar a mensagem -->
<!-- =========================================================================================================================== -->
		<div id="externa">
			<div id="interna"> 
				<p id="titulo-mensagem"> Criar Mensagem: </p>
				<div id ="mensagem">
					<TEXTAREA name="mensagem"> </TEXTAREA>
				</div>
			 </div>
		</div>
	</fomr>
</body>
</html>
<!-- =========================================================================================================================== -->
<!-- Inicio do codigo php (Enviar as mensagens para o banco) -->
<!-- =========================================================================================================================== -->
<?php
	if ($_GET['go'] == 'enviar') {
		$dados = $_POST['email'];
		$mensagem = $_POST['mensagem'];
		$data = date('Y-m-d');
		$id_user = $_SESSION['id_session'];
			
		mysql_query("insert into Mensagem (dados, texto, data, Cadastro_id_Cadastro) values ('$dados','$mensagem','$data', $id_user)");
		echo "<meta http-equiv='refresh' content='0, url = ./Doc.php'>";
	}
?>
<!-- =========================================================================================================================== -->