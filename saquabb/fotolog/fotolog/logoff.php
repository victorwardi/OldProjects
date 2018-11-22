<?php
if (isset($_COOKIE["login"])) {
	unset($_SESSION["login"]);
	setcookie ("login", "", time() - 3600);
	echo "Você saiu do Sistema!</p>";
	print "<a href='index.php'>Voltar à Página Principal!</a></p>";
	exit;
} else {
	header("Location: logar.php");
	exit;
}
?>