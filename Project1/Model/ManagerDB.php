<?php 
	require 'Connect.php';
    
    function delete($id) {
        $ezl = connect();
        $sql = "DELETE FROM manager WHERE ID=$id";
        $qry = $ezl->query($sql);

        header('location: ../View/managerlist.php');
    }

    function edit($id, $fname, $lname, $religion, $dob, $phone, $email, $username) {
    	$ezl = connect();
        $sql = "UPDATE manager SET FirstName='$fname', LastName='$lname', Email='$email', Religion='$religion', DateOfBirth='$dob', PhoneNo='$phone' WHERE ID=$id";
        $qry = $ezl->query($sql);

        header("location: /Project1/View/managerlist.php");
        $ezl->close();
    }
    
    function get($firstname) {
        $conn = connect(); 

        $sql = "SELECT * FROM manager Where FirstName LIKE ?";
        $stmt = $conn->prepare($sql);
        $fname = $firstname;
        $fname = "%" . $fname . "%";
        $stmt->bind_param("s", $fname);

        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $conn->close();

        return $result;
    }
?>