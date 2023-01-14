<?php
include './util/connection.php';
// include './data/boat.php';
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
            height: 270px;
            background-color: rgb(212, 212, 217);
            width: 90%;
            border-radius: 30px;
        }

        .main-heading {
            margin-left: 5%;
            margin-top: 7%;
            font-size: 44px;
        }

        .route {
            margin-left: 5%;
            margin-top: 3%;
            float: left;
        }

        .time{
      margin-top: 9%;
      margin-left: 5%;

    }
    </style>
</head>

<body>
    <div>
        <?php
        $query = "SELECT * FROM boat";
        $result = mysqli_query($conn, $query);
        
        
        while($row = mysqli_fetch_array($result)){
            $id=$row['boat_id'];
            ?> 
                    
        <div class="template">
            <div class="col col-lg-12">
                <h1 class="main-heading"> <?php echo $row['name']; ?> </h1>
                <h1 class="from route"><?php echo $row['origin']; ?> </h1>
                <h1 class="arrow route">--</h1>
                <h1 class="to route"> <?php echo $row['destination']; ?></h1>
                <br>
            </div>
<div class="time">
            <?php
            
            $query1 = "SELECT * FROM time_table where boat_id=$id";
            $result1 = mysqli_query($conn, $query1);
        
        
        while($row1 = mysqli_fetch_array($result1)){
                
            ?> 
            
            
                <a href=""><button type="button" class="btn btn-primary"><?php echo $row1['starting_time'];?></button></a>
            

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