<link rel="stylesheet" href="css/login.css">

<div class="container bodyContainer" id="bgCanvas">
    <div class="bg-layer">
        <div class="position-absolute header-main d-flex justify-content-center">
            <?php
                ?>

                <form method='post' class="hide-submit">
                    <?php
                    $connection = createConnection();

                    $sql = "SELECT * FROM activity ";
                    $result = $connection->query($sql);


                    while ($row = $result->fetch_assoc()) {

                        ?>
                        <input type="hidden" name="action" value="evenement">
                        <label>
                            <div class="activity">
                                <input type="submit" name="eventId" value="<?php echo $row["id"] ?>" />
                                <p>
                                    <?php echo $row["name"] ?>
                                </p>
                                <p>
                                    <?php echo $row["description"] ?>
                                </p>
                            </div>
                        </label>
                        <?php
                    }
                    endConnection($connection);

            ?>
            </form>
        </div>
    </div>
</div>


<script src="js/loginBG.js"></script>
<script src="libraries/p5.min.js"></script>