window.defaultStatus = "Baixaki Jogos"
//  FAVORITOS
function favoritos() {if(window.sidebar){alert('Para adicionar o Baixaki Jogos aos seus favoritos clique em OK e depois pressione as teclas CTRL+D');	} else{		window.external.AddFavorite('http://www.baixakijogos.com.br/','Baixaki Jogos')}}

function abrejanela(URL,nome,w,h) {
msg=open(URL,"nome","width="+w+",height="+h+",toolbar=no,scrollbars=yes,resizable=yes,status=no,directories=no,menubar=no,location=no");
}

//	USUÁRIOS
function getCookie(name){
	var start=document.cookie.indexOf(name+"="); var len=start+name.length+1;
	if (start == -1) return null; var end=document.cookie.indexOf(";",len);
	if (end==-1) end=document.cookie.length; return unescape(document.cookie.substring(len,end));
}


function bxkuser(){
	var user=(getCookie("nznjogosuser") == null) ? "X" : getCookie("nznjogosuser");
	var avatar=(getCookie("nznjogosavatar") == null) ? "X" : getCookie("nznjogosavatar");
	var pontos=(getCookie("nznjogospontos") == null) ? "0" : getCookie("nznjogospontos");	
	user = user.replace(/\+/g, ' ');
	if (user.length > 10)
		user = user.substr(0,10) + '...';

	if (user.length > 1 ){ 
	
		w='<img src="'+avatar+'" width="49" height="65" /><span><b class="a13">Olá '+user+'</b><br />'+pontos+' pontos<br /> </span>';
		w=w+'<span><a href="/usuarios/MeuBaixaki.php">Minha área</a>         <a href="/usuarios/Logout.php">sair</a><br /></span>';
		
	}else{
		
		w="<br /><br />       <a href=/usuarios><b>Entrar</b></a> | <a href=/usuarios/cadastro.php>Cadastre-se</a>"; 
	}
	
	document.write(w);
}










