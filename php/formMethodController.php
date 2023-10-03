<?php
function clickedForm()
{
    if (!isset($_POST['action'])) {
        return null;
    }
    $postAction = $_POST['action'];
    $connection = createConnection();
    $_SESSION['subPage'] = '';

    if ($postAction == 'emotion') {
        sleep(3);
    }


    switch ($postAction) {
        case "login":
            $user = $_POST['name'];
            $password = $_POST['password'];

            //$password = md5($password,false);


            $sql = "SELECT * FROM user where name='$user' and password='$password'";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                $_SESSION["username"] = $user;
                $_SESSION['page'] = 'main';
            }

            break;






        case "settings":
            $enteredPassword = $_POST['password'];
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }
            $user = $_SESSION["username"];

            $sql = "SELECT * FROM user where name='$user' AND password='$enteredPassword'";

            $result = $connection->query($sql);

            if ($result->num_rows > 0) {

                $_SESSION['page'] = 'settings';
                $_SESSION['settings'] = 'gjrduiynb u5r9867n8 584r9yb 7n 54896yb 78 8540987hbn65';
            } else {
                $_SESSION['page'] = 'main';
                $_SESSION['settings'] = 'nuh uh';
                echo "monday left me broken";
            }

            break;






        case "emotions":
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
            $user = $_SESSION["username"];
            if ($_POST['eventId'] == "") {
                $sql = "UPDATE user SET lastUsedActivity = NULL WHERE name='$user'";
                if ($connection->query($sql) === TRUE) {

                } else {
                    echo "Error: " . $sql . "<br>" . $connection->error;
                }
            } else {
                $idActivity = $_POST['eventId'];
                $sql = "UPDATE user SET lastUsedActivity = $idActivity WHERE name='$user'";
                if ($connection->query($sql) === TRUE) {

                } else {
                    echo "Error: " . $sql . "<br>" . $connection->error;
                }
            }

            break;






        case "toMain":
            $_SESSION['page'] = "main";
            break;


        case "deconnect":
            session_unset();
            session_destroy();
            break;

        case "settingsPage":

            $_SESSION['page'] = "settings";
            $subpage = "";
            if (isset($_POST['subPage'])) {
                $subpage = $_POST['subPage'];
            }

            switch ($subpage) {
                case "settingsUser":
                    $_SESSION["subPage"] = "settingsUser";
                    $_SESSION['userSettings'] = "";
                    break;
                case "deleteUser":
                    $_SESSION["subPage"] = "settingsUser";
                    $_SESSION['userSettings'] = "";
                    $idDelete = $_POST['idUserSettings'];
                    $sql = "DELETE FROM user WHERE id = '$idDelete'";
                    if ($connection->query($sql) === TRUE) {

                    } else {
                        echo "Error: " . $sql . "<br>" . $connection->error;
                    }
                    break;
                case "editUser":
                    $_SESSION["subPage"] = "settingsUser";
                    $_SESSION['userSettings'] = "modify";
                    break;
                case 'addUser':
                    $_SESSION["subPage"] = "settingsUser";
                    $_SESSION['userSettings'] = "add";
                    break;
                case 'addEvent':
                    $_SESSION["subPage"] = "addEvent";
                    break;
            }

            break;

        case "ajouterUser":
            if ($_POST['name'] != "" && $_POST['password'] != "") {
                $_SESSION['erreurAddUser'] = false;
                $name = $_POST['name'];
                $password = $_POST['password'];
                $sql = "INSERT INTO USER (name,password,lastUsedActivity) VALUES ('$name','$password',NULL)";
                if ($connection->query($sql) === TRUE) {

                } else {
                    echo "Error: " . $sql . "<br>" . $connection->error;
                }
            } else {
                $_SESSION['page'] = "settings";
                $_SESSION["subPage"] = "settingsUser";
                $_SESSION['userSettings'] = "add";
                $_SESSION['erreurAddUser'] = true;
            }

            break;

        case "editUser":

            if ($_POST['name'] != "" && $_POST['password'] != "") {
                $_SESSION['erreurAddUser'] = false;
                $name = $_POST['name'];
                $password = $_POST['password'];
                $id = $_SESSION['idUserSettings'];
                $sql = "UPDATE user SET name = '$name', password = '$password' WHERE id = '$id'";
                if ($connection->query($sql) === TRUE) {

                } else {
                    echo "Error: " . $sql . "<br>" . $connection->error;
                }
            } else {
                $_SESSION['page'] = "settings";
                $_SESSION["subPage"] = "settingsUser";
                $_SESSION['userSettings'] = "add";
                $_SESSION['erreurAddUser'] = true;
            }

            break;

        case "setVoteType":
            $_SESSION["voteType"] = $_POST['voteType'];

            break;

        case "ajouterEvent":
            $subpage = "";
            if (isset($_POST['subPage'])) {
                $subpage = $_POST['subPage'];
            }
            $_SESSION['mallllo'] = $subpage;
            switch($subpage) {
                case "addDep":
                    $_SESSION["subPage"] = "addDep";
                    break;
                case "":
                    if ($_POST['name'] != "" && $_POST['description'] != "" && $_POST['date'] != "") {
                        $_SESSION['erreurEventAdd'] = false;
                        $name = $_POST['name'];
                        $description = $_POST['description'];
                        $date = $_POST['date'];
                        $departement = $_POST['departement'];
                        $_SESSION["subPage"] = "";
                        $sql = "INSERT INTO activity (name,date,idDepartement,description) VALUES ('$name','$date','$departement','$description')";
                        if ($connection->query($sql) === TRUE) {
        
                        } else {
                            echo "Error: " . $sql . "<br>" . $connection->error;
                        }
                    } else {
                        $_SESSION['page'] = "settings";
                        $_SESSION["subPage"] = "addEvent";
                        $_SESSION['erreurEventAdd'] = true;
                    }
        
                    break;
            }
            break;

        case "ajouterDepartement":
            if ($_POST['name'] != "") {
                $name = $_POST['name'];
                $sqlVerification = "SELECT * FROM departement WHERE name = '$name'";
                $result = $connection->query($sqlVerification);
                if ($result->num_rows > 0) {
                    $_SESSION['erreurEventAdd'] = "used";
                } else {
                    $sql = "INSERT INTO departement (name) VALUES ('$name')";
                    if ($connection->query($sql) === TRUE) {

                    } else {
                        echo "Error: " . $sql . "<br>" . $connection->error;
                    }
                    endConnection($connection);
                    Header('Location:settings.php');
                }
            } else {
                $_SESSION['erreurEventAdd'] = true;
            }
            break;
    }
    endConnection($connection);
}

function updateLUActivity($newActivity)
{
    $connection = createConnection();

    $user = $_SESSION["username"];

    //$password = md5($password,false);


    $sql = "SELECT * FROM user where name='$user'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION["lastUsedActivity"] = $row['lastUsedActivity'];
    }

    endConnection($connection);
}

function getLUActivityId()
{
    $connection = createConnection();

    $id = $_SESSION['id'];
    $user = $_SESSION['username'];

    $sqlSelection = "SELECT * FROM user WHERE name = '$user'";

    if ($connection->query($sqlSelection) === TRUE) {
        $result = $connection->query($sqlSelection);
        $row = $result->fetch_assoc();
        $_SESSION['lastUsedActivity'] = $row['lastUsedActivity'];
    } else {
        echo "Error: " . $sqlSelection . "<br>" . $connection->error;
    }
    endConnection($connection);
}

function emotion($emotionMeter)
{
    $dbConnection = createConnection();
    $idActivity = getIdActivity();
    $sql = "INSERT INTO visitor (idActivity, emotion)
              VALUES ($idActivity, $emotionMeter)";

    if ($dbConnection->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $dbConnection->error;
    }
    endConnection($dbConnection);
}
?>