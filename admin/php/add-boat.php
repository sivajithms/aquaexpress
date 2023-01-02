<?php
include '../../util/connection.php';

    
    $name= $_POST['name'];
    $origin=$_POST['origin'];
    $destination=$_POST['destination'];
    $capacity=$_POST['capacity'];

    $q="SELECT * FROM  boat where name='$name'";
    $res= mysqli_query($conn,$q);

    if(mysqli_num_rows($res) > 0){

        $error="user exist";
        echo "$error";
    }else{

    $query = "INSERT INTO boat(name, origin, destination, capacity)  VALUES ('$name', '$origin', '$destination ' ,'$capacity')";
    $result1 = mysqli_query($conn,$query); 
    header('Location: ../index.html');
    }