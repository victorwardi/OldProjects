<?php require_once('../Connections/saquabb.php'); ?>
<?php
mysql_select_db($database_saquabb, $saquabb);
$query_Recordset1 = "SELECT * FROM noticias ORDER BY id DESC";
$Recordset1 = mysql_query($query_Recordset1, $saquabb) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>




<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><title>REEF &gt; TEAM &gt; ALEX GRAY</title>

<meta name="description" content="Reef, the world's leader in authentic surf-inspired footwear, specializing in guys, womens, and kids sandals, shoes and apparel">
<meta name="keywords" content="reef, sandals, shoes, apparel, surf, skate, snow, wake, miss reef, reef girls">
<link rel="shortcut icon" href="http://www.reefbrazil.com/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="75_arquivos/urchin.js"></script>
<script type="text/javascript">
_uacct = "UA-214234-1";
urchinTracker();
</script>
<script type="text/javascript" src="75_arquivos/prototype.js"></script>
<script type="text/javascript" src="75_arquivos/moo_002.js"></script>
<script type="text/javascript" src="75_arquivos/moo.js"></script>
<script type="text/javascript" src="75_arquivos/common.js"></script>
<style type="text/css" media="all">
@import url("75_arquivos/typography.css");
@import url("75_arquivos/layout.css");
</style>

<script type="text/javascript">
<!-- //<![cdata[ 
	registerImageGif("seeall");
	registerImageGif("bio");
	registerImageGif("video");
	registerImageGif("bioclosebox");
	registerImageGif("vidclosebox");
	
if(document.images) {
	
}
	
function showHideInfo(which) {
	//set target element based on "which" variable
	//should be 'bio' or 'video'
	if(which == "bio") {
		targetElement = getobject("biocontslider");
		otherElement = getobject("biovidslider");
	}
	else if(which == "video") {
		targetElement = getobject("biovidslider");
		otherElement = getobject("biocontslider");
	}
	//if classname is hiding set to showing and hide other div
	if(targetElement.className == "hiding") {
		targetElement.className = "showing";
		otherElement.className = "hiding";
	} 
	else {
		targetElement.className = "hiding";
		otherElement.className = "hiding";
	}	
}
	
		
//]]> -->
</script>
<script type="text/javascript" src="75_arquivos/flashobject.js"></script></head>
<body bgcolor="#efefef">
<div id="horizon">
		<div id="wrappa">
				<table border="0" cellpadding="0" cellspacing="0" width="858">
						<tbody><tr>
								<td id="subtop"><table id="toptable" border="0" cellpadding="0" cellspacing="0">
												<tbody><tr>
													<td id="seeallcell" width="42"><a href="http://www.reefbrazil.com/teamdisplay/global/surf" title="SEE ALL  SURF" onmouseover="on('seeall')" onmouseout="off('seeall')"><img src="75_arquivos/seeall.gif" alt="SEE ALL" id="seeall" name="seeall" border="0" height="24" width="42"></a></td>
													<td id="topnavsmall" align="left" width="100"><a href="http://www.reefbrazil.com/teamdisplay/global/surf" title="SEE ALL surf" onmouseover="on('seeall')" onmouseout="off('seeall')">SEE ALL<br>SURF</a></td>
													<td id="biohead" style="text-align: right;" align="right">
														<div id="bioheadinfo">
															<span class="biocountry">USA</span>&nbsp;<span class="secheadline">ALEX GRAY</span><br>
														</div>
														<div id="biolinks">
														<a href="#" onmouseover="on('bio');" onmouseout="off('bio');" onclick="showHideInfo('bio');"><img src="75_arquivos/bio.gif" alt="BIO" id="bio" border="0" height="12" width="66"></a><br>
													  </div>															
												  </td>
												</tr>
										</tbody></table></td>
						</tr>
						<tr>
								<td id="submiddle">
									<table border="0" cellpadding="0" cellspacing="0" width="785">
											<tbody><tr>
													<td>
														<img src="75_arquivos/ALEX_GRAY.jpg" alt="ALEX GRAY" style="float: right;" border="0" height="347" width="785">
														<div id="biocontslider" class="showing">
														<script type="text/javascript">
															<!-- //<![cdata[ 
															var arVersion = navigator.appVersion.split("MSIE");
															var version = parseFloat(arVersion[1]);
															if ((version >= 5.5) && (version < 7) && (document.body.filters)) {
																document.write('<img src="75_arquivos/biobg.gif" width="384" height="347" border="0" class="bg" />');
															} else {
																document.write('<img src="75_arquivos/biobg.png" width="384" height="347" border="0" class="bg" />');
															}
															//]]> -->
														</script><img src="75_arquivos/biobg.png" class="bg" border="0" height="347" width="384">
															<div class="closer"><a href="#" onclick="showHideInfo('bio');" onmouseover="on('bioclosebox');" onmouseout="off('bioclosebox');"><img src="75_arquivos/bioclosebox.gif" alt="CLOSE" name="bioclosebox" border="0" id="bioclosebox"></a><br>
														  </div>
															<div id="biocontent">
																<div style="padding-left: 5px;">
																	 <?php echo $row_Recordset1['materia']; ?>																</div>
															</div>
														</div>
														<div id="biovidslider" class="hiding">													  </div></td>
											</tr>
									</tbody></table>
								</td>
						</tr>
	<tr>
		<td id="bottom">
				<table id="navigation" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
		<td><a href="http://www.reefbrazil.com/index.php"><img src="75_arquivos/nav_reeflogo.gif" alt="REEF" title="REEF" border="0" height="42" width="196"></a><br></td>
		<td><a href="http://www.reefbrazil.com/index.php" onmouseover="on('home')" onmouseout="off('home')"><img src="75_arquivos/home.gif" alt="HOME" id="home" name="home" title="" border="0" height="42" width="48"></a><br></td>
		<td><a href="http://www.reefbrazil.com/products_menu.php" onmouseover="on('products')" onmouseout="off('products')"><img src="75_arquivos/products.gif" alt="PRODUCTS" id="products" name="products" title="" border="0" height="42" width="77"></a><br></td>
		<td><a href="http://www.reefbrazil.com/team.php"><img src="75_arquivos/team_at.gif" alt="TEAM" id="team" name="team" title="" border="0" height="42" width="46"></a><br></td>		<td><a href="http://www.reefbrazil.com/missreef.php" onmouseover="on('missreef')" onmouseout="off('missreef')"><img src="75_arquivos/missreef.gif" alt="MISS REEF" id="missreef" name="missreef" title="" border="0" height="42" width="80"></a><br></td>
		<td><a href="http://www.reefbrazil.com/news.php" onmouseover="on('news')" onmouseout="off('news')"><img src="75_arquivos/news.gif" alt="NEWS" id="news" name="news" title="" border="0" height="42" width="47"></a><br></td>
		<td><a href="http://www.reefbrazil.com/dealers.php" onmouseover="on('dealers')" onmouseout="off('dealers')"><img src="75_arquivos/dealers.gif" alt="DEALERS" id="dealers" name="dealers" title="" border="0" height="42" width="68"></a><br></td>
		<td><a href="http://www.reefbrazil.com/company.php" onmouseover="on('company')" onmouseout="off('company')"><img src="75_arquivos/company.gif" alt="COMPANY" id="company" name="company" title="" border="0" height="42" width="74"></a><br></td>
		<td><a href="http://www.reefbrazil.com/bonus.php" onmouseover="on('bonus')" onmouseout="off('bonus')"><img src="75_arquivos/bonus.gif" alt="BONUS" id="bonus" name="bonus" title="" border="0" height="42" width="53"></a><br></td>
		<td><a href="http://www.reefbrazil.com/contactus.php" onmouseover="on('contactus')" onmouseout="off('contactus')"><img src="75_arquivos/contactus.gif" alt="CONTACT US" id="contactus" name="contactus" title="" border="0" height="42" width="85"></a></td>
		<td><img src="75_arquivos/nav_corner.gif" alt="" height="42" width="11"><br></td>
	</tr>
</tbody></table>		
			<div id="footerText">
				<div id="copyright">� Copyright 2006 REEF, all rights reserved</div>
				<div id="guarantee"><a href="http://www.reefbrazil.com/guarantee.php" target="_blank" title="GUARANTEE">GUARANTEE</a></div>
				<div id="emailLink"><img src="75_arquivos/arrow_email.gif" alt="" align="top" border="0" height="12" width="15"><a href="javascript:eForm.toggle();" title="EMAIL LIST">SIGN UP FOR OUR EMAIL LIST</a></div>
				<div id="siteDesign"><a href="http://www.lallo.net/" target="_blank" title="SITE DESIGN">SITE DESIGN</a></div>
			</div>
			<div id="emailFormHidden"><form action="" id="elistForm" method="post" onsubmit="return false;"><input name="email" size="25" value="email" onfocus="if (this.value=='email') { this.value=''; }" onblur="if (this.value=='') { this.value='email'; }" type="text"> &nbsp; <input name="subscribe" id="submitbtn" value="SUBSCRIBE" onclick="javascript:myLaunch('subscribe',email.value);" type="button">
				</form>
			</div>
		</td>
	</tr>
</tbody></table>
</div>
</div>

</body></html>
<?php
mysql_free_result($Recordset1);
?>