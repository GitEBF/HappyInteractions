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


        // ---------------------------------- //
        //       Update LastUsedActivity      //  
        // ---------------------------------- //
    
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


        // ---------------------------------- //
        //        Ajouter évenements          //
        // ---------------------------------- //
    
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
                $ajouterConnexion = createConnection();
                $sqlAjouter = "INSERT INTO activity (name,date,description,idDepartement) VALUES('$name','$date','$description','$idDepartement')";
                if ($ajouterConnexion->query($sqlAjouter) === TRUE) {
                    Header('Location:settings.php');
                } else {
                    echo "Error: " . $sqlAjouter . "<br>" . $ajouterConnexion->error;
                }
                endConnection($ajouterConnexion);
            }
        }

        ?>
        <a href="index.php" class="leaveButton"></a>
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
            </select><a href="departement.php" class="editButton"></a><br>
            <input type="submit" name="ajouter">
        </form>

        <!-- ---------------------------------- -->
        <!--        Afficher évenements         -->
        <!-- ---------------------------------- -->

        <?php

        $afficherConnexion = createConnection();
        $sqlConnexion = "SELECT * FROM activity";
        $result = $afficherConnexion->query($sqlConnexion);

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
                    <a href="modification.php?id=<?php echo $row["id"] ?>" class="editButton"></a>
                    <a href="zoom.php?id=<?php echo $row["id"] ?>" class="zoomButton"></a></br>
                    <?php
                }
        } else {
            echo "non";
        }
        echo '</form>';
        endConnection($afficherConnexion);


        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['selection'])) {

            $_SESSION['id'] = $_POST['selection'];
            echo $_SESSION['id'];

            $dbConnectionSelection = createConnection();
            $id = $_SESSION['id'];
            $user = $_SESSION['username'];

            $sqlSelection = "UPDATE user SET lastUsedActivity = $id WHERE name = '$user'";

            if ($dbConnectionSelection->query($sqlSelection) === TRUE) {

            } else {
                echo "Error: " . $sqlSelection . "<br>" . $dbConnectionSelection->error;
            }
            endConnection($dbConnectionSelection);

        }

        ?>

            <!-- ---------------------------------- -->
            <!--            Déconnexion             -->
            <!-- ---------------------------------- -->

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