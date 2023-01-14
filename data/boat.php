<?php
include './util/connection.php';



    $query = "SELECT * FROM boat;";
    $result = mysqli_query($conn, $query);
    $dl = mysqli_fetch_array($result);
    $name=$dl['name'];
    $origin=$dl['origin'];
    $destination=$dl['destination'];



    
?>