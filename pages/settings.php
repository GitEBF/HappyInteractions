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

<body id="body body-main">
    <?php



    // ---------------------------------- //
    //       Update LastUsedActivity      //  
    // ---------------------------------- //
    
    updateLUActivity(null);

    // ---------------------------------- //
    //            Leave Button            //  
    // ---------------------------------- //
    
    if ($_SESSION['subPage'] == "") {
        include "./pages/settingsMain.php";
    } else {
        switch ($_SESSION['subPage']) {
            case "settingsUser":
                $_SESSION['erreurEventAdd'] = false;
                include "./pages/settingsUser.php";
                break;
            case "addEvent":
                include "./pages/event/eventAdd.php";
                break;
            case 'addDep':
                include "./pages/event/depAdd.php";
                break;
            case 'editEvent':
                if ($_SESSION['lastUsedActivity'] != NULL) {
                    include "./pages/event/eventEdit.php";
                } else {
                    echo '<script>alert("Veuillez choisir une activité")</script>';
                    include "./pages/settingsMain.php";
                }
                break;
            case 'showAnalytics':
                if ($_SESSION['lastUsedActivity'] != NULL) {
                    include "./pages/event/showAnalytics.php";
                } else {
                    echo '<script>alert("Veuillez choisir une activité")</script>';
                    include "./pages/settingsMain.php";
                }
                break;
        }
    }


    ?>
</body>

</html>