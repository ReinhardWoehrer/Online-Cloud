<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">

	<title>Reinis Cloud</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	
	
	<!--<script src="jquery-3.0.0.js" type="text/javascript"></script>-->
	<!--<script src="dropzone.js"></script>-->
	
</head>

<body>
	<div id="root">
		<div id="header">
			<?php include "content/header.php"; ?>
		</div>
		<div class="container" id="main">
		<div class="row">
			<div id="registration" class="col-md-6 col-sm-12">
				<?php include "content/registration.php"; ?>
			</div>
			
			<div id="login_news" class="col-md-6 col-sm-12">
				<div id="login">
					<?php include "content/login.php"; ?>
				</div>
		
				<div id="news">
					<?php include "content/spezial_content/news.php"; ?>
				</div>
			</div>
		</div>
		</div>
		<div id="footer">
			<?php include "content/footer.php"; ?>
		</div>
	</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</html>