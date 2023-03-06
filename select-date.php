<?php
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
    <script src="js/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("./images/boat.png");
        background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      backdrop-filter: opacity(80%);
    }
    h2{
        margin-top: 20%;
        color: white;
    }
    input{
        margin-top: 25%;
    }
    button{
        margin-top: 10%;
        width: 100%;
    }
</style>
<body>
    <div>
        <h2>select the date for your bookings</h2>
        <form action="select-boat.php" method="post">
        <input class="form-control" type="date" name="date" id="inputdate" required>
        
        <button class="btn btn-primary"  type="submit">next</button>
        </form>
    </div>



    
    <script>

        

$(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    var minDate = year + '-' + month + '-' + day;
    
    var maxDate = new Date(dtToday);
    maxDate.setDate(maxDate.getDate() + 7);
    var maxMonth = maxDate.getMonth() + 1;
    var maxDay = maxDate.getDate();
    var maxYear = maxDate.getFullYear();
    if(maxMonth < 10)
        maxMonth = '0' + maxMonth.toString();
    if(maxDay < 10)
        maxDay = '0' + maxDay.toString();
    var maxDateStr = maxYear + '-' + maxMonth + '-' + maxDay;
    
    $('#inputdate').attr('min', minDate);
    $('#inputdate').attr('max', maxDateStr);
});

</script>
</body>
</html>