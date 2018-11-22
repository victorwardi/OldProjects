var top_ultimo;
top_ultimo = '1';
function over(n)
{	
	document.getElementById("img" + top_ultimo ).className = "hide" ;
	document.getElementById("div" + top_ultimo ).className = "top_off" ;	
//	document.getElementById("num" + top_ultimo ).src = "/img/home/top_off/" +  top_ultimo + ".jpg" ;
	document.getElementById("topn" + top_ultimo ).className ="topoff corpadrao";
	
	document.getElementById("img" + n ).className = "show" ;
	document.getElementById("div" + n ).className = "top_on" ;	
//	document.getElementById("num" + n ).src = "/img/home/top_on/" +  n + ".jpg" ;
	document.getElementById("topn" + n ).className ="topon corpadrao";
	
	top_ultimo = n;
}
