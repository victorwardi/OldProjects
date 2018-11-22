<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>AJAX Contact Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script type="text/javascript" src="js/functionAddEvent.js"></script>
	<script type="text/javascript" src="js/contact.js"></script>
	<script type="text/javascript" src="js/xmlHttp.js"></script>
	<style type='text/css' media='screen,projection'>
	<!--
	body { margin:20px auto;width:600px;padding:20px;border:1px solid #ccc;background:#fff;font-family:georgia,times,serif; }
	fieldset { border:0;margin:0;padding:0; }
	label { display:block; }
	input.text,textarea { width:300px;font:12px/12px 'courier new',courier,monospace;color:#333;padding:3px;margin:1px 0;border:1px solid #ccc; }
	input.submit { padding:2px 5px;font:bold 12px/12px verdana,arial,sans-serif; }
	
	-->
	</style>
</head>
<body>
	<h2>Saquabb</h2>
	<p id="loadBar" style="display:none;">
		<strong>Aguarde enquanto a mensagem é enviada!</strong><br />

		<img src="img/loading.gif" alt="Loading" title="Sending Email" />
	</p>
	<p id="emailSuccess" style="display:none;">
		<strong style="color:green;">Success! Your Email has been sent.</strong>
	</p>
	<div id="contactFormArea">
		<form action="scripts/contact.php" method="post" id="cForm">
			<fieldset>
				<label for="posName">Nome:</label>
				<input class="text" type="text" size="25" name="posName" id="posName" />
				<label for="posEmail">Email:</label>
				<input class="text" type="text" size="25" name="posEmail" id="posEmail" />
				<label for="posRegard">Cidade:</label>
				<input class="text" type="text" size="25" name="posRegard" id="posRegard" />
				<label for="posText">Mensagem:</label>
				<textarea cols="50" rows="5" name="posText" id="posText"></textarea>
				<label for="selfCC">
					<input type="checkbox" name="selfCC" id="selfCC" value="send" /> Enviar um cópia para o você mesmo.
				</label>
				<label>
					<input class="submit" type="submit" name="sendContactEmail" id="sendContactEmail" value="Enviar Mensagem" />
				</label>
			</fieldset>
		</form>
	</div>
	<div class='note'>
		<p>&nbsp;</p>
</body>
</html>