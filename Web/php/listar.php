<?php
	session_start();
	require_once "config.php";
?>
<html>
<head>
	<title> Ver Mensagem</title>
</head>
<body>
	<div id="camp">
	<?php
		$id_user = $_SESSION['id_session'];
		$procura = mysql_query("SELECT * FROM Mensagem WHERE Cadastro_id_Cadastro = $id_user");
		while ($ver = mysql_fetch_assoc($procura)) {
		$mensagem = $ver['texto'];
		echo "<script>alert('$mensagem');</script>";
		echo "<meta http-equiv='refresh' content='0, url = ./Doc.php'>";	
		}	
	?>
	</div>
</body>
</html>