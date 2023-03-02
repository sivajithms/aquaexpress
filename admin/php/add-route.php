<?php
include '../../util/connection.php';

    
    $place= $_POST['place'];

    $q="SELECT * FROM  routes where place='$place'";
    $res= mysqli_query($conn,$q);

    if(mysqli_num_rows($res) > 0){

        $error="place exist";
        echo "$error";
    }else{
        $query = "INSERT INTO routes(place) VALUES ('$place')";
        $result1 = mysqli_query($conn,$query); 
        header('Location: ../index.php');
    }

    


    ?>
