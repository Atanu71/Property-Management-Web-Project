<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<link rel="stylesheet" type="text/css" href="top.css">
</head>
<body>
	<fieldset>

		<img src="/Project1/Model/House_logo.png" height="80px" width="80px" style="margin-left: 10px; margin-top: 10px;">

		<p align="right"><a href="/Project1/publichome.php">Logged in as <?php echo $_SESSION['data']['name']?></a> 
		<a href="/Project1/View/logout.php">Logout</a></p>
	</div>
	</fieldset>
</body>
</html>