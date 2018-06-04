<?php

if (isset($_GET['section'])) { // Is section variable set?
	switch ($_GET['section']) { // Load according site into content
		case "home":
			include "content/spezial_content/home.php";
			break;
		case "settings":
			include "content/spezial_content/settings.php";
			break;

		case "news":
			include "content/spezial_content/news.php";
			break;

		default:
			include "content/spezial_content/home.php";
			break;
	}

	$_SESSION['section'] = $_GET['section'];
} else if (isset($_SESSION['section'])) { // GET variable is not set, but there is an active session with selected section (can this happen?)
	switch ($_SESSION['section']) {
		case "home":
			include "content/spezial_content/home.php";
			break;
		case "settings":
			include "content/spezial_content/settings.php";
			break;

		case "news":
			include "content/spezial_content/news.php";
			break;

		default:
			include "content/spezial_content/home.php";
			break;
	}
} else { // If section variable is not set anywhere, load default
	include "content/spezial_content/home.php";
}



?>