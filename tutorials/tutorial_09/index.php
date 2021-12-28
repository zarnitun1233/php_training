<?php
session_start();
include("php/config.php");
/**
 * Check the user is already login or not
 */
if (!isset($_SESSION['auth'])) {
    header("location: login/login_form.php");
    exit();
}
/**
 * Pull data from Database
 */
$sql = "SELECT * FROM user";
$statement = $db->query($sql);
$data = $statement->fetchAll();
/**
 * Check the data exist in database or not
 */
if (!$data) {
    header("location:php/new.php");
}
/**
 * Show Message "Added" when one user is added
 */
if ($_SESSION['add']) {
    echo "New User Added";
    $_SESSION['add'] = false;
}
/**
 * Show Message "Updated" when one user is Updated
 */
if ($_SESSION['update']) {
    echo "Updated";
    $_SESSION['update'] = false;
}
/**
 * Show Message "Deleted" when one user is deleted
 */
if ($_SESSION['delete']) {
    echo "Deleted";
    $_SESSION['delete'] = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Index Page | Tutorial 09</title>
</head>

<body>
    <h2>Users List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Hobby</th>
            <th>Actions</th>
        </tr>
        <?php
        /**
         * Show data from User Table
         */
        foreach ($data as $result) {
        ?>
            <tr>
                <?php
                echo "<td>$result->name</td>";
                echo "<td>$result->age</td>";
                echo "<td>$result->phone</td>";
                echo "<td>$result->address</td>";
                echo "<td>$result->hobby</td>";
                ?>
                <td>
                    <a href="php/update_form.php?id=<?= $result->id; ?>">Update</a> |
                    <a href="php/delete.php?id=<?= $result->id; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table><br><br>
    <?php
    /**
     * Pull out name and age from database
     */
    $query = "SELECT name, age FROM user";
    $queryResult = $db->query($query);
    $result = $queryResult->fetchAll();
    /**
     * Create Arrays and insert data into the arrays with foreach loop
     */
    foreach ($result as $data) {
        $name[] = $data->name;
        $age[] = $data->age;
    }
    ?>
    <h2>Users' Age in Graph View</h2>
    <div id="convas-container">
        <canvas id="myChart"></canvas>
    </div><br><br>
    <a href="php/new.php">Create New User</a> |
    <a href="login/logout.php">Logout</a>

    <script src="js/jquery.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script>
        //Chart.js
        const labels = <?= json_encode($name) ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: "User's Age",
                data: <?= json_encode($age) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>