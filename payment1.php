<?php
session_start();
if(!isset($_SESSION['user_id'])){
    echo'<script>window.location.href="./index.php"</script>';
  }
include './util/connection.php';
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
    
    .outline{
        /* display: flex; */
        border-color: black;
        border-width: 2px;
        border-style: solid;
        margin: 3%;
        background-color: rgb(246, 239, 229);
        padding: 3%;
        height: auto;
    }
    .content-name{
        margin-top: 4%;
        width: 40%;
        float: left;
    }
    .content-attribute{
        margin-top: 4%;
        width: 50%;
        
    }
    .btn{
        
        width: 20%;
    }
  </style>
<body>


    <?php
    $date=$_POST['date'];
    $boat_id=$_POST['boat_id'];
    $tid=$_POST['tid'];
    $nos=$_POST['totalPass'];
    $uid=$_SESSION['user_id'];
    $total=$nos * 10;

    $query1 = "SELECT * FROM users where user_id=$uid";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($result1);  
    
    $uname=$row1['name'];

    $query2 = "SELECT * FROM boat where boat_id=$boat_id";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_array($result2); 
    
    $bname=$row2['name'];
    $origin=$row2['origin'];
    $dest=$row2['destination'];

    $query3 = "SELECT * FROM time_table where id=$tid";
    $result3 = mysqli_query($conn, $query3);
    $row3 = mysqli_fetch_array($result3); 

    $time=$row3['starting_time'];
    
    ?>


    <div>
        <div class="outline">
            <div class="heading">
                <center>
                    <h1>PAYMENT</h1>
                </center>
            </div>
            <div class="content-name">
                <h6>NAME </h6><br>
                <h6>BOAT </h6><br>
                <h6>ROUTE </h6><br>  
                <h6>Date </h6><br>
                <h6>Time </h6><br> 
                <h6>NO: OF SEATS </h6><br>
                <h6>TOTAL </h6><br>                
            </div>
            <div class="content-attribute">
                <h6>: <?php echo $uname ?> </h6><br>
                <h6>: <?php echo $bname ?> </h6><br>  
                <h6>: <?php echo $origin ?>    -->    <?php echo $dest ?></h6> <br> 
                <h6>: <?php echo $date ?> </h6><br>
                <h6>: <?php echo $time ?> </h6><br>
                <h6>: <?php echo $nos ?> </h6><br>
                <h6>: <?php echo $total ?> </h6><br>             
            </div>
           
            <div>
                <button class="btn btn-primary">
                    PAY <?php echo $total ?>
                </button>
            </div>
        </div>
    </div>
</body>
</html>

<?php
$query4 = "INSERT INTO payment_table(payment_amount, date)  VALUES ('$total','$date')";
$result4 = mysqli_query($conn,$query4); 

$query5 = "select max(payment_id) as payid from payment_table";
$result5 = mysqli_query($conn,$query5);
$row5 = mysqli_fetch_array($result5); 

$payid=$row5['payid'];

$query6 = "INSERT INTO booking_table(seat_count, id,user_id,payment_id,book_date)  VALUES ('$nos','$tid','$uid','$payid','$date')";
$result6 = mysqli_query($conn,$query6);

?>



