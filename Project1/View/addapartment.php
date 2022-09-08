<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Add Apartment
	</title>
</head>
<body>

	<?php 
	session_start();
	if(!isset($_COOKIE['rem'])) {
        header('location: /Project1/View/logout.php');
    }
	if (isset($_SESSION['username'])) {		

	} else {
		header("location: /Project1/View/login.php");
	}
 	?>

	<div>
		<?php include '../View/sellerpanel.php';?>				
	</div>

	<br>

	<div>
		<fieldset>
			<form>
				<div>
					<table>
						<tr>
							<td style="width:300px;">
								<label><b>Account</b></label> 
								<hr> <br>
								<ul>
									<li><a href="/Project1/View/dashboard.php">Dashboard</a></li>
									<li><a href="/Project1/View/addapartment.php">Add Apartment</a></li>
									<li><a href="/Project1/View/query.php">Apartment List</a></li>
									<li><a href="/Project1/View/query.php">Helpline</a></li>
									<li><a href="/Project1/View/viewprofile.php">View Profile</a></li>
									<li><a href="/Project1/View/editprofile.php">Edit Profile</a></li>
									<li><a href="/Project1/View/changepassword.php">Change Password</a></li>
									<li><a href="/Project1/View/Logout.php">Logout</a></li>
								</ul>

								<td>
								<fieldset style="width:300px;">
								<legend><h2>Add Apartment</h2></legend>
									<table>
									<tr>
                                	<label for="name">ID:</label><br>
  									<input type="text" id="name" name="name"><br>	

									  <label for="name">Price:</label><br>
  									<input type="text" id="name" name="name"><br>

									  <label for="name">Location:</label><br>
  									<input type="text" id="name" name="name"><br>

									  <label for="name">Details:</label><br>
  									<input type="text" id="name" name="name"><br><br>

									<input type="submit" name="Submit" value="Submit">
                    				</tr>

								</td>
									</table> <br><hr>
								</fieldset>

							</td>
						</tr>
					</table>
				</div>
			</form>
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include '../View/footer.php'?>
	</div>
</body>
</html>