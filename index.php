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
$_SESSION['erreurAddUser'] = false;
$_SESSION['erreurEventAdd'] = false;
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
  //header("Location: ".$_SERVER['PHP_SELF']);
}


// if not logged: Load login.php, if logged: continue
if (!connected()) {
  include "./pages/login.php";
} else {
  updateLUActivity(null);
  if($_SESSION['page'] == 'main') {
    include "./pages/interactions.php";
  } elseif($_SESSION['page'] == 'settings' /* && Still Time */) {
    include "./pages/settings.php";
  }
}
?>








<?php // USED TO DEBUG SESSION VARIABLES
$_SESSION["debounceEmotion"] = false;
?>
<script src="libraries/jquery-3.7.1.min.js"></script>
<script src="js/main.js"></script>