<!-- ====================================================================================================================================== -->
<!-- PHP comunicação com o banco de dados -->
<!-- ====================================================================================================================================== -->
<?php
	require_once "config.php";
	session_start();
	if (!isset($_SESSION['email_session']) && !isset($_SESSION['senha_session'])) {
?>
<!-- ====================================================================================================================================== -->
<!-- Inicio do HTML -->
<!-- ====================================================================================================================================== -->
<html>
<head>
	<meta http-equiv ="content-type" content="text/html, charset-utf-8">
	<title> teste de sistema de cadastro</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<div id="topo"><div id="mensagem">Login Pcom-Talk</div>
		<div id="fundo">
			<div id="login">
				<form method="post" action="?go=logar">
					<table id="cad_tab">
<!-- ====================================================================================================================================== -->
<!-- Campo de email -->
<!-- ====================================================================================================================================== -->
						<tr>
							<td id="txt1">E-mail:</td>
							<td><input type ="text" name="email" id="email" class="txt" placeholder="Usuario / E-mail"/></td>
						</tr>
<!-- ====================================================================================================================================== -->
<!-- Campo de senha -->
<!-- ====================================================================================================================================== -->
						<tr>
							<td id="txt2">Senha:</td>
							<td><input type ="password" name="senha" id="senha" class="txt" maxlength ="20" placeholder="Senha"/></td>
						</tr>
<!-- ====================================================================================================================================== -->
<!-- Botao Logar -->
<!-- ====================================================================================================================================== -->
						<tr>
							<td colspan="2"><input type="submit" value="Login" id="botao"></td>
						</tr>
					</table>
<!-- ====================================================================================================================================== -->
<!-- Botao redirecionamento para cadastro -->
<!-- ====================================================================================================================================== -->
						<div id="cadastro">
							<a href="http://local.pcomchat.com/php/cadastro.php">
								Cadastrar
							</a>
						</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<!-- ====================================================================================================================================== -->
<!-- Consulta no banco para o usuario logar -->
<!-- ====================================================================================================================================== -->
<?php
	}else {
		echo "<meta http-equiv='refresh' content='0, url = php/Doc.php'>";
	}
?>
<?php
	if($_GET['go'] == 'logar') {
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		if(empty($email)) {
			echo"<script>alert('Preencha todos os campos para logar!');history.back();</script>";
		}elseif(empty($senha)) {
			echo"<script>alert('Preencha todos os campos para logar!');history.back();</script>";
		}else {
			$query1 = mysql_num_rows(mysql_query("SELECT * FROM Cadastro WHERE email = '$email' AND SENHA = '$senha'"));
			$result = mysql_query("SELECT * FROM Cadastro WHERE email = '$email' AND senha = '$senha'");
			$row = mysql_fetch_assoc($result);
			$id_user = $row['id_Cadastro'];
			if ($query1 == 1) {
				$_SESSION['email_session']=$email;
				$_SESSION['senha_session']=$senha;
				$_SESSION['id_session']=$id_user;
				echo "<script>alert('Usuario logado com sucesso!');</script>";
				echo "<meta http-equiv='refresh' content='0, url = ./php/Doc.php'>";
			}else {
				echo "<script>alert('Usuario ou senha incorretos!');history.back();</script>";
			}
		}
	}
?>