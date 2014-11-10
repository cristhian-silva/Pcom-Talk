<?php
	$url = isset($_GET['url']) ? $_GET['url'] : '';
	$explode = explode('/',$url);

	if(isset($explode[0])&& $explode[0] == ''){
		include_once "index.php";
	}
	echo '<pre>';
	echo $url;
?>