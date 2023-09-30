<?php
session_start();
require "dbController.php";
$user = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur</title>
</head>
<body>
    <?php 
        if ($user == 'etijay') {
            
        } else {
            Header('Location:index.php');
        }
    ?>
</body>
</html>