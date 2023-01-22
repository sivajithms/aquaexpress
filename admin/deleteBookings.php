<?php
include '../util/connection.php';


$bookid=$_POST['bookid'];
 echo $bookid;

$query = "delete from booking_table where book_id=$bookid";
$result = mysqli_query($conn, $query);
  if($result){
header("Location: ./admin-bookings.php");
  }
  else{
    echo 'failed';
  }

 ?>