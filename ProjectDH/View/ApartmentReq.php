<?php
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectDH/Controller/Logout.php');
    }
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectDH/View/login.php");
    }

    define("t", "../Model/tempApartment.json");
    $handle_t = fopen(t, "r");
    $fr1 = fread($handle_t, filesize(t));
    $arr1 = json_decode($fr1);
    $fc1 = fclose($handle_t);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Apartment Requests</title>
    </head>
    <body>
        <?php include('../View/Adminbar.php') ?>
        <fieldset style="width: 50%; height: 20em; overflow: scroll;">
            <legend><b>Apartment Requests</b></legend>
            <br>
            <table border="1" align="center">
            <tbody>
                <tr>
                    <th>ID</th>
                    <th>Price</th>
                    <th>location</th>
                    <th>Details</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php 
                    if ($arr1 === NULL) {}
                    else {
                        for ($i = 0; $i < count($arr1); $i++) {
                            echo "<tr>";
                            echo "<td>" . $arr1[$i]->id. "</td>";
                            echo "<td>" . $arr1[$i]->price . "</td>";
                            echo "<td>" . $arr1[$i]->location. "</td>";
                            echo "<td>" . $arr1[$i]->details . "</td>";
                            echo "<td>" . "<a href='/ProjectDH/View/AcceptApartment.php?sl=" . $arr1[$i]->sl . "'>✅Accept</a></td>";
                            echo "<td>" . "<a href='/ProjectDH/View/DeclineApartment.php?sl=" . $arr1[$i]->sl . "'>❌Decline</a></td>";
                        }
                    }
                ?>
                
            </tbody>
            
        </table>
        </fieldset>
        <br>
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
    </body>
</html>