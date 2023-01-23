<?php
include './util/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    .container-fluid{
        margin-top:10%;
       
    }
    .form-group{
        margin-top: 5%;
        width: 80%;
        margin-left: 10%;
    }
    .btn{
        width: 30%;
        margin-top: 5%;
        margin-left: 33%;
    }
    .table{
        width: 80%;
        margin-left: 10%;
    }
    
</style>
<body>
    <?php
    $tid=$_GET['tid'];
    $dt=$_GET['date'];
    $seat=$_GET['seat'];
    $query = "SELECT * FROM time_table where id=$tid";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $boat_id=$row['boat_id'];
    $query1 = "SELECT * FROM boat where boat_id=$boat_id";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($result1); 
    $name=$row1['name'];
    ?>

    <div class="container-fluid co">
        <form class="form-horizontal" role="form" id="form-acc" action="payment.php" method="post">
            <table id="myTable-party" class="table table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th> <span class="glyphicon glyphicon-record" aria-hidden="true"></span>
                            boat name
                        </th>
                        <th>
                            <center>
                                slots
                            </center>
                        </th>
                        <th>
                            <center>
                                fare
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p><?php echo $name ?></p>
                        </td>
                        <td align="center">
                        <?php echo $seat ?>
                        </td>
                        
                        <td align="center">10rs</td>
                    </tr>
                    
                </tbody>
            </table>
            
            <div class="form-group">
                <label for="">Total # of Passenger:</label>
                <input type="number" min="1" MAX="<?php echo $seat ?>" class="form-control" name="totalPass" plactreholder="Total # of Passenger" autocomplete="off" required>
            </div>


            <input type="hidden" name="tid" value="<?php echo $tid ?>">
            <input type="hidden" name="boat_id" value="<?php echo $boat_id ?>">
            <input type="hidden" name="date" value="<?php echo $dt ?>">


            <button type="submit" class="btn btn-success">NEXT
                <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
            </button>
            


        </form>
    </div>

</body>

</html>