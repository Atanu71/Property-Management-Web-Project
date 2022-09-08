<?php
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectDH/Controller/Logout.php');
    }
    
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectDH/View/login.php");
    }

    $ezl = new mysqli("localhost", "root", "", "dream house");
    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM buyer";
    $result = $ezl->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buyer</title>
    </head>
    <body>
    <?php include('../View/Adminbar.php') ?>
    <fieldset style="width: 60%; height: 450px; overflow: scroll;">
        <legend><b>Buyer</b></legend>
        <h3 align="center">Buyer Information</h3>
        
        <div align='right'>
            <form action="../Controller/searchbuyer.php" method="get" onsubmit="buyer(this); return false;">
                🔎<input type="text" id="search" name="Search" placeholder="Search buyer">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
        <br>    
        <div id="records" align="center">
            <table border="1" align="center">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        if ($result->num_rows > 0) {
                            while ($data = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $data['ID'] . "</td>";
                                echo "<td>" . $data['Name'] . "</td>";
                                echo "<td>" . $data['Gender'] . "</td>";
                                echo "<td>" . $data['DateofBirth'] . "</td>";
                                echo "<td>" . $data['Email'] . "</td>";
                                echo "<td>" . $data['Contact'] . "</td>";
                                echo "<td>" . $data['Username'] . "</td>";
                                echo "<td>" . "<a href='/ProjectDH/Controller/DeleteActionBuyer.php?id=" . $data['ID'] . "'>Delete</a></td>";
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
        
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>

    <script>
        function buyer(stdnt) {
            let search = stdnt.search.value;
			let resulturl = stdnt.action;

			if(search !== "") {
				let xhttp = new XMLHttpRequest();
				xhttp.onload = function(){
					document.getElementById('records').innerHTML = this.responseText;
				}

				xhttp.open("GET", resulturl + "?buyer=" + search);
				xhttp.send();
			}
            else {
                alert('Empty Search!');
            }
        }
    </script>
    </body>
</html>