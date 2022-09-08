<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Class metarial
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
			<form action="/Project1/Controller/queryControl.php" method="post" onsubmit="validquery(this); return false;" novalidate>
				<div>
					<table>
						<tr>
							<td style="width:300px;">
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
								<fieldset style="width:800px; height:300px;">
									<legend><h2>Query</h2></legend>
									<?php
										if(isset($_COOKIE['msg'])) {
											echo $_COOKIE['msg'];
										}
									?>
									<span id="msg" style="color: green;"></span>
									<table>
										<tr>
											<td><label for="qu">Comment:</label></td>
											<td><textarea style="width: 400px; height: 100px;" name="query" id="qu" placeholder="write a query..." spellcheck="true"></textarea></td>
										</tr>
									</table> <br>
									<input type="submit" name="Submit" value="Submit">
									<br><br>
									<a href="../View/chatadmin.php">Chat with admin</a>
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

	<script>
		function validquery(valid) {
			let query = valid.query.value;

		    let isvalid = true;

		    if(query == "") {
		        alert("Query won't submit with empty box!");
		        isvalid = false;
		    }

		    if(isvalid) {
		    	const actionURL = valid.action;
				const actionMethod = valid.method;

		    	let xhttp = new XMLHttpRequest();
		    	document.getElementById('msg').innerHTML = "";

		    	xhttp.onload = function() {
		    		document.getElementById('msg').innerHTML = this.responseText;
		    	}
		    	xhttp.open(actionMethod, actionURL);
		    	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		    	xhttp.send("query=" + query);
		    }
		}
	</script>
</body>
</html>