<?php
$servername = "localhost";
$usernamedb = "root";
$passworddb = "root";
$db = "happyinteractions";
$userTable = "user";
$visitorTable = "visitor";
$workerTable = "worker";
$departementTable = "departement";
$activityTable = "activity";


function createConnection()
{
    //Create Connection to DB
    global $servername, $usernamedb, $passworddb, $db;
    $conn = new mysqli($servername, $usernamedb, $passworddb, $db);
    // Check Connection of DB
    if ($conn->connect_error) {
        die("Connection failed " . $conn->connect_error);
    } else {
        return $conn;
    }
}

function endConnection($connection)
{
    //Close Connection to DB
    $connection->close();
}

function ifActivity()
{
    $dbConnection = createConnection();
    $activity = null;
    if (!isset($_SESSION["username"])) {
        return false;
    }
    $user = $_SESSION["username"];

    $sql = "SELECT * FROM user where name='$user'";
    $result = $dbConnection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $activity = $row["lastUsedActivity"];
    }


    if ($activity != null && activityExists($activity)) {
        endConnection($dbConnection);
        return true;
    } else {
        $sql = "UPDATE user SET lastUsedActivity = null WHERE name='$user'";

        if ($dbConnection->query($sql) === TRUE) {

        } else {
            echo "Error: " . $sql . "<br>" . $dbConnection->error;
        }
        endConnection($dbConnection);
        return false;
    }
}

function activityExists($activity)
{
    $dbConnection = createConnection();

    $sql = "SELECT * FROM activity where id='$activity'";
    $result = $dbConnection->query($sql);

    endConnection($dbConnection);

    if ($result->num_rows > 0) {
        return true;
    } else {

        return false;
    }

}




function connected()
{
    if (isset($_SESSION['action'])) {
        return true;
    } else {
        return false;
    }
}
?>