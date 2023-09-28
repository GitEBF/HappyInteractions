<?php
session_start();
require "dbController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    if ($_SESSION['settings'] == 'gjrduiynb u5r9867n8 584r9yb 7n 54896yb 78 8540987hbn65') {
        $nomErreur = $dateErreur = $descriptionErreur = "";
        $name = $description = "";
        $erreur = false;
        $id = $_GET['id'];
        $connection = createConnection();

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
            <a href="settings.php"><svg xmlns="http://www.w3.org/2000/svg" height="2em"
                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <style>
                        svg {
                            fill: #000000
                        }
                    </style>
                    <path
                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                </svg></a>
            <h2>Modifier type beat</h2>
            <form method="post">
                Nom : <input type="text" name="name" value="<?php echo $row["name"] ?>"><br>
                <p style="color:red;">
                    <?php echo $nomErreur; ?>
                </p>
                Date : <input type="date" name="date" value="<?php echo $row["date"] ?>"><br>
                <p style="color:red;">
                    <?php echo $dateErreur; ?>
                </p>
                Description : <input type="text" name="description" value="<?php echo $row["description"] ?>"><br>
                <p style="color:red;">
                    <?php echo $descriptionErreur; ?>
                </p>
                <input type="submit" name="modifier" value="Modifier">
            </form>
            <form method="post">
                <input type="submit" name="delete" value="Supprimer">
            </form>
            <?php
        } else {
            echo 'hey big ta toute chier';
        }

        endConnection($connection);
        ?>
        <?php
    }
    ?>
</body>

</html>