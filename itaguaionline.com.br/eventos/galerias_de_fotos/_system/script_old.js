<!--
var status_info=new Array(
"Go to previous picture","Go to next picture",
"Go back to album list","Go to the first picture in this album",
"Go to the last picture in this album","Go to specified picture in this album",
"Go back to thumbnail preview", "Switch to normal view", "Switch to thumbnail view", "Switch to Slide Show");
function jump_uri(main_dir, current_pic, dir_name, img_id) {
	var id;
	id=parseInt(window.prompt("Enter Picture ID: ",current_pic)); 

	if(id>0) {
		id=parseInt(id);
		id--; // match index
		if(id < 0 || id >= parseInt(img_id)) {
			alert("Image Id: " + (id+1) + " not within boundary limits");
		}
		else return(main_dir + "default.asp?dir=" + dir_name + "&next_id=" + parseInt(id) + "&max_pic=" + parseInt(img_id));
	}
	return 'javascript://';
}
function confirmChecked() {
	if(document.thumbnail.rand.checked) {
		document.thumbnail.prv[2].checked=true;
		return;
	}
	document.thumbnail.prv[0].checked=true;
}
function status_window(context) {
	window.status=status_info[context];
}
function change_status(with_this) {
	window.status=with_this;
}
function AlbumClicked(name) {
	document.thumbnail.dir.value=name;
	document.thumbnail.submit();
}
function over() {
    window.event.srcElement.style.filter = "alpha(opacity=100)";
}
function out() {
    window.event.srcElement.style.filter = "alpha(opacity=50)";
}
function runSlideShow(){
	if (document.all) {
		document.images.SlideShow.style.filter=rand_anim[(Math.round(Math.random()*10)%rand_anim_len)];
		document.images.SlideShow.filters[0].Apply();
	}
	document.images.SlideShow.src = preLoad[j].src
	if (document.all) {
		document.images.SlideShow.filters[0].Play();
	}
	j = ((j+1)%(length))?j+1:0;
	t = setTimeout('runSlideShow()', slideShowSpeed);
}
//-->