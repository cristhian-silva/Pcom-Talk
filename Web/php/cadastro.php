<!-- ====================================================================================================================================== -->
<!-- PHP conectando ao banco de dados -->
<!-- ====================================================================================================================================== -->
<?php
	require_once "config.php";
?>
<!-- ====================================================================================================================================== -->
<!-- Inicio do HTML -->
<!-- ====================================================================================================================================== -->
<html>
<head>
	<meta http-equiv ="content-type" content="text/html, charset-utf-8">
	<title> teste de sistema de cadastro</title>
	<link rel="stylesheet" type="text/css" href="../css/cadastro.css">
</head>
<body>
	<div id="topo"><div id="mensagem">Cadastro Pcom-Talk</div></div>
	<div id="fundo">
	<div id="cadastro">
		<form method="post" action="?go=cadastrar">
			<table id="cad_tab">
<!-- ====================================================================================================================================== -->
<!-- Campo de cadastro do email -->
<!-- ====================================================================================================================================== -->
				<tr>
					<td>E-mail:</td>
					<td><input type ="text" name="email" id="email" class="txt" placeholder ="E-Mail"/></td>
				</tr>
<!-- ====================================================================================================================================== -->
<!-- Campo de cadastro de nome -->
<!-- ====================================================================================================================================== -->
				<tr>
					<td>Nome:</td>
					<td><input type ="text" name="nome" id="nome" class="txt" placeholder ="Nome: "/></td>
				</tr>
<!-- ====================================================================================================================================== -->
<!-- Campo de cadastro de senha -->
<!-- ====================================================================================================================================== -->
				<tr>
					<td>Senha:</td>
					<td><input type ="password" name="senha" id="senha" class="txt" maxlength ="20" placeholder ="Senha: "/></td>
				</tr>
<!-- ====================================================================================================================================== -->
<!-- Botão cadastrar -->
<!-- ====================================================================================================================================== -->
				<tr>
					<td colspan="2"><input type="submit" value="cadastrar" id="botao"></td>
				</tr>
			</table>
		</form>
	</div>
	</div>
</body>
</html>

<!-- ====================================================================================================================================== -->
<!-- Comunicação com o banco para enviar e salvar os dados cadastrados -->
<!-- ====================================================================================================================================== -->
<?php
	if($_GET['go'] == 'cadastrar') {
		$email = $_POST['email'];
		$nome = $_POST['nome'];
		$senha = $_POST['senha'];

		if(empty($nome)) {
			echo"<script>alert('Preencha todos os campos para se cadastrar!');history.back();</script>";
		}elseif(empty($email)) {
			echo"<script>alert('Preencha todos os campos para se cadastrar!');history.back();</script>";
		}elseif(empty($senha)) {
			echo"<script>alert('Preencha todos os campos para se cadastrar!');history.back();</script>";
		}else {
			$query1 = mysql_num_rows(mysql_query("SELECT * FROM Cadastro WHERE email = '$email'"));
			if ($query1 == 1) {
				echo "<script>alert('Usuario ja existe!');history.back();</script>";
			}else {
				mysql_query("insert into Cadastro (email, nome, senha) values ('$email','$nome','$senha')");
				echo "<script>alert('Usuario cadastrado com sucesso!')</script>";
				echo "<meta http-equiv='refresh' content='1; url=http://local.pcomchat.com/php/login.php'>";
			}
		}
	}
?>