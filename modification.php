<?php
session_start();
require "database/dbController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/modifier.css">
</head>

<body>
    <?php
    if ($_SESSION['settings'] == 'gjrduiynb u5r9867n8 584r9yb 7n 54896yb 78 8540987hbn65') {
        $nomErreur = $dateErreur = $descriptionErreur = "";
        $name = $description = "";
        $erreur = false;
        $id = $_GET['id'];
        $connection = createConnection();

        $sqlDepartement = "SELECT * FROM departement";
        $departementListe = mysqli_query($connection, $sqlDepartement);
        $sql = "SELECT * FROM activity where id='$id'";
        $result = $connection->query($sql);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['modifier'])) {
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
                $connectionModifier = createConnection();
                $sqlModifier = "UPDATE activity SET name='$name',date='$date',description='$description' WHERE id='$id'";
                if ($connectionModifier->query($sqlModifier) === TRUE) {

                } else {
                    echo "Error: " . $sql . "<br>" . $connectionModifier->error;
                }
                Header('Location:settings.php');
                endConnection($connectionModifier);
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['delete'])) {
            $connectionDelete = createConnection();
            $sqlDelete = "DELETE FROM activity WHERE id='$id'";
            $sqlDeleteVisitor = "DELETE FROM visitor WHERE idActivity='$id'";
            $sqlDeleteWorker = "DELETE FROM worker WHERE idActivity='$id'";
            $user = $_SESSION['username'];
            $sqlVerification = "SELECT * FROM user WHERE name = '$user'";
            $result = $connectionDelete->query($sqlVerification);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row['lastUsedActivity'] == $id) {
                    $sql = "UPDATE user SET lastUsedActivity = null WHERE name='$user'";
                    if ($connectionDelete->query($sqlDeleteVisitor) === TRUE) {
                        if ($connectionDelete->query($sqlDeleteWorker) === TRUE) {
                            if ($connectionDelete->query($sql) === TRUE) {

                            } else {
                                echo "Error: " . $sql . "<br>" . $connectionDelete->error;
                            }
                        } else {
                            echo "Error: " . $sqlDeleteWorker . "<br>" . $connectionDelete->error;
                        }
                    } else {
                        echo "Error: " . $sqlDeleteVisitor . "<br>" . $connectionDelete->error;
                    }
                }
            }
            if ($connectionDelete->query($sqlDelete) === TRUE) {

                Header('Location:settings.php');
            } else {
                echo "Error: " . $sql . "<br>" . $connectionDelete->error;
            }
            endConnection($connectionDelete);

        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <div class="container">
                <a href="settings.php" class="leaveButton"></a>
                <h2>Modifier</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="name">Nom:</label>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>">
                    <p class="error">
                        <?php echo $nomErreur; ?>
                    </p>

                    <label for="date">Date:</label>
                    <input type="date" name="date" value="<?php echo $row['date']; ?>">
                    <p class="error">
                        <?php echo $dateErreur; ?>
                    </p>

                    <label for="description">Description:</label>
                    <input type="text" name="description" value="<?php echo $row['description']; ?>">
                    <p class="error">
                        <?php echo $descriptionErreur; ?>
                    </p>

                    <label for="departement">Département:</label><a href="departement.php" class="editButton"></a>
                    <select name="departement">
                        <?php
                        while ($category = mysqli_fetch_array($departementListe, MYSQLI_ASSOC)):
                            $selected = ($category["id"] == $row["idDepartement"]) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $category["id"]; ?>" <?php echo $selected; ?>>
                                <?php echo $category["name"]; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <br>
                    <input type="submit" name="ajouter" value="Modifier">
                </form>
                <form method="post">
                    <input type="submit" name="delete" value="Supprimer">
                </form>
            </div>
            <?php
        } else {
            echo 'modification.php: hey big ta toute chier';
        }

        endConnection($connection);
        ?>
        <?php
    }
    ?>
</body>

</html>