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
		$id_mensagem = $_GET['id'];
		$id_user = $_SESSION['id_session'];
		$procura = mysql_query("SELECT * FROM Mensagem WHERE id_Mensagem = $id_mensagem");
		while ($ver = mysql_fetch_assoc($procura)) {
		$mensagem = $ver['texto'];
		echo "<script>alert('$mensagem');</script>";
		echo "<meta http-equiv='refresh' content='0, url = ./Doc.php'>";	
		}	
	?>
	</div>
</body>
</html>