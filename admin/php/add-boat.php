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
    }

    $time=$_POST['time'];

    echo $time[0];  
    
$query="select boat_id from boat where name='$name';";
$query1= mysqli_query($conn,$query);
$id=mysqli_fetch_array($query1);
echo $id[0];
$id1=$id[0];
echo '/n';

for($i=0; $i<sizeof($time);$i++){
    
    echo $i;
    $j=$time[$i];
    $query="insert into time_table(boat_id,starting_time) values($id1,'$j');";
    $addtime=mysqli_query($conn,$query);

}

    header('Location: ../index.php');




// foreach($time as $chk1){
//     $chk =$chk1;
//     $query="insert into time_table(boat_id,starting_time) values('$id','$chk');";
//     $addtime=mysqli_query($conn,$query);
// }

