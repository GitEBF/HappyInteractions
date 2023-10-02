<?php
$dbConnection = createConnection();
$sql = "SELECT * FROM user";
$result = $dbConnection->query($sql);
if ($result->num_rows > 0) {
    ?>
    <div class="container">
        <div class="row">
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-xs-12 col-4 test">
                    <div class="card" id="<?php echo $row["id"]; ?>selection">
                        <div class="card-content">
                            <div class="button-container">
                                <form method="post" class="">
                                    <input type="hidden" name="action" value="settingsPage">
                                    <input type="hidden" name="idUserSettings" value="<?php echo $row['id']; ?>">
                                    <?php
                                    if ($_SESSION['username'] != $row['name']) {
                                        echo '<input class="deleteButtonUser" type="submit" name="subPage" value="deleteUser">';
                                    }
                                    ?>
                                    <input class="editButtonUser" type="submit" name="subPage" value="editUser">
                                </form>
                            </div>
                            <h4 class="card-title">
                                <p>
                                    <?php echo $row['name']; ?>
                                </p>
                            </h4>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <form method="post">
        <input type="hidden" name="action" value="settingsPage">
        <input class="" type="submit" name="subPage" value="addUser">
    </form>
    <?php
} else {
    echo "non";
}
endConnection($dbConnection);
?>