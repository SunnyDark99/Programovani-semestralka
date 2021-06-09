<?php include ('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<title>Přihlášení</title>
</head>
<body>		
		<h2>Přihlášení</h2>
		<div class="header">
		<form id="login" action="prihlaseni.php" method="post">

			<?php include ('errors.php'); ?>

				<label for="jmeno"><b>Jméno<br></b></label>
				<input type="text" name="jmeno" id="Uname" required>
				<br><br>

				<label for="heslo"><b>Heslo<br></b></label>
				<input type="password" name="heslo_1" id="Pass" required>
				<br><br>

			<button type="submit" id="log" name="prihl_uziv">Přihlásit se</button>
			<br><br>

			<p>Ještě nejste zaregistrováni? <a href="registrace.php"><b>Zaregistruj se</b></a></p>

		</form>
		</div>
</body>
</html>