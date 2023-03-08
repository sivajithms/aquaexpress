<?php
session_start();
include './util/connection.php';

if(!isset($_SESSION['user_id'])){
    echo'<script>window.location.href="./userlogin.php"</script>';
  }else{
$id=$_SESSION['user_id'];
$query = "SELECT * FROM booking_table where user_id=$id";
$result = mysqli_query($conn, $query);


  }

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
                <th> <span class="glyphicon glyphicon-record" aria-hidden="true"></span>
                    boat name
                </th>
                <th>
                    <center>
                        date
                    </center>
                </th>
                <th>
                    <center>
                        time
                    </center>
                </th>
                <th>
                    <center>
                        route
                    </center>
                </th>
                <th>
                    <center>
                        no: of seats
                    </center>
                </th>
                <!-- <th>
                    <center>
                        book id
                    </center>
                </th> -->
                <th>
                    <center>
                        view ticket
                    </center>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        $book_id=$row['book_id'];
        $date=$row['book_date'];
        $nos=$row['seat_count'];
        $tid=$row['id'];
        $query1 = "SELECT * FROM time_table where id=$tid";
        $result1 = mysqli_query($conn, $query1);
        $val=mysqli_fetch_array($result1);
        $time=$val['starting_time'];
        $bid=$val['boat_id'];
        $query2 = "SELECT * FROM boat where boat_id=$bid";
        $result2 = mysqli_query($conn, $query2);
        $val2=mysqli_fetch_array($result2);
        $bname=$val2['name'];
        $origin=$val2['origin'];
        $dest=$val2['destination'];
        ?>
    

    <tr>
        <td>
        <?php echo $bname ?>
        </td>
        <td align="center">
             <?php echo $date ?> 
        </td>
        
        <td align="center">
            <?php echo $time ?>
    </td>
        <td>
            <center>
        <?php echo $origin ?> to <?php echo $dest ?>
        </center>
        </td>
        <td>
            <center>
            <?php echo $nos ?>
            </center>
        </td>
        <!-- <td>
            <?php echo $book_id ?>
        </td> -->
        <td>
            <center>
            <form action="ticket.php" method="post">
                <input type="hidden" name="tid" value="<?php echo $tid ?>">
                <input type="hidden" name="boat_id" value="<?php echo $bid ?>">
                <input type="hidden" name="date" value="<?php echo $date ?>">
                <input type="hidden" name="totalPass" value="<?php echo $nos ?>">
                <button class="btn btn-primary" type="submit">view</button>
            </form>
            </center>
        </td>
    </tr>

    <?php
    }
}else{
    
    if(mysqli_num_rows($result) < 1){
        echo "<tr><td colspan='7' align='center'>Zero bookings</td></tr>";
    }}
         
            ?>
            
        </tbody>
    </table>
</div>
</body>
</html>