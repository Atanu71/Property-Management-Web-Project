<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../View/js/seller.js"></script>
	<title>Dashboard</title>
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
			<form method="post" action="/Project1/Controller/changepassControl.php" onsubmit="return validchngpass(this)">
				<div>
					<table>
						<tr>
							<td style="width: 300px;">
								<label><b>Account</b></label> 
								<hr> <br>
								<ul>
									<li><a href="/Project1/View/dashboard.php">Dashboard</a></li>
									<li><a href="/Project1/View/addapartment.php">Add Apartment</a></li>
									<li><a href="/Project1/View/query.php">Helpline</a></li>
									<li><a href="/Project1/View/viewprofile.php">View Profile</a></li>
									<li><a href="/Project1/View/editprofile.php">Edit Profile</a></li>
									<li><a href="/Project1/View/changepassword.php">Change Password</a></li>
									<li><a href="/Project1/View/Logout.php">Logout</a></li>
								</ul>
							</td>
							<td>
								<fieldset>
									<legend><h2>Change Password</h2></legend>

									<?php
										if(isset($_COOKIE['msg'])) {
											echo $_COOKIE['msg'];
										}
									?>
									<table>

										<tr>
											<td>Current Password</td>
											<td>:</td>
											<td><input type="text" name="currentpassword">
												<span id="currErr" style="color: red;"></span></td>
										</tr>

										<tr>
											<td>New Password</td>
											<td>:</td>
											<td><input type="text" name="newpassword">
												<span id="newErr" style="color: red;"></span></td>
										</tr>

										<tr>
											<td>Retype New Password</td>
											<td>:</td>
											<td><input type="text" name="retypepassword"><span id="reErr" style="color: red;"></span></td>
										</tr>										
									</table>

									<hr>

									<input type="submit" name="submit">
									<a href="/Project1/View/settings.php">Change Username?</a>
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
		<?php include '../View/footer.php';?>
	</div>
</body>
</html>