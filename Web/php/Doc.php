<?php
	session_start();
	require_once "config.php";
	if (!isset($_SESSION['email_session']) && !isset($_SESSION['senha_session'])) {
		echo "<meta http-equiv='refresh' content='0, url = ../'>";
	}else{
?>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../css/pcom.css">
		<title> Pcom Talk </title>
	</head>
<body>
<!-- ============================================================================================================== -->		
		<!-- Logo Pcom -->
<!-- ============================================================================================================== -->
		<div id="pcom"> 
			<img src="../../Imgs/pcom.jpg">
		</div>
	<div id="centro-da-pagina">
<!-- ============================================================================================================== -->
		<!-- Descrição lado direito -->
<!-- ============================================================================================================== -->
		<div id="descr">
			<img src="../../Imgs/descr.jpg">
		</div>
<!-- ============================================================================================================== -->
		<!-- Botões Criar - Listar - Editar - Excluir-->
<!-- ============================================================================================================== -->
		<nav id="botlaranja">
			<ul>
				<li>
					<a href="./mensagem.php">
						<input type="button" value="CRIAR">
					</a>
				</li>
				<li>
					<a href="./listar.php">
					<input type="button" value="LISTAR">
					</a>
				</li>
				<li>
					<a href="./editar_tudo.php">
					<input type="button" value="EDITAR">
					</a>
				</li>
				<li>
					<a href="./excluir_tudo.php">
					<input type="button" value="EXCLUIR">
					</a>
				</li>
		</nav>
<!-- ============================================================================================================== -->
		<!-- Fim dos botôes Criar - Listar - Editar - Excluir -->
		<!-- Inicio de dados de mensagens -->
<!-- ============================================================================================================== -->
		<div id="titulos">
			<table>
				<tr>	
					<td width="256">
						Mensagem
					</td>
					<td width="256">
						Email
					</td>
					<td width="252">
						Data
					</td>
					<td width="256">
						Ações
					</td>
				</tr>
			</table>
		</div>
<!-- ============================================================================================================== -->
		<!-- Fim de dados de mensagens -->
		<!-- Inicio das tabelas -->
<!-- ============================================================================================================== -->
		<div id="tabs">
			<table>
<!-- ============================================================================================================== -->
		<!-- Codigo PHP listar Nome -->
<!-- ============================================================================================================== -->
	<?php
		$id_user = $_SESSION['id_session'];	
		$sql = "SELECT * FROM Mensagem WHERE Cadastro_id_Cadastro = $id_user";
		$processo = mysql_query($sql);
	?>
<!-- ============================================================================================================== -->
		<!-- Codigo PHP listar E-mail -->
<!-- ============================================================================================================== -->

<!-- ============================================================================================================== -->
				<!-- Tabelas listadas -->
<!-- ============================================================================================================== -->
					<?php while ($linha = mysql_fetch_assoc($processo)): ?>	
				<tr>
					<td width="256" height="20">
						<?= $linha['texto'] ? $linha['texto'] : '' ?>
					</td>
					<td width="256" height="20">
						<?= $linha['dados'] ? $linha['dados'] : '' ?>
					</td>
					<td width="252" height="20">
						<?= $linha['data'] ? $linha['data'] : '' ?>
					</td>
					<td width="256" height="20">	
						<a href="./ver.php?id=<?= $linha['id_Mensagem'] ?>">
							<img id="olho" src=" ../../Imgs/olho.jpg">
						</a>
						<a href="./editar.php?id=<?= $linha['id_Mensagem'] ?>">
							<img id="caneta"src="../../Imgs/caneta.jpg">
						</a>
						<a href="./excluir.php?id=<?= $linha['id_Mensagem'] ?>">
							<img id="x"src="../../Imgs/x.jpg">
						</a>
					</td>
				</tr>
			<?php endwhile;?>
			</table>
		</div>
<!-- ============================================================================================================== -->
		<!-- Fim das Tabelas -->
		<!-- Inicio do botão nova mensagem -->
<!-- ============================================================================================================== -->
		<div id="botao">
			<div id="novamensagem">
				<a href="./mensagem.php">
				<input id="criarnova" type="button" value="Criar nova mensagem">
				</a>
			</div>
		</div>
<!-- ============================================================================================================== -->
		<!-- Fim do botao criar nova mensagem -->
		<!-- Inicio do rodapé da pagina -->
<!-- ============================================================================================================== -->
	</div>
<!-- ====================================================================================================================================== -->
<!-- Botao Sair -->
<!-- ====================================================================================================================================== -->
	<div id="Sair"><a href="?go=sair"><input type="submit" value="Sair"></a></div>
	
<!-- ====================================================================================================================================== -->
<!-- Fim da pagina -->
<!-- ====================================================================================================================================== -->
		<div id="fim">
			<div id="img"><img src="../../Imgs/pcom_02.jpg"></div>
			<div id="primeiro"> Cursos e Treinamentos </div>
			<div id="segundo"> Todos os direitos reservados </div>
		</div>
</body>
</html>
<?php
	}
	if($_GET['go']=='sair') {
		unset($_SESSION['email_session']);
		unset($_SESSION['senha_session']);
		echo "<meta http-equiv='refresh' content='0, url = ../'>";
	}
?>