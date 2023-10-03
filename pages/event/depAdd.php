<link rel="stylesheet" href="css/departement.css">

<?php
$nomErreur = "";
if ($_SESSION['erreurEventAdd']) {
    $nomErreur = "Veuillez entrer un nom valide";
} else if ($_SESSION['erreurEventAdd'] == "used") {
    $nomErreur = "Ce nom est déjà utilisé";
}
?>
<div class="container">
    <h2>Ajouter un département</h2>
    <form method="post" class="depForm">
        <label for="name">Nom</label>
        <input type="text" id="name" placeholder="Nom département" name="name">
        <p class="error-message">
            <?php echo $nomErreur; ?>
        </p>
        <input type="hidden" name="action" value="ajouterDepartement">
        <input type="submit" class="submitDep">
    </form>
</div>

<form method="post" class="">
    <input type="hidden" name="action" value="settingsPage">
    <input class="leaveButton" type="submit" name="subPage" value="addEvent">
</form>