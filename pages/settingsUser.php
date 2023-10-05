<div class="container bodyContainer">
    <?php
    if ($_SESSION['userSettings'] == "") {
        include "./pages/user/userMain.php";
    } else {
        switch ($_SESSION['userSettings']) {
            case "modify":
                include "./pages/user/userEdit.php";
                break;
            case 'add':
                include "./pages/user/userAdd.php";
                break;
        }
    }
    ?>
</div>

<form method="post" class="">
    <input type="hidden" name="action" value="settingsPage">
    <input class="backButton" type="submit" name="subPage" value="none">
</form>