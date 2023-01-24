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
    <title>aquaexpres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    body {
        display: flex;
        justify-content: center;
    }

    .ticket {
        
        width: 30%;
        margin-top: 5%;
        border-style: solid;
        border-width: 2px;
        padding: 2%;
    }

    h1 {
        
        position: relative;
        margin-left: 30%;

    }
    h6{
        position: relative;
        margin: 3%;
    }
    .details{
        margin-top: 10%;
        margin-right: 10%
    }

    .left {
        float: left;
        width: 50%
    }
    .btn{
        margin-top:6% ;
        margin-left:41%;
    }
</style>

<body>
<?php
    $date=$_POST['date'];
    $boat_id=$_POST['boat_id'];
    $tid=$_POST['tid'];
    $nos=$_POST['totalPass'];
    $total=$nos * 10;
?>

    <div class="ticket">
        <h1>payment</h1>
        <div class="details">
            <div class="left">
                <h6>rate for 1 ticket </h6>
                <h6>no: of passengers</h6>
                <h6>total </h6>

            </div>
            <div class="right">
                <h6>: 10rs</h6>
                <h6>: <?php echo $nos ?></h6>
                <h6>: <?php echo $total ?>rs</h6>
            </div>
        </div>
        <form action="payment-success.php" method="post" >
        <input type="hidden" name="tid" value="<?php echo $tid ?>">
        <input type="hidden" name="boat_id" value="<?php echo $boat_id ?>">
        <input type="hidden" name="date" value="<?php echo $date ?>">
        <input type="hidden" name="totalPass" value="<?php echo $nos ?>">

        <div class="pay">
            <button type="submit" class="btn btn-primary">pay</button>
        </div>
    </div>
    </form>


</body>

</html>