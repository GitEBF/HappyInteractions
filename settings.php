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
</head>

<body>
    <?php
    if ($_SESSION['settings'] == 'gjrduiynb u5r9867n8 584r9yb 7n 54896yb 78 8540987hbn65' && $_SESSION['connexion'] == true) {
        //$_SESSION['settings'] = 'non';
        $nomErreur = $dateErreur = $descriptionErreur = "";
        $name = $description = "";
        $erreur = false;

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ajouter'])){
            if(empty($_POST['name'])){
                $nomErreur = "Le nom ne peut pas être vide";
                $erreur  = true;
            } else if (empty($_POST['date'])){
                $dateErreur = "La date ne peut pas être vide";
                $erreur  = true;
            } else if (empty($_POST['description'])){
                $descriptionErreur = "La date ne peut pas être vide";
                $erreur  = true;
            }
            if (!$erreur) {
                $name = $_POST['name'];
                $date = $_POST['date'];
                $description = $_POST['description'];
                $servername = "localhost";
                $username = "root";
                $passwordSQL = "root";
                $db = "happyinteractions";
                $con = new mysqli($servername,$username,$passwordSQL,$db);
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }   
                echo "Connected succesfully";
                $sql = "INSERT INTO activity (name,date,description,idDepartement) VALUES('$name','$date','$description','1')"; //FAUT CHANGER LES DEPARTEMENTS
                if (mysqli_query($con, $sql)) {
                    echo "<br>Enregistrement réussi";
                } else {
                    echo "Error: " . $sql . "<br>" , mysqli_error($con);
                }

                mysqli_close($con);
            }
        }
        ?> 
        <h2>Ajouter type beat</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          Nom : <input type="text" name="name"><br>
          <p style="color:red;"><?php echo $nomErreur; ?></p>
          Date : <input type="date" name="date"><br>
          <p style="color:red;"><?php echo $dateErreur; ?></p>
          Description : <input type="text" name="description"><br>
          <p style="color:red;"><?php echo $descriptionErreur; ?></p>
          <input type="submit" name="ajouter">
        </form>
        <?php
    } else {
        Header('Location:index.php');
    }
    ?>
</body>

</html>