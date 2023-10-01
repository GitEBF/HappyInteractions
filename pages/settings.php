<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/settings.css">
    <link rel="stylesheet" href="css/card.css">
</head>

<body>
    <?php
    


        // ---------------------------------- //
        //       Update LastUsedActivity      //  
        // ---------------------------------- //
    
        updateLUActivity(null);

        // ---------------------------------- //
        //            Leave Button            //  
        // ---------------------------------- //
        ?> 
            <form method="post" class="hide-submit">
                <input type="hidden" name="action" value="toMain">
                <input class="leaveButton" type="submit">
            </form>
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
            <input type="submit" name="deco" value="Déconnexion">
        </form>

        <form method='post'>
            <input type="hidden" name="action" value="evenement">
            <input type="submit" name="eventId" value="" />
        </form>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['deco'])) {
            session_unset();
            session_destroy();
            Header('Location:index.php');
        }


        ?>
        <!-- ---------------------------------- -->
        <!--                User                -->
        <!-- ---------------------------------- -->
        <?php

        if ($_SESSION['username'] == 'etijay') {
            echo '<a href="user.php">Gérér les utilisateurs</a>';
        }



    ?>

    <!-- ---------------------------------- -->
    <!--           Select évenement         -->
    <!-- ---------------------------------- -->

    <script>
        //var id = <?php // echo json_encode($_SESSION['id']); ?> + 'selection';
        var LUA_ID = <?php echo json_encode($_SESSION['lastUsedActivity']); ?>;
        console.log(LUA_ID);
        const activity = document.getElementById(LUA_ID+'selection');
        activity.style.backgroundColor = 'greenyellow';
    </script>
</body>
</html>