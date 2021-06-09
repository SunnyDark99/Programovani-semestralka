<?php 
session_start();

//inicializace proměnných
$jmeno = "";
$errors = array();

//připojení do databáze
$db = mysqli_connect('localhost','root','','session_ukol') or die("Nepodařilo se připojit k databázi.");

//register button
if (isset($_POST['reg_uziv'])) {
$jmeno = mysqli_real_escape_string($db,$_POST['jmeno']);
$heslo_1 = mysqli_real_escape_string($db,$_POST['heslo_1']);
$heslo_2 = mysqli_real_escape_string($db,$_POST['heslo_2']);
//výplň
if(empty($jmeno)) {
	array_push($errors, "Zadejte jméno.");
}
if(empty($heslo_1)) {
	array_push($errors, "Zadejte heslo.");
}
if ($heslo_1 != $heslo_2) {
	array_push($errors, "Hesla se neshodují.");
}
 $user_check_query = "SELECT * FROM user WHERE jmeno='$jmeno' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['jmeno'] === $jmeno) {
      array_push($errors, "Uživatel už existuje");
    }
  }

//uložení do databáze
if (count($errors) == 0) {
	//zašifrování hesla
	$heslo = md5($heslo_1); 
	$sql = "INSERT INTO user (jmeno,heslo) VALUES ('$jmeno','$heslo') ";
	mysqli_query($db, $sql);
	$_SESSION['jmeno'] = $jmeno;
  	$_SESSION['success'] = "Úspěšně jste se přihlásil";
  	header('location: index.php');
	}
}

if (isset($_POST['prihl_uziv'])) {
	$jmeno = mysqli_real_escape_string($db,$_POST['jmeno']);
	$heslo = mysqli_real_escape_string($db,$_POST['heslo_1']);

	if(empty($jmeno)) {
	array_push($errors, "Zadejte jméno.");
	}
	if(empty($heslo)) {
	array_push($errors, "Zadejte heslo.");
	}
	if(count($errors) == 0){
		$heslo = md5($_POST['heslo_1']);
		$query = "SELECT * FROM user WHERE jmeno='".$_POST['jmeno']."' AND heslo='$heslo' ";
		$result = mysqli_query($db,$query);
		if(mysqli_num_rows($result) == 1) {
			$_SESSION['jmeno'] = $jmeno;
  			$_SESSION['success'] = "Úspěšně jste se přihlásil";
  			header('location: index.php');
		}else{
			array_push($errors, "Heslo se nehoduje s uživatelským jménem.");
		}
	}
}
 ?>