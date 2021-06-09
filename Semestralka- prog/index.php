<?php include ('server.php');

  if (!isset($_SESSION['jmeno'])) {
  	$_SESSION['msg'] = "Nejdříve se musíte přihlásit.";
  	header('location: prihlaseni.php');
  }
  if (isset($_GET['odhlaseni'])) {
  	session_destroy();
  	unset($_SESSION['jmeno']);
  	header("location: prihlaseni.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<title>Hlavní stránka</title>
</head>
<body>
	<div>
		<h2>Hlavní stránka</h2>
	</div>
	<div class="header">
		<?php if(isset($_SESSION['success'])): ?>
			<div>
				<h3>
					<?php 
						echo $_SESSION['success'];
						$sql = "SELECT id,jmeno FROM user";
						$zaznamy = mysqli_query($db, $sql);
					    echo '<h1>Seznam uživatelů</h1><hr>';
					    echo '<ul>';
					    while ($row =  mysqli_fetch_array($zaznamy)) {
					        echo '<li>'.$row['jmeno'].'</li>'; 
					    }
					    echo '</ul>';
						unset ($_SESSION['success']);
					 ?>
				</h3>
			</div>
		<?php endif ?>	

		<?php if(isset($_SESSION["jmeno"])): ?>
			<p>Vítej <strong><?php echo $_SESSION['jmeno']; ?></strong></p>
			<p> <a href="index.php?odhlaseni" style="color: red;">Odhlášení</a> </p>
		<?php endif ?>
	</div>
</body>
</html>