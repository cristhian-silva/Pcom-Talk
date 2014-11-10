<?php
	session_start();
	require_once "config.php";
?><html>
<head>
	<title></title>
</head>
<body>
	<?php
		$id = $_GET['id'];
		mysql_query("DELETE FROM Mensagem WHERE id_Mensagem = $id");
		echo "<meta http-equiv='refresh' content='0, url = ./Doc.php'>";
	?>
</body>
</html>