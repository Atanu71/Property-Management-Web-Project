<?php
	require '../Model/ManagerDB.php';

	if(isset($_GET['manager'])) {
		$name = $_GET['manager'];
		$result = get($name);
	}

	if ($result->num_rows > 0) {
		echo "<table border='1'>";
		echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Subject</th>";
        echo "<th>Edit</th>";
		while ($data = $result->fetch_assoc()) {
			$id = $data['ID'];
            echo "</tr>";
	        echo "<tr>";
            echo "<td>" . $data['ID'] . "</td>";
            echo "<td><a href='viewmanager.php?id=". $id ."'>" . $data['FirstName'] . " " . $data['LastName'] . "</a></td>";
            echo "<td>Web Technology</td>";
            echo "<td>" . "<a href='/Project1/View/editmanager.php?id=" . $data['ID'] . "'>Edit</a></td>";
            echo "</tr>";
	    }
	    echo "</table>";
	}
	else {
		echo "No record(s) found";
	}
?>
