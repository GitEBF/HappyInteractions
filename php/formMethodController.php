<?php
function clickedForm()
{
    $postAction = $_POST['action'];
    switch ($postAction) {
        case "login":
            $user = $_POST['name'];
            $password = $_POST['password'];

            //$password = md5($password,false);

            $connection = createConnection();

            $sql = "SELECT * FROM user where name='$user' and password='$password'";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                $_SESSION["username"] = $user;
                $_SESSION["action"] = "logged";
                $_SESSION['page'] = 'main';
                Header('Location: ' . $_SERVER['PHP_SELF']);
                $_SESSION["username"] = $user;
                $_SESSION["action"] = "logged";
                $_SESSION['page'] = 'main';
            }

            endConnection($connection);

            break;
        case "settings":
            $enteredPassword = $_POST['password'];

            $connection = createConnection();

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            $user = $_SESSION["username"];
            echo $user;
            $sql = "SELECT * FROM user where name='$user' AND password='$enteredPassword'";

            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                Header('Location:settings.php');
                $_SESSION['page'] = 'settings';
                $_SESSION['settings'] = 'gjrduiynb u5r9867n8 584r9yb 7n 54896yb 78 8540987hbn65';
            } else {
                $_SESSION['page'] = 'main';
                $_SESSION['settings'] = 'nuh uh';
            }

            endConnection($connection);
            break;
        case "emotions":
            sleep(2);
            $emotionMeter = 50;
            if (isset($_POST['happyIcon'])) {
                $emotionMeter = 100;
            }
            if (isset($_POST['midIcon'])) {
                $emotionMeter = 50;
            }
            if (isset($_POST['sadIcon'])) {
                $emotionMeter = 0;
            }
            emotion($emotionMeter);
            $_SESSION['page'] = 'main';
            break;
        case "evenement":
            //$password = md5($password,false);
            $dbConnection = createConnection();
            $idActivity = $_POST['eventId'];
            $user = $_SESSION["username"];

            
            if ($idActivity == "") {
                $sql = "UPDATE user SET 
                lastUsedActivity = NULL WHERE name='$user'";
            } else {
                $sql = "UPDATE user SET 
                lastUsedActivity = $idActivity WHERE name='$user'";
            }
            
        
            if ($dbConnection->query($sql) === TRUE) {
        
            } else {
                echo "Error: " . $sql . "<br>" . $dbConnection->error;
            }
            endConnection($dbConnection);

            break;
    }
}
?>