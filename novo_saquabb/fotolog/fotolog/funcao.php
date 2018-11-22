<?php
function gera_arquivo($tipo) {
	$string[0] = 'a';
	$string[1] = 'b';
	$string[2] = 'b';
	$string[3] = 'd';
	$string[4] = 'e';
	$string[5] = 'f';
	$string[6] = 'g';
	$string[7] = 'h';
	$string[8] = 'i';
	$string[9] = 'j';
	$string[10] = 'k';
	$string[11] = 'l';
	$string[12] = 'm';
	$string[13] = 'o';
	$string[14] = 'p';
	$string[15] = 'q';
	$string[16] = 'r';
	$string[17] = 's';
	$string[18] = 't';
	$string[19] = 'u';
	$string[20] = 'v';
	$string[21] = 'x';
	$string[22] = 'z';
	$string[23] = 'w';
	$string[24] = 'y';
	$nome = "";
	$pos = strpos($tipo,"/");
	$pos = $pos + 1;
	$extensao="";
	for($x=$pos;$x<=strlen($tipo);$x++) {
		$extensao .= $tipo[$x];
	}
	for($x=0;$x<=20;$x++) {
		mt_srand((double)microtime()*1000000);
		$nome .= $string[mt_rand(0,sizeof($string))];
	};
	$nome .= "." . $extensao;
	return $nome;
}
		
$path = "d:\home\domains\equipesombra.com.br\web\fotolog\";
ini_set("session.use_trans_sid",1);
?>