<link rel="stylesheet" href="css/ajouter.css">
<?php
$dbConnection = createConnection();
$sqlDepartement = "SELECT * FROM departement";
$departementListe = mysqli_query($dbConnection, $sqlDepartement);
endConnection($dbConnection);

$nomErreur = $dateErreur = $descriptionErreur = "";
if ($_SESSION['erreurEventAdd']) {
    $nomErreur = 'Veuillez entrer un nom valide';
    $dateErreur = 'Veillez entrer une date valide';
    $descriptionErreur = 'Veuillez entrer une description valide';
}

?>
<div class="container">
    <h2>Ajouter un événement</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Nom:</label>
        <input type="text" name="name">
        <p class="error">
            <?php echo $nomErreur; ?>
        </p>

        <label for="date">Date:</label>
        <input type="date" name="date">
        <p class="error">
            <?php echo $dateErreur; ?>
        </p>

        <label for="description">Description:</label>
        <input type="text" name="description">
        <p class="error">
            <?php echo $descriptionErreur; ?>
        </p>

        <label for="departement">Département:</label><a href="departement.php" class="editButton"></a>
        <select name="departement">
            <?php
            while ($category = mysqli_fetch_array($departementListe, MYSQLI_ASSOC)):
                ?>
                <option value="<?php echo $category["id"]; ?>">
                    <?php echo $category["name"]; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br>
        <input type="hidden" name="action" value="ajouterEvent">
        <input type="submit">
    </form>
</div>

<form method="post" class="">
    <input type="hidden" name="action" value="settingsPage">
    <input class="leaveButton" type="submit">
</form>