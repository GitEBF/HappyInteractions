<?php
session_start();
require "dbController.php";
//$dbConnection = createConnection(); -- create a connection
//endConnection($dbConnection); -- end the connection
// Create the variable connexion if it doesnt exist


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
  <link rel="stylesheet" href="css/login.css">
  <title>Index</title>
</head>

<body id="body body-main">

  <?php
  //session_unset();
  //session_destroy();
  ?>

  <!-- ---------------------------------- -->
  <!--               SideBar              -->
  <!-- ---------------------------------- -->


  <?php
  $_SESSION['settings'] = 'nuh uh';
  // connection content
  if (!connected()) { ?>



if ($_SERVER['REQUEST_METHOD'] == "POST") {
  clickedForm();
}


// if not logged: Load login.php, if logged: continue
if (!connected()) {
  echo include "/pages/login.php";
} else {
  echo include "/pages/interactions.php";
}
?>




      <?php


      function emotion($emotionMeter)
      {
        $dbConnection = createConnection();
        $idActivity = getIdActivity();
        $sql = "INSERT INTO visitor (idActivity, emotion)
            VALUES ($idActivity, $emotionMeter)";

        if ($dbConnection->query($sql) === TRUE) {

        } else {
          echo "Error: " . $sql . "<br>" . $dbConnection->error;
        }
        endConnection($dbConnection);
      }
      ?>

      <?php //print_r($_SESSION); ?>
    </div>

    <script src="Js/uhhh.js"></script>
	  <script src="libraries/p5.min.js"></script>
</body>

</html>
<!-- 2.5h visuel index.php | 2h dispositions des settings | 2h creation des settings pour la customisation |  etc... -->