<?php
if (isset($_COOKIE["login"])) {
	unset($_SESSION["login"]);
	setcookie ("login", "", time() - 3600);
	echo "Voc� saiu do Sistema!</p>";
	print "<a href='index.php'>Voltar � P�gina Principal!</a></p>";
	exit;
} else {
	header("Location: logar.php");
	exit;
}
?>