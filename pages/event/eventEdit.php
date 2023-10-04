<link rel="stylesheet" href="css/ajouter.css">
<?php
$nomErreur = $dateErreur = $descriptionErreur = "";
if ($_SESSION['erreurEventAdd']) {
    $nomErreur = 'Veuillez entrer un nom valide';
    $dateErreur = 'Veuillez entrer une date valide';
    $descriptionErreur = 'Veuillez entrer une description valide';
}
$id = $_SESSION['lastUsedActivity'];
$connection = createConnection();

$sqlDepartement = "SELECT * FROM departement";
$departementListe = mysqli_query($connection, $sqlDepartement);
$sql = "SELECT * FROM activity where id='$id'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <div class="container">
        <h2>Modifier</h2>
        <form method="post" class="addForm">
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
            <input type="hidden" name="action" value="modifierEvent">
            <div class="button-container">
                <input type="submit" class="addFormSubmit" name="actionModifier" value="Modifier">
                <input type="submit" class="addFormSubmitDelete" name="actionModifier" value="Supprimer">
            </div>
        </form>
    </div>
    <?php
}
endConnection($connection);
?>

<form method="post" class="">
    <input type="hidden" name="action" value="settingsPage">
    <input class="leaveButton" type="submit">
</form>