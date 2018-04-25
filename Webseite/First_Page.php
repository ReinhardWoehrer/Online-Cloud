<?php /* Test Comment */
	session_set_cookie_params(0);
	session_start();
	
	//If the HTTPS is not found to be "on"
	if (!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on") {
		//Tell the browser to redirect to the HTTPS URL.
		header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		//Prevent the rest of the script from executing.
		exit;
	}

	//ldap config
	define("LDAPPATH", "ldap.technikum-wien.at");
	define("LDAPBASE", "dc=technikum-wien,dc=at");
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">

	<title>Reinis Cloud</title>
	
	<!--<link rel="stylesheet" type="text/css" href="index.css">-->
	
	
	<!--<script src="jquery-3.0.0.js" type="text/javascript"></script>-->
	<!--<script src="dropzone.js"></script>-->
	
</head>

<body>
	<div id="root">
		<div id="header">
			<?php include "content/header.php"; ?>
		</div>

		<div id="registration">
			<?php include "content/login.php"; ?>
		</div>
		
		<div id="login">
			<?php include "content/navi.php"; ?>
		</div>

		<div id="news">
			<?php include "content/spezial_content/news.php"; ?>
		</div>

		<div id="footer">
			<?php include "content/footer.php"; ?>
		</div>
	</div>
</body>

</html>