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
		
		define("t", "../Model/tempManager.json");
	    $handle_t = fopen(t, "r");
	    $fr1 = fread($handle_t, filesize(t));
	    $arr1 = json_decode($fr1);
	    $fc1 = fclose($handle_t);
 	?>

	<div>
		<?php include '../View/sellerpanel.php';?>				
	</div>

	<br>

	<div>
		<fieldset>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate>
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
								<fieldset style="width: 800px; height: 300px;">
									<legend><h2>Manager List</h2></legend>
										<table border="1" align="center">
								            <tbody>
								                <tr>
								                    <th>Name</th>
								                    <th>Date of Birth</th>
								                    <th>Religion</th>
								                    <th>Email</th>
								                    <th>Phone No</th>
								                    <th>Subject</th>
								                    <th colspan="2">Action</th>
								                </tr>
								                <?php
								                	if ($arr1 === NULL) {
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
								                    else {
                        								for ($i = 0; $i < count($arr1); $i++) {
								                            echo "<tr>";
								                            echo "<td>" . $arr1[$i]->fname . " " . $arr1[$i]->lname . "</td>";
								                            echo "<td>" . $arr1[$i]->dob . "</td>";
								                            echo "<td>" . $arr1[$i]->religion . "</td>";
								                            echo "<td>" . $arr1[$i]->email . "</td>";
								                            echo "<td>" . $arr1[$i]->phone . "</td>";
								                            echo "<td>Web Technology</td>";
								                            echo "<td>" . "<a href='/Project1/Controller/acceptManager.php?id=" . $arr1[$i]->id . "'>✅Accept</a></td>";
								                            echo "<td>" . "<a href='/Project1/Controller/declineManager.php?id=" . $arr1[$i]->id . "'>❌Decline</a></td>";
								                            echo "</tr>";
								                        }
								                    }
								                ?>
								            </tbody>
								        </table>
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