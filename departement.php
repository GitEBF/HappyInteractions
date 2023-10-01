<?php
session_start();
require "database/dbController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departement</title>
    <link rel="stylesheet" href="css/settings.css">
</head>

<body>
    <?php
    if ($_SESSION['settings'] == 'gjrduiynb u5r9867n8 584r9yb 7n 54896yb 78 8540987hbn65') {
        $nomErreur = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_POST['name'] != "") {
                $connection = createConnection();
                $name = $_POST['name'];
                $sqlVerification = "SELECT * FROM departement WHERE name = '$name'";
                $result = $connection->query($sqlVerification);
                if ($result->num_rows > 0) {
                    $nomErreur = "Ce nom est déjà utilisé";
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
                $nomErreur = "Veuillez entrer un nom valide";
            }
        }
        ?>
        <a href="ajouter.php" class="leaveButton"></a>
        <h1>Département</h1>
        <form method="post">
            <input type="text" placeholder="Nom du département" name="name">
            <p style="color:red;">
                <?php echo $nomErreur; ?>
            </p>
            <input type="submit" value="Ajouter">
        </form>
        <?php
    }
    ?>
</body>

</html>