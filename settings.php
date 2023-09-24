<?php
session_start()
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
    <link rel="stylesheet" href="css/settings.css">
</head>

<body>
    <?php
    if ($_SESSION['settings'] == 'gjrduiynb u5r9867n8 584r9yb 7n 54896yb 78 8540987hbn65' && $_SESSION['connexion'] == true) {
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
                $servername = "localhost";
                $username = "root";
                $passwordSQL = "root";
                $db = "happyinteractions";
                $con = new mysqli($servername, $username, $passwordSQL, $db);
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }
                echo "Connected succesfully";
                $sql = "INSERT INTO activity (name,date,description,idDepartement) VALUES('$name','$date','$description','1')"; //FAUT CHANGER LES DEPARTEMENTS
                if (mysqli_query($con, $sql)) {
                    echo "<br>Enregistrement réussi";
                } else {
                    echo "Error: " . $sql . "<br>", mysqli_error($con);
                }

                mysqli_close($con);
            }
        }
        ?>
        <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" height="2em"
                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <style>
                    svg {
                        fill: #000000
                    }
                </style>
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
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="activity">
                    <p>
                        <?php echo $row["name"] ?>
                    </p>
                    <input type="radio" name="selection" value="<?php echo $row["id"] ?>">Selectionner</input>
                    <button><a href="modification.php?id=<?php echo $row["id"] ?>">modificationne</a></button>
                </div>
                <?php
            }
        } else {
            echo "non";
        }
        $conn->close();
    } else {
        Header('Location:index.php');
    }
    ?>
    <script src="js/main.js"></script>
</body>
</html>