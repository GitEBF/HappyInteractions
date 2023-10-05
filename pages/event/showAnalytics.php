<div class="d-flex justify-content-center container">
    <div class="row">
        <div class="col-4">
            <div>
                <canvas id="myChart"></canvas>
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>


    function chartVisitor(analytics) {
        var ctx = document.getElementById('myChart');
        console.log(analytics)
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Bon', 'Moyen', 'Mauvais'],
                datasets: [{
                    label: '# de Votes',
                    data: analytics,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function chartWorker(analytics) {
        var ctx = document.getElementById('myChart2');
        console.log(analytics)
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Bon', 'Moyen', 'Mauvais'],
                datasets: [{
                    label: '# de Votes',
                    data: analytics,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

</script>

<?php
$connection = createConnection();
$good = 0;
$mid = 0;
$bad = 0;

$goodW = 0;
$midW = 0;
$badW = 0;


$id = $_SESSION['lastUsedActivity'];

$sql = "SELECT * FROM visitor where idActivity='$id'";
$result = $connection->query($sql);
if ($result->num_rows > 0) {

    for ($i = 0; $i < ($result->num_rows); $i++) {
        $row = $result->fetch_assoc();
        switch ($row['emotion']) {
            case 0:
                $bad = $bad + 1;
                break;
            case 50:
                $mid = $mid + 1;
                break;
            case 100:
                $good = $good + 1;
                break;
        }
    }

}

$sql = "SELECT * FROM worker where idActivity='$id'";
$result = $connection->query($sql);
if ($result->num_rows > 0) {

    for ($i = 0; $i < ($result->num_rows); $i++) {
        $row = $result->fetch_assoc();
        switch ($row['emotion']) {
            case 0:
                $badW = $badW + 1;
                break;
            case 50:
                $midW = $midW + 1;
                break;
            case 100:
                $goodW = $goodW + 1;
                break;
        }
    }

}

endConnection($connection);

$visitorArray = array(
    0 => $good,
    1 => $mid,
    2 => $bad
);

$workerArray = array(
    0 => $goodW,
    1 => $midW,
    2 => $badW
);

echo '<script>chartVisitor(' . json_encode($visitorArray) . ')</script>';
echo '<script>chartWorker(' . json_encode($workerArray) . ')</script>';


?>

<form method="post" class="">
    <input type="hidden" name="action" value="settingsPage">
    <input class="leaveButton" type="submit">
</form>