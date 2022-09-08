<?php
    session_start(); 
    if(!isset($_SESSION['username'])) {
        header("Location: /Project1/View/dashboard.php");
    }

    require '../Model/ManagerDB.php';
    
    if (isset($_GET['id'])) {		
        $id = $_GET['id'];

        delete($id);
    }
    else {
        die("Invalid Request");
    }
    echo "✅Manager Removed<br>";
?>