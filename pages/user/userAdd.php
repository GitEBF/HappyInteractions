<link rel="stylesheet" href="css/ajouter.css">
<?php
if (!$_SESSION['erreurAddUser']) {
    $nomErreur = "";
    $passwordErreur = "";
} else {
    $nomErreur =  $_SESSION['nomErreur'];
    $passwordErreur =  $_SESSION['passwordErreur'];
}
?>
<h2>Ajouter un utilisateur</h2>
<form method="post" class="addForm">
    <label for="name">Nom :</label>
    <input type="text" name="name">
    <p class="error">
        <?php echo $nomErreur; ?>
    </p>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password">
    <p class="error">
        <?php echo $passwordErreur; ?>
    </p>
    <input type="hidden" name="action" value="addFormSubmit">
    <input type="submit" class="addFormSubmit">
</form>