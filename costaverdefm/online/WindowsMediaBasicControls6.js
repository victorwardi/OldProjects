/* www.isat.com.br

Todos os direitos reservados à ISAT BroadBand Internet Ltda.
Proibida a reprodução total ou parcial.

Contatos:
Home Page: http://www.isat.com.br
Telefone: + 55 19 3294-2139
FAX: + 55 19 3794-7414
E-mail: faleconosco@isat.com.br

www.isat.com.br */

/***************************************************
Controles básicos
Compatibilidade: IE
***************************************************/
var mObj = null;
var wmp = null;
var dc = "document.";
//var dc = "";
var browser = navigator.appName;
/***************************************************
Funcao: MoviePause(string)
Descricao: Pausa o Video
Parametros: 1 - Nome do Obj Windows Media (String)
Exemplo: MoviePause('WMP');
***************************************************/
function MoviePauseV6(wm) {
	mObj = eval(dc + wm);

	mObj.Pause();
}
/**************************************************/
/***************************************************
Funcao: MoviePlay(string)
Descricao: Inicia o Video
Parametros: 1 - Nome do Obj Windows Media (String)
Exemplo: MoviePlay('WMP');
***************************************************/
function MoviePlayV6(wm) {
	mObj = eval(dc + wm)

	if(mObj.PlayState==1) {
		mObj.Play();
	}
	else if (mObj.PlayState==2) {
		mObj.Pause();
	}
	else
		mObj.Play();
}
/***************************************************/
/***************************************************
Funcao: MovieStop(string)
Descricao: Para o Video
Parametros: 1 - Nome do Obj Windows Media (String)
Exemplo: MovieStop('WMP');
***************************************************/
function MovieStopV6(wm) {
	mObj = eval(dc + wm);

	mObj.Stop();
}
/***************************************************/
/***************************************************
Funcao: MovieForward(string)
Descricao: Avança o Video
Parametros: 1 - Nome do Obj Windows Media (String)
Exemplo: MovieForward('WMP');
***************************************************/
function MovieForwardV6(wm) {
	mObj = eval(dc + wm);

	mObj.fastForward();
}
/***************************************************/
/***************************************************
Funcao: MovieReverse(string)
Descricao: Volta o Video
Parametros: 1 - Nome do Obj Windows Media (String)
Exemplo: MovieReverse('WMP');
***************************************************/
function MovieReverseV6(wm) {
	mObj = eval(dc + wm);

	mObj.fastReverse();
}
/***************************************************/
/***************************************************
Funcao: MovieVolumeUp(string)
Descricao: Aumenta o Volume do Video
Parametros: 1 - Nome do Obj Windows Media (String)
Exemplos: 
	MovieVolumeUp('WMP'); -> Aumenta volume
***************************************************/
function MovieVolumeUpV6(wm) {
	mObj = eval(dc + wm);

    if (mObj.Volume <= -1000) {
  		mObj.Volume = mObj.Volume + 1000;
 	}
}
/***************************************************/
/***************************************************
Funcao: MovieVolumeDown(string)
Descricao: Dimimui o Volume do Video
Parametros: 1 - Nome do Obj Windows Media (String)
Exemplos: 
	MovieVolumeDown('WMP'); -> Diminui volume
***************************************************/
function MovieVolumeDownV6(wm) {
	mObj = eval(dc + wm);

    if (mObj.Volume >= -9000) {
  		mObj.Volume = mObj.Volume - 1000;
 	}
}
/***************************************************/
/***************************************************
Funcao: MovieSetVolume(string)
Descricao: Altera o Volume do Video
Parametros: 1 - Nome do Obj Windows Media (String)
Parametros: 2 - Valor do Volume (Int)
Exemplos: 
	MovieSetVolume('WMP', 50);
***************************************************/
function MovieSetVolumeV6(wm, val) {
	mObj = eval(dc + wm);

	if (browser == "Microsoft Internet Explorer") {
		if (val >= 0 && val <= 100) {
	  		mObj.Volume = 0 - ( 100 - val ) * ( 100 - val );
	 	}
		return true;
	}
	else {
		//Código Netscape
	}
}
/***************************************************/
/***************************************************
Funcao: MovieSwitchLanguage(string)
Descricao: Muda Idioma do Vídeo
Parametros: 1 - Nome do Obj Windows Media (String)
Exemplos: MovieSwitchLanguage('WMP');
***************************************************/
function MovieSwitchLanguageV6(wm) {
	mObj = eval(dc + wm);

	if (mObj.Balance < 0) {
		mObj.Balance = 10000;
	}
	else {
		mObj.Balance = -10000;
	}
}
function MovieFirstLanguageV6(wm) {
	mObj = eval(dc + wm);

	if (mObj.Balance <= 0) {
		mObj.Balance = 10000;
	}
}
function MovieSecondLanguageV6(wm) {
	mObj = eval(dc + wm);

	if (mObj.Balance >= 0) {
		mObj.Balance = -10000;
	}
}
/***************************************************/
/***************************************************
Funcao: MovieSwitchBand(string)
Descricao: Muda Banda do Vídeo
Parametros: 1 - Nome do Obj Windows Media (String)
Exemplos: MovieSwitchBand('WMP');
***************************************************/
function MovieSwitchBandV6(wm) {
	mObj = eval(dc + wm);

	if (ASXFile == ASXFileHigh) {
		ASXFile = ASXFileLow;
	}
	else {
		ASXFile = ASXFileHigh;
	}
	//pos = mObj.Controls.CurrentPosition;
	MovieChangeMovie(wm, ASXDirectory + ASXFile);
	//MovieSetPosition(wm, pos);
}
function MovieHighBandV6(wm) {
	if (ASXFile != ASXFileHigh) {
		MovieSwitchBand(wm);
	}
}
function MovieLowBandV6(wm) {
	if (ASXFile != ASXFileLow) {
		MovieSwitchBand(wm);
	}
}
/***************************************************/
/***************************************************
Funcao: MovieSetPosition(string)
Descricao: Para mudar posição do video
Parametros: 1 - Nome do Obj Windows Media (String)
			2 - Tempo em segundos (Int)
Exemplo: MovieSetPosition('WMP', 600);
***************************************************/
function MovieSetPositionV6(wm, pos) {
	mObj = eval(dc + wm);

	if (!isNaN(pos) && pos != '') {
		mObj.CurrentPosition = pos;
	}
}
/***************************************************/
/***************************************************
Funcao: MovieChangeMovie(string)
Descricao: Para o mudar arquivo asx do video
Parametros: 1 - Nome do Obj Windows Media (String)
			2 - Nome do arquivo asx
Exemplo: MovieChangeMovie('WMP', '../asx/exemplo.asx');
***************************************************/
function MovieChangeMovieV6(wm, movie) {
	wmGarb = wm;
	movieGarb = movie;
	mObj = eval(dc + wm);

	//mObj.URL = movie;

	if (mObj) {
		if (mObj.OpenState != null) {
			mObj.FileName = movie;
			clearTimeout(timerID_movie);
		}
		else {
			clearTimeout(timerID_movie);
			timerID_movie = setTimeout('MovieChangeMovie(wmGarb, movieGarb);', 1000);
		}
	}
	else {
		clearTimeout(timerID_movie);
		timerID_movie = setTimeout('MovieChangeMovie(wmGarb, movieGarb);', 1000);
	}
}
