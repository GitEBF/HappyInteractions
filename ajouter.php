<?php
session_start();
require "database/dbController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/settings.css">
</head>

<body>
    <?php
    if ($_SESSION['settings'] == 'gjrduiynb u5r9867n8 584r9yb 7n 54896yb 78 8540987hbn65') {

        $dbConnection = createConnection();
        $sqlDepartement = "SELECT * FROM departement";
        $departementListe = mysqli_query($dbConnection, $sqlDepartement);
        endConnection($dbConnection);

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
        <a href="settings.php" class="leaveButton"></a>
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
            </select><a href="departement.php" class="editButton"></a><br> <!-- Créer département -->
            <input type="submit" name="ajouter">
        </form>

        <?php
    }

    ?>
</body>

</html>