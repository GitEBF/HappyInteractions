<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/settings.css">
<link rel="stylesheet" href="css/card.css">

<div class="container bodyContainer" id="bgCanvas">
        <div class="position-absolute header-main d-flex justify-content-center">
            <?php
            $afficherConnexion = createConnection();
            $sqlConnexion = "SELECT * FROM activity";
            $result = $afficherConnexion->query($sqlConnexion);
            if ($result->num_rows > 0) {
                ?>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $("#searchInput").on("keyup", function () {
                            var value = $(this).val().toLowerCase();
                            $(".labelActivity").filter(function () {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                            });
                        });
                    });
                </script>
                <form method='post' class="hide-submit">
                    <input type="hidden" name="action" value="evenement" />
                    <div class="container activityContainer">
                        <div class="wrap container">
                            <div class="search">
                                <input type="text" id="searchInput" class="searchTerm">
                                <div class="searchButton">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
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
        </div>
</div>


<script src="js/loginBG.js"></script>
<script src="libraries/p5.min.js"></script>