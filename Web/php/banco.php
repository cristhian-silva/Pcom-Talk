<?php
	require_once "config.php";
?>
<?php
	
	if($_GET['go']=='id') {
		echo '<pre>';
		$id = mysql_query("SELECT * FROM Mensagem");
		while($row = mysql_fetch_assoc($id)){
			echo "\n\n";
			var_dump($row);
		}
	}
?>
<!--$query = mysql_query("SELECT * FROM mensagem WHERE id_usuario = $_SESSION['id_usuario']")