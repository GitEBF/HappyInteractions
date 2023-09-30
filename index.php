<!-- ---------------------------------- -->
<!--             Important              -->
<!-- ---------------------------------- -->

<?php
session_start();
require "database/dbController.php";
require "php/formMethodController.php";
//$dbConnection = createConnection(); -- create a connection
//endConnection($dbConnection); -- end the connection
$_SESSION['settings'] = 'nuh uh';
?>

<?php // FORCE REMOVE SESSION
//session_unset();
//session_destroy();
?>

<!-- ---------------------------------- -->
<!--               Login                -->
<!-- ---------------------------------- -->

<?php



if ($_SERVER['REQUEST_METHOD'] == "POST") {
  clickedForm();
}


// if not logged: Load login.php, if logged: continue
if (!connected()) {
  include "/pages/login.php";
} else {
  if($_SESSION['page'] == 'main') {
    include "/pages/interactions.php";
  } else {

  }
  
}
?>








<?php // USED TO DEBUG SESSION VARIABLES
print_r($_SESSION);
?>

<script src="js/main.js"></script>