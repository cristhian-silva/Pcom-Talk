<?php
	session_start();
	require_once "config.php";
?><html>
<head>
	<title></title>
</head>
<body>
	<?php
		$id_user = $_SESSION['id_session'];
		mysql_query("DELETE FROM Mensagem WHERE Cadastro_id_Cadastro = $id_user");
		echo "<meta http-equiv='refresh' content='0, url = ./Doc.php'>";
	?>
</body>
</html>