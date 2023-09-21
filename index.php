<?php
session_start()
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Index</title>
</head>

<body>
  <?php
  //database informations
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $db = "happyinteractions";
  $table = "user";

  //Create Connection to DB
  $conn = new mysqli($servername, $username, $password, $db);
  // Check Connection of DB
  if ($conn->connect_error) {
    die("Connection failed " . $conn->connect_error);
  }
  ?>



  <div class="container">
    <div class="button" id="loginButton">
      <div class="icon" id="buttonIcon">
        <i class="fa fa-user"></i>
      </div>
    </div>

    <div class="sidebar" id="loginSidebar">
      <h2>Login</h2>

    </div>
  </div>
  <script src="js/main.js"></script>

</body>

</html>

<!-- 2.5h visuel index.php | 2h dispositions des settings | 2h creation des settings pour la customisation |  etc...