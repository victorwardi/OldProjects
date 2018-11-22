// JavaScript Document

var novidade_anterior = 'tudo';
var novidade_link_anterior = false;

function change_novidade(tipo, novlink)
{
	layer_anterior = 'novidade_' + novidade_anterior;
	link_anterior = 'novlink_' + novidade_anterior;	
	layer = 'novidade_' + tipo;
	link_atual = 'novlink_' + tipo;	
	novidade_anterior = tipo;
	if (document.getElementById)
	{
	// this is the way the standards work
	document.getElementById(layer_anterior).style.display = "none";
	document.getElementById(link_anterior).style.backgroundColor = "#585858";
	document.getElementById(layer).style.display = "block";
	document.getElementById(link_atual).style.backgroundColor = "#727272";
	}	
	else if (document.all)
	{
	// this is the way old msie versions work
	document.all[layer_anterior].style.display = "none";
	document.all[link_anterior].style.backgroundColor = "#585858";
	document.all[layer].style.display = "block";
	document.all[link_atual].style.backgroundColor = "#727272";
	}
	else if (document.layers)
	{
	// this is the way nn4 works
	document.layers[layer_anterior].style.display = "none";
	document.layers[link_anterior].style.backgroundColor = "#585858";
	document.layers[layer].style.display = "block";	
	document.layers[link_atual].style.backgroundColor = "#727272";
	}
}

function novidade_over(tipo)
{
	document.getElementById('novlink_' + tipo).style.backgroundColor = "#727272";
}

function novidade_out(tipo)
{
	if (tipo != novidade_anterior)
		document.getElementById('novlink_' + tipo).style.backgroundColor = "#585858";
}