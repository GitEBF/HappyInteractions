<?php
$id = $_SESSION['lastUsedActivity'];
$connection = createConnection();

$sql = "SELECT * FROM activity where id='$id'";
$sqlHappy = "SELECT COUNT(*) FROM visitor where idActivity='$id' AND emotion='100'";
$sqlNeutral = "SELECT COUNT(*) FROM visitor where idActivity='$id' AND emotion='50'";
$sqlSad = "SELECT COUNT(*) FROM visitor where idActivity='$id' AND emotion='0'";
$sqlHappyWorker = "SELECT COUNT(*) FROM worker where idActivity='$id' AND emotion='100'";
$sqlNeutralWorker = "SELECT COUNT(*) FROM worker where idActivity='$id' AND emotion='50'";
$sqlSadWorker = "SELECT COUNT(*) FROM worker where idActivity='$id' AND emotion='0'";
$result = $connection->query($sql);
$resultHappy = $connection->query($sqlHappy);
$resultNeutral = $connection->query($sqlNeutral);
$resultSad = $connection->query($sqlSad);
$resultHappyWorker = $connection->query($sqlHappyWorker);
$resultNeutralWorker = $connection->query($sqlNeutralWorker);
$resultSadWorker = $connection->query($sqlSadWorker);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rowHappy = $resultHappy->fetch_assoc();
    $rowNeutral = $resultNeutral->fetch_assoc();
    $rowSad = $resultSad->fetch_assoc();
    $rowHappyWorker = $resultHappyWorker->fetch_assoc();
    $rowNeutralWorker = $resultNeutralWorker->fetch_assoc();
    $rowSadWorker = $resultSadWorker->fetch_assoc();

    ?>

    <form method="post" class="">
        <input type="hidden" name="action" value="settingsPage">
        <input class="leaveButton" type="submit">
    </form>
    <h1>
        <?php echo $row['name']; ?>
    </h1>
    <p>Visiteur</p>
    <?php echo $rowHappy['COUNT(*)']; ?>
    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512" style="fill:#25D937">
        <path id="happyIcon"
            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
    </svg><br>
    <?php echo $rowNeutral['COUNT(*)']; ?>
    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512" style="fill:#E5E827">
        <path id="happyIcon"
            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
    </svg><br>
    <?php echo $rowSad['COUNT(*)']; ?>
    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512" style="fill:#DA2626">
        <path id="happyIcon"
            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
    </svg>
    <p>Employeur</p>
    <?php echo $rowHappyWorker['COUNT(*)']; ?>
    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512" style="fill:#25D937">
        <path id="happyIcon"
            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
    </svg><br>
    <?php echo $rowNeutralWorker['COUNT(*)']; ?>
    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512" style="fill:#E5E827">
        <path id="happyIcon"
            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
    </svg><br>
    <?php echo $rowSadWorker['COUNT(*)']; ?>
    <svg xmlns="http://www.w3.org/2000/svg" height="2em" viewBox="0 0 512 512" style="fill:#DA2626">
        <path id="happyIcon"
            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
    </svg>
    <?php
}
endConnection($connection);


?>