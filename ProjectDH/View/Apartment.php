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

    $sql = "SELECT * FROM apartment";
    $qry = $ezl->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment Details</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>
    
    <fieldset style="width: 60%; height: 450px; overflow: scroll;">
        <legend><b>Apartment Details</b></legend>
        <h3 align="center">Apartment Details</h3>
        <div align='right'>
            <form action="../Controller/searchapartment.php" method="get" onsubmit="apartment(this); return false;">
                🔎<input type="text" id="search" name="Search" placeholder="Search Apartment">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
        <br>

        <div id="records" align="center">
            <table border="1" align="center">
                <tbody>
                    <tr>
                        <th>Apartment ID</th>
                        <th>Price</th>
                        <th>Location</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                        if ($qry->num_rows > 0) {
                            while ($data = $qry->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td> 101-" . $data['ID'] . "</td>";
                                echo "<td>" . $data['Price'] . "</td>";
                                echo "<td>" . $data['Location'] . "</td>";
                                echo "<td>" . $data['Details'] . "</td>";

                                echo "<td><a href='/ProjectDH/Controller/DeleteActionApartment.php?id=" . $data['ID'] ."'>Delete</a></td>";
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
                            echo "</tr>";
                        }
                        $ezl->close();
                    ?>
                </tbody>
            </table>
        </div>
        <p style="text-align: center;"><a href="/ProjectDH/View/ApartmentReq.php">Apartment Requests</a></p>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>

    <script>
        function apartment(stdnt) {
            let search = stdnt.search.value;
			let resulturl = stdnt.action;

			if(search !== "") {
				let xhttp = new XMLHttpRequest();
				xhttp.onload = function(){
					document.getElementById('records').innerHTML = this.responseText;
				}

				xhttp.open("GET", resulturl + "?apartment=" + search);
				xhttp.send();
			}
            else {
                alert('Empty Search!');
            }
        }
    </script>
</body>
</html>