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
    <input type="submit" value="Déconnexion" class="logout">
</form>

<form method='post' class="hide-submit">
    <label>
        <input type="hidden" name="action" value="setVoteType">
        <input type="submit" name="voteType" value="" />
        <div class="card">
            <p>REMOVE VOTE TYPE</p>
        </div>
    </label>
</form>

<form method="post" class="">
    <input type="hidden" name="action" value="toMain">
    <input class="leaveButton" type="submit">
</form>

<section class="features-icons text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 listeOptions">
                <label>
                    <form method="post" class='hide-submit' role="button">
                        <input type="hidden" name="action" value="settingsPage" />
                        <input type="hidden" name="subPage" value="addEvent">
                        <input type="submit">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i
                                    class="bi-window m-auto text-primary addButton"></i>
                            </div>
                            <h3>Ajouter un événement</h3>
                        </div>
                    </form>
                    <label>
            </div>
            <div class="col-lg-4 listeOptions">
                <label>
                    <form method="post" class='hide-submit' role="button">
                        <input type="hidden" name="action" value="settingsPage" />
                        <input type="hidden" name="subPage" value="editEvent">
                        <input type="submit">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i
                                    class="bi-layers m-auto text-primary editButton"></i>
                            </div>
                            <h3>Modifier l'événement</h3>
                        </div>
                    </form>
                    <label>
            </div>
            <div class="col-lg-4 listeOptions">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary happyButton"></i>
                    </div>
                    <h3 id="percentHappy">Aucun vote</h3>
                </div>
            </div>
        </div>
    </div>
</section>



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
    var LUA_ID = <?php echo json_encode($_SESSION['lastUsedActivity']); ?>;
    var percentHappyValue = <?php echo json_encode($_SESSION['percentHappy']); ?>;
    console.log(LUA_ID);
    const activity = document.getElementById(LUA_ID + 'selection');
    activity.style.backgroundColor = 'greenyellow';
    document.getElementById("percentHappy").innerHTML = percentHappyValue;
</script>