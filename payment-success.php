<?php
session_start();
include './util/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .success-page{
  max-width:300px;
  display:block;
  margin: 0 auto;
  text-align: center;
      position: relative;
    top: 50%;
    transform: perspective(1px) translateY(50%)
}
.success-page img{
  max-width:62px;
  display: block;
  margin: 0 auto;
}

.btn-view-orders{
  display: block;
  border:1px solid #47c7c5;
  width:100px;
  margin: 0 auto;
  margin-top: 45px;
  padding: 10px;
  color:#fff;
  background-color:#47c7c5;
  text-decoration: none;
  margin-bottom: 20px;
}
h2{
  color:#47c7c5;
    margin-top: 25px;

}
a{
  text-decoration: none;
}
</style>
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


    $query4 = "INSERT INTO payment_table(payment_amount, date)  VALUES ('$total','$date')";
    $result4 = mysqli_query($conn,$query4); 

    $query5 = "select max(payment_id) as payid from payment_table";
    $result5 = mysqli_query($conn,$query5);
    $row5 = mysqli_fetch_array($result5); 

    $payid=$row5['payid'];

    $query6 = "INSERT INTO booking_table(seat_count, id,user_id,payment_id,book_date)  VALUES ('$nos','$tid','$uid','$payid','$date')";
    $result6 = mysqli_query($conn,$query6);
    
    ?>
<body>
    <div class="success-page">
        <img  src="http://share.ashiknesin.com/green-checkmark.png" class="center" alt="" />
       <h2>Payment Successful !</h2>
       <p>We are delighted to inform you that we received your payments</p>
       <form action="ticket.php" method="post">
       <input type="hidden" name="tid" value="<?php echo $tid ?>">
        <input type="hidden" name="boat_id" value="<?php echo $boat_id ?>">
        <input type="hidden" name="date" value="<?php echo $date ?>">
        <input type="hidden" name="totalPass" value="<?php echo $nos ?>">

        <button type="submit" class="btn btn-primary">View ticket</button>
       </form>
     </div>
     </div>
</body>
</html>
