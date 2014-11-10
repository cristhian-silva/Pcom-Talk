<?php
	session_start();
	require_once "config.php";
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/mensagem.css">
	<meta charset="UTF-8">
</head>
<body>
<?php 
	$id = $_GET['id'];
	$query = mysql_query("SELECT * FROM Mensagem WHERE id_Mensagem = $id");
	while($row = mysql_fetch_assoc($query)){
		$email = $row['dados'];
		$texto = $row['texto'];
	}
?>
	<form method="POST" action="?go=enviar">
		<input type="hidden" name="id" value="<?php echo $id ?>">
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
			<input type="email" name="email" size="40" value ="<?php echo "$email" ?>">
<!-- =========================================================================================================================== -->
<!-- Campo para digitar a mensagem -->
<!-- =========================================================================================================================== -->
		<div id="externa">
			<div id="interna"> 
				<p id="titulo-mensagem"> Criar Mensagem: </p>
				<div id ="mensagem">
					<TEXTAREA name="mensagem"> <?php echo"$texto";?> </TEXTAREA>
				</div>
			 </div>
		</div>
	</form>
</body>
</html>
<?php
	if($_GET['go']=='enviar') {
		$id_mensagem = $_POST['id'];
		$dados2 = $_POST['email'];
		$texto2 = $_POST['mensagem'];
		
		mysql_query("UPDATE Mensagem SET texto = '$texto2', dados = '$dados2' WHERE id_mensagem = $id_mensagem");		
		echo "<meta http-equiv='refresh' content='0, url = ./Doc.php'>";
	}
?>