<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "happyinteractions";
$userTable = "user";
$visitorTable = "visitor";
$workerTable = "worker";
$departementTable = "departement";
$activityTable = "activity";


function createConnection()
{
    //Create Connection to DB
    global $servername, $username, $password, $db;
    $conn = new mysqli($servername, $username, $password, $db);
    // Check Connection of DB
    if ($conn->connect_error) {
        die("Connection failed " . $conn->connect_error);
    } else {
        return $conn;
    }
}

function endConnection($connection) {
    //Close Connection to DB
    $connection->close();
}






function connected() {
    return $_SESSION["connexion"];
}
?>