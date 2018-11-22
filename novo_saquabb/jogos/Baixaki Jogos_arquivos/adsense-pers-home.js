// JavaScript Document
function google_ad_request_done(google_ads) {
if (google_ads.length < 1 )
return;
var firstAdUnit = '';
/*    if (google_info.feedback_url) {
      var s = '<a href=\"' + google_info.feedback_url + '\" style="color:#000000;">An&uacute;ncios Google</a><br />';
    } else {
      var s = '<span style="font-size: 11px;">An&uacute;ncios Google</span><br>';
    }*/
var s='';
firstAdUnit = s;
if (google_ads[0].type == 'text') { 
for(i = 0; i < google_ads.length; ++i) {
s = '<div id="adsense_pers_in"><a href="' + google_ads[i].url + '" target="_blank"><strong class="titulo_12">' + google_ads[i].line1 +  ':&nbsp;</strong><br /><span class="adsense_pers_in_tx">' + google_ads[i].line2 + ' ' + google_ads[i].line3 + '</span>&nbsp; <span style="font-family:verdana, arial;font-size:10px;" class="corpadrao">' + google_ads[i].visible_url +'</span></a></div>';
firstAdUnit += s;
}
}
if (google_ads[0].type == 'image') {
s = '<tr><td align="center">' +
'<a href="' + google_ads[0].url + '"style="text-decoration:none">' +
'<img src="' + google_ads[0].image_url + 
'" height="' + google_ads[0].height + 
'" width="' + google_ads[0].width +
'" border="0"></a></td></tr>';
firstAdUnit = s;
}

document.getElementById("adsense_pers").innerHTML += firstAdUnit;
return;
}
google_ad_client = "pub-7019091094896260";
google_ad_output = 'js';
google_max_num_ads = '4';
google_feedback = "on";
google_ad_type  = "text";
google_encoding = "latin1";
//2007-05-18: Baixaki Jogos - Home
google_ad_channel = "8166391260";