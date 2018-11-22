// JavaScript Document
// recupera a data atual
function dataAtual(){

var data = new Date();
var dia = data.getDate();
var mes = data.getMonth() + 1;
var ano = data.getYear();

var dataAtual = (dia+"/"+mes+"/"+ano);

document.getElementById("data").value = dataAtual;
}
