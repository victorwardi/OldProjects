// Barra de rolagem de imagens


var roll_pos = 0;
var roll_fim = 1330;
var velo_roll = 15; // velocidade da rolagem
var pixel_roll = 1; // quantidade de saltos entre os pixel
var roll_timout = 0;
var rolando = false;
var mostra = false;
var rolagem_ultimo=1;
var rolagem_max=6;

function move_left()
{		
	if(rolando)
	{		
		roll_pos += pixel_roll;
		if (roll_pos > 0 ) roll_pos  = - roll_fim;
		move();
		roll_timout = setTimeout("move_left()", velo_roll);
	}
}
function move_right()
{
	if(rolando)
	{
		roll_pos -= pixel_roll;
		if (roll_pos < - roll_fim) roll_pos  = 0;
		move();
		roll_timout = setTimeout("move_right()", velo_roll);
	}
}


function move() {
	document.getElementById('barra_rolagem').style.left =  roll_pos + 'px';
	
	if (((roll_pos - 90) %160 == 0) && mostra)
	{
		teste = parseInt(((roll_pos-40)/160 -2)*-1);
		abre_img(teste);
	}
}

function abre_img(index)
{
	if (index > rolagem_max) index = 1;
	document.getElementById('img_full').src = imgs[index];
	document.getElementById('img_' + rolagem_ultimo).className = "ImgBorda";
	rolagem_ultimo = index;
	document.getElementById('img_' + index).className = "ImgBordaOver";	
}

function muda_tempo(acelera)
{
	if (acelera) pixel_roll = 10;
	else pixel_roll = 1;	
}

function noMove() {
	clearTimeout(roll_timout);
	rolando = false;
}

function click_left()
{
	mostra=false;
	rolando=true;
	move_left();
}

function click_right()
{
	mostra=false;
	rolando=true;
	move_right();
}

function rolagem_slow()
{	
	rolando=true;
	mostra=true;
	muda_tempo(false);
	clearTimeout(roll_timout);
	move_right();	
}

function rolagem_fast()
{	
	rolando=true;
	mostra=true;
	muda_tempo(true);
	clearTimeout(roll_timout);
	move_right();
}