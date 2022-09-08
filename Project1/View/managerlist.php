<?php 
	session_start();
	if(!isset($_COOKIE['rem'])) {
        header('location: /Project1/View/logout.php');
    }
	if (isset($_SESSION['username'])) {		

	} else {
		header("location: /Project1/View/login.php");
	}
	$ezl = new mysqli("localhost", "root", "", "dream house");
    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM manager";
    $result = $ezl->query($sql);
 ?>
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
	<div>
		<?php include '../View/sellerpanel.php';?>				
	</div>

	<br>

	<div>
		<fieldset style="position: relative;">
				<div>
					<table>
						<tr>
							<td style="width:300px;">
								<label><b>Account</b></label>
								<hr> <br>
								<ul>
									<li><a href="/Project1/View/dashboard.php">Dashboard</a></li>
									<li><a href="/Project1/View/addapartment.php">Add Apartment</a></li>
									<li><a href="/Project1/View/viewprofile.php">View Profile</a></li>
									<li><a href="/Project1/View/query.php">Helpline</a></li>
									<li><a href="/Project1/View/editprofile.php">Edit Profile</a></li>
									<li><a href="/Project1/View/changepassword.php">Change Password</a></li>
									<li><a href="/Project1/View/Logout.php">Logout</a></li>
								</ul>
							</td>

							<td>
								<fieldset style="width:300px; height:300px;">
									<legend><h2>Class One</h2></legend>
									<table>
										<tr>
											<ul>
												<li><a href="/Project1/View/managerlist.php">Manager List</a></li>
												<li><a href="/Project1/View/notice.php">Notice</a></li>
											</ul>
										</tr>										
									</table> <br>
								</fieldset>
							</td>

							<td>
								<fieldset style="width: 800px; height: auto; overflow: scroll;">
									<legend><h2>Student List</h2></legend>

									<div style="position: absolute; left: auto; right: 4%; top: 15%;">
										<form action="../Controller/searchmanager.php" method="get" onsubmit="student(this); return false;">
											<input type="text" id="search" name="Search" placeholder="Search Manager">
											<input type="submit" name="submit" value="🔎">
										</form>
									</div>

									<br>
									<div id="records" align="center">
										<table border="1" align="center">
								            <tbody>
								                <tr>
								                    <th>ID</th>
								                    <th>Name</th>
								                    <th>Date of Birth</th>
								                    <th>Religion</th>
								                    <th>Email</th>
								                    <th>Phone No</th>
								                    <th>Subject</th>
								                    <th colspan="2">Action</th>
								                </tr>

								                <?php
								                    if ($result->num_rows > 0) {
								                        while ($data = $result->fetch_assoc()) {
								                            echo "<tr>";
								                            echo "<td>" . $data['ID'] . "</td>";
								                            echo "<td>" . $data['FirstName'] . " " . $data['LastName'] . "</td>";
								                            echo "<td>" . $data['DateOfBirth'] . "</td>";
								                            echo "<td>" . $data['Religion'] . "</td>";
								                            echo "<td>" . $data['Email'] . "</td>";
								                            echo "<td>" . $data['PhoneNo'] . "</td>";
								                            echo "<td>Web Technology</td>";
								                            echo "<td>" . "<a href='/Project1/Controller/deleteManagerControl.php?id=" . $data['ID'] . "'>Delete</a></td>";
								                            echo "<td>" . "<a href='/Project1/View/editmanager.php?id=" . $data['ID'] . "'>Edit</a></td>";
								                            echo "</tr>";
								                        }
								                    }
								                    else {
								                        echo "<tr>";
								                        echo "<td>--</td>";
								                        echo "<td>--</td>";
								                        echo "<td>--</td>";
								                        echo "<td>--</td>";
								                        echo "<td>--</td>";
								                        echo "<td>--</td>";
								                        echo "<td>--</td>";
								                        echo "<td>--</td>";
								                        echo "</tr>";
								                    }
								                ?>
								            </tbody>
								        </table>
								    </div>
									<p style="text-align: center;"><a href="addmanager.php">Add Manager</a> | <a href="managerreq.php">Manager Request</a></p>
								</fieldset>
							</td>
						</tr>
					</table>
				</div>
		</fieldset>
	</div>
	<br>
	<div align="center">
		<?php include '../View/footer.php'?>
	</div>
	<script>
		function student(stdnt) {
			let search = stdnt.search.value;
			let resulturl = stdnt.action;
			document.getElementById('records').innerHTML = "";

			if(search === "") {
                alert('Empty Search!');
			}
			else {
				let xhttp = new XMLHttpRequest();
				xhttp.onload = function(){
					document.getElementById('records').innerHTML = this.responseText;
				}

				xhttp.open("GET", resulturl + "?student=" + search);
				xhttp.send();
			}
		}
	</script>
</body>
</html>