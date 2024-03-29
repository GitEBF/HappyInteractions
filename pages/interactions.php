<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/emotion.css">
    <script src="/libraries/jquery-3.7.1.min.js"></script>
    <title>Index</title>
</head>
<html>

<body id='body'>
    <div class="overlay" id="overlay"></div>
    <?php
    if (ifActivity()) {
        if (ifVoteType()) {
            include "./pages/settingsSideBar.php";
            include "./pages/interactionsButtons.php";
        } else {
            include "./pages/interactionsMissingVoteType.php";
        }

    } else {
        include "./pages/interactionsMissingEvent.php";
    }
    ?>

    <script src="libraries/p5.min.js"></script>
</body>

</html>