<?php
include '../util/connection.php';
$query = "SELECT * FROM booking_table";
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
                    <th>User Name</th>
                    <th>Boat ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>No. of Seats</th>
                    <th>Amount Paid</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
            if(mysqli_num_rows($result) < 1){
                echo "<tr><td colspan='7' align='center'>No bookings</td></tr>";
            }
     while($row = mysqli_fetch_array($result)){
        $uid=$row['user_id'];
        $tid=$row['id'];
        $date=$row['book_date'];
        $nos=$row['seat_count'];
        $pid=$row['payment_id'];
        $bookid=$row['book_id'];


        $query1 = "SELECT * FROM users where user_id=$uid";
        $result1 = mysqli_query($conn, $query1);
        $row1 = mysqli_fetch_array($result1);

        $query2 = "SELECT * FROM time_table where id=$tid";
        $result2 = mysqli_query($conn, $query2);
        $row2 = mysqli_fetch_array($result2);

        $query3 = "SELECT * FROM payment_table where payment_id=$pid";
        $result3 = mysqli_query($conn, $query3);
        $row3 = mysqli_fetch_array($result3);  
        
        $userName=$row1['name'];
        $bid=$row2['boat_id'];
        $pamount=$row3['payment_amount'];
        $time=$row2['starting_time'];
        ?>
                <tr>
                    <td align="center">
                    <?php echo $userName ?>
                    </td>
                    <td align="center">
                    <?php echo $bid ?>
                    </td>
                    
                    
                    <td>
                        <center>
                    <?php echo $date ?>
                    </center>
                    </td>
                    <td align="center">
                    <?php echo $time ?>

                    </td>
                    <td>
                        <center>
                    <?php echo $nos ?>
                    </center>
                    </td>
                    <td>
                        <center>
                    <?php echo $pamount ?>
                    </center>
                    </td>
                    <td>
                        <center>
                            <form action="deleteBookings.php" method="post" id="deletejs" onsubmit=" return confirmation()">
                            <input type="hidden" name="bookid" value="<?php echo $bookid ?>">
                            <button class="btn btn-danger" type="submit">delete</button>
                            </form>
                        </center>
                    </td>
                </tr>

            </tbody>

            <?php
            }
            ?>
        </table>
    </div>
</body>
<script>
function confirmation() {
    let text = "do you want to delete";
  if (confirm(text) == true) {
    return true;
    // document.getElementById('deletejs').submit();
  } else{
    return false;
  }
  
}

</script>
</html>