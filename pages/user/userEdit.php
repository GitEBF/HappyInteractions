<link rel="stylesheet" href="css/ajouter.css">
<?php
if (!$_SESSION['erreurAddUser']) {
    $nomErreur = "";
    $passwordErreur = "";
} else {
    $nomErreur =  "Veuillez entrer un nom valide";
    $passwordErreur =  "Veuillez entrer un mot de passe valide";
}

$dbConnection = createConnection();
$id = $_POST['idUserSettings'];
$_SESSION['idUserSettings'] = $id;
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = $dbConnection->query($sql);
$row = $result->fetch_assoc();

?>
<h2>Modifier un utilisateur</h2>
<form method="post" class="addForm">
    <label for="name">Nom :</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>">
    <p class="error">
        <?php echo $nomErreur; ?>
    </p>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password">
    <p class="error">
        <?php echo $passwordErreur; ?>
    </p>
    <input type="hidden" name="action" value="editUser">
    <input type="submit" class="addFormSubmit">
</form>