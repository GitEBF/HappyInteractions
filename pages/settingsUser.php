<div class="container bodyContainer">
    <?php
    if ($_SESSION['userSettings'] == "") {
        include "/pages/user/userMain.php";
    } else {
        switch ($_SESSION['userSettings']) {
            case "delete":
                echo 'malllo';
                break;
            case "modify":
                echo 'ma te modifier moué';
                echo $_SESSION['idUserSettings'];
                break;
            case 'add':
                include "/pages/user/userAdd.php";
                break;
        }
    }
    ?>
</div>

<form method="post" class="">
    <input type="hidden" name="action" value="settingsPage">
    <input class="backButton" type="submit" name="subPage" value="none">
</form>