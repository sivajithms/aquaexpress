<?php
include '../util/connection.php';
$query = "SELECT * FROM boat";
$result = mysqli_query($conn, $query);  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 3%;
        }

        .table {
            background-color: #fff;
            margin-bottom: 5%;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle !important;
        }

        th {
            font-weight: bold;
            background-color: #dee2e6;
        }

        .btn-back {
            background-color: #6c757d;
            border-color: #6c757d;
            margin-bottom: 2%;
        }

        .btn-back:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }

        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

    </style>

</head>

<body>

    <div class="container">
        <a href="./index.php" class="btn btn-back text-white">Back</a>
        <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>boat id</th>
                    <th>Boat Name</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Capacity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(mysqli_num_rows($result) < 1){
                    echo "<tr><td colspan='4' style='text-align:center;'>No boats found</td></tr>";
                }
                while($row = mysqli_fetch_array($result)){
                    $bid = $row['boat_id'];
                    $name = $row['name'];
                    $org = $row['origin'];
                    $dest = $row['destination'];
                    $capacity = $row['capacity'];
                ?>
                <tr>
                    <td><?php echo $bid ?></td>
                    <td><?php echo $name ?></td>
                    <td><?php echo $org ?></td>
                    <td><?php echo $dest ?></td>
                    <td><?php echo $capacity ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
