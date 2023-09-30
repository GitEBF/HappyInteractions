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
    <link rel="stylesheet" href="css/login.css">
    <title>Index</title>
</head>
<html>

<body id="body body-main">
    <div class="container bodyContainer" id="bgCanvas">
        <div class="bg-layer">
            <div class="position-absolute header-main d-flex justify-content-center">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="icon1 d-flex align-items-center">
                        <span class="fa fa-user iconInput"></span>
                        <input class="beautiful-input" type="text" name="name" placeholder="Nom d'utilisateur" required>
                    </div>
                    <div class="icon1 d-flex align-items-center">
                        <span class="fa fa-lock iconInput"></span>
                        <input class="beautiful-input" type="password" name="password" placeholder="Mot de passe"
                            required>
                    </div>
                    <input type="hidden" name="action" value="login">
                    <input type="submit" class="loginButton">
            </div>
            </form>
        </div>
    </div>
    <script src="js/loginBG.js"></script>
    <script src="libraries/p5.min.js"></script>
</body>

</html>