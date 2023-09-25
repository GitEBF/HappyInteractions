<?php
session_start();
require "dbController.php";
//$dbConnection = createConnection(); -- create a connection
//endConnection($dbConnection); -- end the connection
// Create the variable connexion if it doesnt exist
if (!isset($_SESSION["connexion"])) {
  $_SESSION["connexion"] = false;
}

?>
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
  <title>Index</title>
</head>

<body id="body">

  <?php
  //session_unset();
  //session_destroy();
  ?>

  <div class="container">
    <?php

    // if not connected show connection sidebar
    if (!connected()) { ?>

      <div class="button" id="loginButton">
        <div class="icon" id="buttonIcon">
          <i class="fa fa-user"></i>
        </div>
      </div>

      <div class="sidebar" id="loginSidebar">
        <h2>Login</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

          Nom : <input type="text" name="name"><br>
          Mot de passe : <input type="password" name="password"> <br>
          <input type="hidden" name="action" value="login">
          <input type="submit">

        </form>
      </div>
    <?php } ?>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == "login") {
      $user = $_POST['name'];
      $password = $_POST['password'];

      //$password = md5($password,false);
    
      $connection = createConnection();

      $sql = "SELECT * FROM user where name='$user' and password='$password'";
      $result = $connection->query($sql);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["connexion"] = true;
        $_SESSION["username"] = $user;
        echo "sa marche big";
        Header('Location: ' . $_SERVER['PHP_SELF']);
      } else {
        echo "Nom ou mot de passe invalide";
        $_SESSION["connexion"] = false;
      }

      endConnection($connection);
    }

    if ($_SESSION["connexion"] == true) {
      ?>
      <div class="button" id="loginButton">
        <div class="icon" id="buttonIconSettings">
          <i class="fa fa-bars"></i>
        </div>
      </div>
      <div class="sidebar" id="loginSidebar">
        <h2>Settings</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

          mot de passe<input type="password" name="password" id="password"><br>
          <input type="hidden" name="action" value="settings">
          <input type="submit">

        </form>
      </div>
      <?php

      if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == "settings") {
        if ($_SESSION["connexion"] == true) {

          $enteredPassword = $_POST['password'];

          $connection = createConnection();

          if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
          }
          $user = $_SESSION["username"];
          echo $user;
          $sql = "SELECT * FROM user where name='$user' AND password='$enteredPassword'";

          $result = $con->query($sql);

          if ($result->num_rows > 0) {
            Header('Location:settings.php');
            $_SESSION['settings'] = 'gjrduiynb u5r9867n8 584r9yb 7n 54896yb 78 8540987hbn65';
          } else {
            $_SESSION['settings'] = 'non';
          }

          endConnection($connection);
        }
      }
    }
    ?>
  </div>

  <!-- emoticons fr fr -->
  <form method='post' class="hide-submit d-flex justify-content-center justify-content-center iconContainer align-items-center"
    id="buttonWrapper">

    <input type="hidden" name="action" value="emotion" />
    <label>
      <input type="submit" name=happyIcon id="happyIcon" />
      <svg class="btn emotionIcon happyIcon" id="happyIcon"
        onclick="document.getElementById('msg').innerHTML += ('<?php emotion("happyIcon") ?>');"
        xmlns="http://www.w3.org/2000/svg" height="13em" viewBox="0 0 512 512" style="fill:#25D937">
        <path id="happyIcon"
          d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
      </svg>
    </label>
    <label>
      <input type="submit" name=midIcon id="midIcon" />
      <svg class="btn emotionIcon midIcon" id="midIcon" style="fill:#E5E827"
        onclick="document.getElementById('msg').innerHTML += ('<?php emotion("midIcon") ?>'); "
        xmlns="http://www.w3.org/2000/svg" height="13em" viewBox="0 0 512 512">
        <path id="midIcon"
          d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM176.4 176a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm128 32a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM160 336H352c8.8 0 16 7.2 16 16s-7.2 16-16 16H160c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
      </svg>
    </label>
    <label>
      <input type="submit" name=sadIcon id="sadIcon" />
      <svg class="btn emotionIcon sadIcon" id="sadIcon" style="fill:#DA2626"
        onclick="document.getElementById('msg').innerHTML += ('<?php emotion("sadIcon") ?>');"
        xmlns="http://www.w3.org/2000/svg" height="13em" viewBox="0 0 512 512">
        <path id="sadIcon"
          d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM159.3 388.7c-2.6 8.4-11.6 13.2-20 10.5s-13.2-11.6-10.5-20C145.2 326.1 196.3 288 256 288s110.8 38.1 127.3 91.3c2.6 8.4-2.1 17.4-10.5 20s-17.4-2.1-20-10.5C340.5 349.4 302.1 320 256 320s-84.5 29.4-96.7 68.7zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
      </svg>
    </label>
    </div>
    <div id="msg"></div>
    <script src="js/main.js"></script>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == "emotion") {
      sleep(2);
      $emotionMeter = 50;
      if (isset($_POST['happyIcon'])) {
        $emotionMeter = 100;
      }
      if (isset($_POST['midIcon'])) {
        $emotionMeter = 50;
      }
      if (isset($_POST['sadIcon'])) {
        $emotionMeter = 0;
      }
      emotion($emotionMeter);
      $_POST['action'] == "settings";
    }
    ?>


    <?php


    function emotion($emotionMeter)
    {
      $dbConnection = createConnection();

      $sql = "INSERT INTO visitor (idActivity, emotion)
            VALUES (1, $emotionMeter)";

      if ($dbConnection->query($sql) === TRUE) {

      } else {
        echo "Error: " . $sql . "<br>" . $dbConnection->error;
      }
      endConnection($dbConnection);
    }
    ?>

    <?php print_r($_SESSION); ?> 
</body>

</html>
<!-- 2.5h visuel index.php | 2h dispositions des settings | 2h creation des settings pour la customisation |  etc... -->