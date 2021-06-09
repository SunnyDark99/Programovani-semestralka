<?php include ('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<title>Registrace</title>
</head>
<body>
		<h2>Registrace</h2>
		<div class="header">
		<form id="login" method="post" action="registrace.php">

			<?php include ('errors.php'); ?>

				<label for="jmeno"><b>Jméno<br></b></label>
				<input type="text" id="Uname" name="jmeno" value="<?php echo $jmeno; ?>"required>
				<br><br>

				<label for="heslo"><b>Heslo<br></b></label>
				<input type="password" id="Pass" name="heslo_1" required>
				<br><br>

				<label for="heslo"><b>Potvrzení hesla<br></b></label>
				<input type="password" id="Pass" name="heslo_2" required>
				<br><br>

				<button type="submit" id="log" name="reg_uziv">Registrovat</button>

			<p>Už jste zaregistrováni? <a href="prihlaseni.php"><b>Přilásit se</b></a></p>
			
		</form>
		</div>
</body>
</html>