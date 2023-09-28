<?php
session_start();
require "dbController.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/settings.css">
</head>

<body>
    <?php
    if ($_SESSION['settings'] == 'gjrduiynb u5r9867n8 584r9yb 7n 54896yb 78 8540987hbn65') {

        $dbConnection = createConnection();
        $user = $_SESSION['username'];

        $sql = "SELECT * FROM user WHERE name = '$user'";
        $sqlDepartement = "SELECT * FROM departement";
        $departementListe = mysqli_query($dbConnection, $sqlDepartement);



        $result = $dbConnection->query($sql);


        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row["lastUsedActivity"];
        } else {
            echo "Error: " . $sql . "<br>" . $dbConnection->error;
        }
        endConnection($dbConnection);




        //$_SESSION['settings'] = 'non';
        $nomErreur = $dateErreur = $descriptionErreur = "";
        $name = $description = "";
        $erreur = false;

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ajouter'])) {
            if (empty($_POST['name'])) {
                $nomErreur = "Le nom ne peut pas être vide";
                $erreur = true;
            } else if (empty($_POST['date'])) {
                $dateErreur = "La date ne peut pas être vide";
                $erreur = true;
            } else if (empty($_POST['description'])) {
                $descriptionErreur = "La date ne peut pas être vide";
                $erreur = true;
            }
            if (!$erreur) {
                $name = $_POST['name'];
                $date = $_POST['date'];
                $description = $_POST['description'];
                $idDepartement = $_POST['departement'];
                $servername = "localhost";
                $username = "root";
                $passwordSQL = "root";
                $db = "happyinteractions";
                $con = new mysqli($servername, $username, $passwordSQL, $db);
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }
                echo "Connected succesfully";
                $sql = "INSERT INTO activity (name,date,description,idDepartement) VALUES('$name','$date','$description','$idDepartement')"; //FAUT CHANGER LES DEPARTEMENTS
                if (mysqli_query($con, $sql)) {
                    echo "<br>Enregistrement réussi";
                    Header('Location:settings.php');
                } else {
                    echo "Error: " . $sql . "<br>", mysqli_error($con);
                }

                mysqli_close($con);
            }
        }

        ?>
        <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" style="fill:#00000" height="2em" viewBox="0 0 512 512">

                <path
                    d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
            </svg></a>
        <h2>Ajouter type beat</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Nom : <input type="text" name="name"><br>
            <p style="color:red;">
                <?php echo $nomErreur; ?>
            </p>
            Date : <input type="date" name="date"><br>
            <p style="color:red;">
                <?php echo $dateErreur; ?>
            </p>
            Description : <input type="text" name="description"><br>
            <p style="color:red;">
                <?php echo $descriptionErreur; ?>
            </p>
            Departement : <select name="departement">
                <?php
                while (
                    $category = mysqli_fetch_array(
                        $departementListe,
                        MYSQLI_ASSOC
                    )
                ):
                    ;
                    ?>
                    <option value="<?php echo $category["id"];
                    ?>">
                        <?php echo $category["name"];
                        ?>
                    </option>
                    <?php
                endwhile;
                ?>
            </select><br>
            <input type="submit" name="ajouter">
        </form>

        <!-- Afficher les différentes activités -->

        <?php

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $db = "happyinteractions";
        $conn = new mysqli($servername, $username, $password, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->query('SET NAMES utf8');
        $sql = "SELECT * FROM activity";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            ?>
            <form method='post' class="hide-submit">
                <?php
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <label>
                        <div class="activity" id="<?php echo $row["id"] ?>selection">
                            <input type="submit" name="selection" value="<?php echo $row["id"] ?>" />
                            <p>
                                <?php echo $row["name"] ?>
                            </p>
                            <p>
                                <?php echo $row["description"] ?>
                            </p>
                        </div>
                    </label>
                    <a href="modification.php?id=<?php echo $row["id"] ?>"><svg xmlns="http://www.w3.org/2000/svg"
                            style="fill:#00000" height="1em"
                            viewBox="0 0 512 512">

                            <path
                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                        </svg></a>
                    <a href="zoom.php?id=<?php echo $row["id"] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" style="fill:#00000" height="1em"
                            viewBox="0 0 512 512">
                            <path
                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                        </svg>
                    </a></br>

                    <?php
                }
        } else {
            echo "non";
        }
        echo '</form>';
        $conn->close();


        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['selection'])) {

            $_SESSION['id'] = $_POST['selection'];
            echo $_SESSION['id'];

            $dbConnection = createConnection();
            $id = $_SESSION['id'];
            $user = $_SESSION['username'];

            $sql = "UPDATE user SET lastUsedActivity =  $id WHERE name = '$user'";

            if ($dbConnection->query($sql) === TRUE) {

            } else {
                echo "Error: " . $sql . "<br>" . $dbConnection->error;
            }
            endConnection($dbConnection);



        }

        ?>
            <form method='post'>
                <input type="submit" name="deco" value="Déconnexion">
            </form>
            <?php

            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['deco'])) {
                session_unset();
                session_destroy();
                Header('Location:index.php');
            }


    } else {
        Header('Location:index.php');
    }
    ?>


        <script>
            var id = <?php echo json_encode($_SESSION['id']); ?> + 'selection';
            console.log(id);
            const mallo = document.getElementById(id);
            mallo.style.backgroundColor = 'greenyellow';
        </script>
</body>

</html>