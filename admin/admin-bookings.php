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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<style>
    .main {
        margin: 5%;
    }
</style>

<body>
   
    
    <div class="main">
        <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>

                    <th>
                        <center>
                            user name
                        </center>
                    </th>
                    <th>
                        <center>
                            boat id
                        </center>
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
                            no: of seats
                        </center>
                    </th>
                    <th>
                        <center>
                            amount paid
                        </center>
                    </th>
                    <th > <span class="glyphicon glyphicon-record" aria-hidden="true"></span><center>
                        delete
                        </center>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
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
                            <form action="deleteBookings.php" method="post" id="deletejs" onsubmit="confirmation()">
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
    let text = "do you want to delete !\nEither OK or Cancel.";
  if (confirm(text) == true) {
    document.getElementById('deletejs').submit();
  } 
  
}

</script>
</html>