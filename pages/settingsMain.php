<?php

// ---------------------------------- //
//        Afficher évenements         //
// ---------------------------------- //

$afficherConnexion = createConnection();
$sqlConnexion = "SELECT * FROM activity";
$result = $afficherConnexion->query($sqlConnexion);
if ($result->num_rows > 0) {
    ?>
    <form method='post' class="hide-submit">
        <input type="hidden" name="action" value="evenement" />
        <div class="container">
            <div class="row">
                <?php
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <label class="labelActivity">
                        <div class="col-xs-12 col-4 test">
                            <input type="submit" name="eventId" value="<?php echo $row["id"] ?>" />
                            <div class="card" id="<?php echo $row["id"]; ?>selection">
                                <div class="card-content">
                                    <div class="button-container">
                                        <a href="modification.php?id=<?php echo $row["id"] ?>" class="editButton"></a>
                                        <a href="zoom.php?id=<?php echo $row["id"] ?>" class="zoomButton"></a>
                                    </div>
                                    <h4 class="card-title">
                                        <p>
                                            <?php echo $row['name']; ?>
                                        </p>
                                    </h4>
                                    <p>
                                        <?php echo $row['description']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                    <?php
                }
                ?>
                <a href="ajouter.php">Ajouter un évenement</a>
            </div>
        </div>
    </form>

    <?php
} else {
    echo "non";
}
endConnection($afficherConnexion);
?>

<!-- ---------------------------------- -->
<!--            Déconnexion             -->
<!-- ---------------------------------- -->

<form method='post'>
    <input type="hidden" name="action" value="deconnect">
    <input type="submit" value="Déconnexion">
</form>

<form method='post'>
    <input type="hidden" name="action" value="evenement">
    <input type="submit" name="eventId" value="" />
</form>

<!-- ---------------------------------- -->
<!--                User                -->
<!-- ---------------------------------- -->
<?php

if ($_SESSION['username'] == 'etijay') {
    ?>


    <form method='post'>
        <input type="hidden" name="action" value="settingsPage">
        <input type="submit" name="subPage" value="settingsUser" />
    </form>

    <?php
}



?>

<!-- ---------------------------------- -->
<!--           Select évenement         -->
<!-- ---------------------------------- -->

<script>
    //var id = <?php // echo json_encode($_SESSION['id']); ?> + 'selection';
    var LUA_ID = <?php echo json_encode($_SESSION['lastUsedActivity']); ?>;
    console.log(LUA_ID);
    const activity = document.getElementById(LUA_ID + 'selection');
    activity.style.backgroundColor = 'greenyellow';
</script>