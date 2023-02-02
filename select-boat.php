<?php
include './util/connection.php';
session_start();

if(!isset($_SESSION['user_id'])){
    echo'<script>window.location.href="./index.php"</script>';
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .template {
            margin: 5%;
            height: auto;
            background-color: rgb(212, 212, 217);
            width: 90%;
            border-radius: 30px;
            padding-bottom: 1%;
            box-shadow: 0px 0px 10px #888888;
        }
        .main-heading {
        margin-left: 5%;
        margin-top: 7%;
        font-size: 44px;
        text-align: center;
    }
    
    .route {
        margin-left: 5%;
        margin-top: 3%;
        float: left;
    }

    .time{
        margin-top: 2%;
        margin-left: 4%;
        padding: 1%;
        text-align: center;
    }
    .btn{
        margin-bottom: 1%;
    }
</style>

</head>

<body>
    <div>
        <?php
        if(!isset($_POST['date'])){
            header('location:select-date.php');
        }
        $query = "SELECT * FROM boat";
        $result = mysqli_query($conn, $query);
        $dt = $_POST['date'];
        
        while($row = mysqli_fetch_array($result)){
            $id=$row['boat_id'];
            ?> 
                    
        <div class="template">
            <div class="col col-lg-12 ">
                <h1 class="main-heading"> <?php echo  $row["name"] ;?> </h1>
                <div class="d-flex justify-content-center">
                <h1 class="from route"><?php echo $row['origin']; ?> </h1>
                <h1 class="arrow route">--</h1>
                <h1 class="to route"> <?php echo $row['destination']; ?></h1>    
                </div>        
                <br>
    
            </div>
<div class="time">
            <?php
            
            $query1 = "SELECT * FROM time_table where boat_id=$id";
            $result1 = mysqli_query($conn, $query1);
        
        
        while($row1 = mysqli_fetch_array($result1)){
            $tid = $row1['id'];
              $query2 = "select sum(seat_count) as smcnt from booking_table where book_date = '$dt' and id = $tid";
             $result2 = mysqli_query($conn, $query2);
             $rw = mysqli_fetch_array($result2);
             $bCount = $rw['smcnt'];

             $query3 = "select capacity from boat where boat_id = $id";
             $result3 = mysqli_query($conn, $query3);
             $rw1 = mysqli_fetch_array($result3);
             $capacity = $rw1['capacity'];
             $avSeat = $capacity - $bCount;
            ?> 
            
            
                <a href="select-seat-no.php?tid=<?php echo $tid; ?>&seat=<?php echo $avSeat ?>&date=<?php echo $dt ?>"><button type="button" class="btn btn-primary"><h6>time: <br><?php echo $row1['starting_time'];?></h6><h6><?php echo $avSeat ?> seats </h6></button></a> 
                
            

            <?php


         }  
        ?>
        </div>
        </div>
        
        <?php
        }
        ?>
    </div>
</body>

</html>